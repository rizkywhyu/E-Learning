<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class guruadm extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Guru_model');
        $this->load->library('form_validation');
        $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
        $this->load->helper(array('form', 'url'));
        
    }

    public function index()
    {
        $guruadm = $this->Guru_model->get_all();

        $data = array(
            'judul' => set_value('judul'),
            //'action' => site_url('guruadm/proses'),
            //'error' => $error['error'],
            'guruadm_data' => $guruadm
        );

        $this->template->load('template','Guru_list', $data);
        //$this->template->load('template','uu',$data);
    }

    public function read($id) 
    {
        $row = $this->Guru_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'kodeguru' => $row->kodeguru,
        		'nama' => $row->nama,
        		'sekolah' => $row->sekolah,
        		'alamat' => $row->alamat,
        		'noHP' => $row->noHP,
            'email' => $row->email,
            'idSklh' => $row->idSklh,
       );
            $this->template->load('template','Guru_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('guruadm'));
        }
    }

   

    public function create() 
    {
        
        $data = array(
            'button' => 'Create',
            'action' => site_url('guruadm/createaksi'),
            // 'dd_tempat' => $this->Barang_model->dd_tempat(),
            // 'tempat_selected' => $this->input->post('tempat') ? $this->input->post('tempat') : '',
	    'kodeguru' => set_value('kodeguru'),
	    'nama' => set_value('nama'),
	    'sekolah' => set_value('sekolah'),
	    'alamat' => set_value('alamat'),
	    'noHP' => set_value('noHP'),
      'email' => set_value('email'),
      'idSklh' => set_value('idSklh'),
        
	);
        $this->template->load('template','Guru_form', $data);
    }
    
    
    
    public function update($id) 
    {
        $row = $this->Guru_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('guruadm/update_action'),
      		'kodeguru' => set_value('kodeguru', $row->kodeguru),
      		'nama' => set_value('nama', $row->nama),
      		'sekolah' => set_value('sekolah', $row->sekolah),
      		'alamat' => set_value('alamat', $row->alamat),
          'noHP' => set_value('noHP', $row->noHP),
      		'email' => set_value('email', $row->email),
          'idSklh' => set_value('idSklh', $row->idSklh),
        
	    );
            $this->template->load('template','Guru_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('guruadm'));
        }
    }
    
    public function update_action() 
    {
        $this->_ruless();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kodeguru', TRUE));
        } else {
            $data = array(
        
    		'kodeguru' => $this->input->post('kodeguru',TRUE),
    		'nama' => $this->input->post('nama',TRUE),
    		'sekolah' => $this->input->post('sekolah',TRUE),
    		'alamat' => $this->input->post('alamat',TRUE),
        'noHP' => $this->input->post('noHP',TRUE),
        'email' => $this->input->post('email',TRUE),
        'idSklh' => $this->input->post('idSklh',TRUE),
	    );

            $this->Guru_model->update($this->input->post('kodeguru', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('guruadm'));
        }
    }

    
    
    public function delete($id) 
    {
        $row = $this->Guru_model->get_by_id($id);

        if ($row) {
            $this->Guru_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('guruadm'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('guruadm'));
        }
    }
public function _ruless() 
    {
      $this->form_validation->set_rules('kodeguru', 'kodeguru', 'trim|required|xss_clean');
  $this->form_validation->set_rules('nama', 'nama', 'trim|required|xss_clean');
  $this->form_validation->set_rules('sekolah', 'sekolah', 'trim|required|xss_clean');
  $this->form_validation->set_rules('alamat', 'alamat', 'trim|required|xss_clean');
  $this->form_validation->set_rules('noHP', 'noHP', 'trim|required|xss_clean');
  $this->form_validation->set_rules('email', 'email', 'trim|required|xss_clean');
  $this->form_validation->set_rules('idSklh', 'idSklh', 'trim|required|xss_clean');
  
  $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function _rules() 
    {
      $this->form_validation->set_rules('kodeguru', 'kodeguru', 'trim|required|xss_clean|callback_valid_id');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required|xss_clean');
	$this->form_validation->set_rules('sekolah', 'sekolah', 'trim|required|xss_clean');
	$this->form_validation->set_rules('alamat', 'alamat', 'trim|required|xss_clean');
	$this->form_validation->set_rules('noHP', 'noHP', 'trim|required|xss_clean');
  $this->form_validation->set_rules('email', 'email', 'trim|required|xss_clean');
  $this->form_validation->set_rules('idSklh', 'idSklh', 'trim|required|xss_clean');
  
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    

    public function uploadd(){
              $fileName = $this->input->post('file', TRUE);

              $config['upload_path'] = './upload/'; 
              $config['file_name'] = $fileName;
              $config['allowed_types'] = 'xls|xlsx|csv|ods|ots';
              $config['max_size'] = 10000;

              $this->load->library('upload', $config);
              $this->upload->initialize($config); 
              
              if (!$this->upload->do_upload('file')) {
               $error = array('error' => $this->upload->display_errors());
               $this->session->set_flashdata('msg','Ada kesalah dalam upload'); 
               redirect('guruadm'); 
              } else {
               $media = $this->upload->data();
               $inputFileName = 'upload/'.$media['file_name'];
               
               try {
                $inputFileType = IOFactory::identify($inputFileName);
                $objReader = IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
               } catch(Exception $e) {
                die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
               }

               $sheet = $objPHPExcel->getSheet(0);
               $highestRow = $sheet->getHighestRow();
               $highestColumn = $sheet->getHighestColumn();

               for ($row = 2; $row <= $highestRow; $row++){  
                 $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                   NULL,
                   TRUE,
                   FALSE);
                 $data = array(
                    // "Id_User"=> $rowData[0][0],
                    // "username"=> $rowData[0][1],
                    // "password"=> $rowData[0][2],
                    // "jenis_user"=> $rowData[0][3]
                    //"alamat"=> $rowData[0][4]
                    "kodeguru"=> $rowData[0][0],
                    "nama"=> $rowData[0][1],
                    "sekolah"=> $rowData[0][2],
                    "alamat"=> $rowData[0][3],
                    "noHP"=> $rowData[0][4],
                    "email"=> $rowData[0][5],
                    "idSklh"=> $rowData[0][6],
                );
                $this->db->insert("guru",$data);
               } 
               $this->session->set_flashdata('msg','Berhasil upload ...!!'); 
               redirect('guruadm');
              }  
             } 
            
             
    function createaksi()
    {
        $this->form_validation->set_error_delimiters('<div id="error">', '</div>');
        $this->_rules();
                if ($this->form_validation->run() == TRUE){
        $data = array(
            
              'kodeguru' => $this->input->post('kodeguru'),
              'nama' => $this->input->post('nama'),
              'sekolah' => $this->input->post('sekolah'),
              'alamat' => $this->input->post('alamat'),
              'noHP' => $this->input->post('noHP'),
              'email' => $this->input->post('email'),
              'idSklh' => $this->input->post('idSklh'),
                     
        );
        $this->Guru_model->create_data($data);
        redirect('guruadm');
    }
        else {
                $this->create();
             
        }
        }
        /**
     * Cek apakah $nip valid, agar tidak ganda
     */
        function valid_id($kodeguru)
    {
        if ($this->Guru_model->valid_id($kodeguru) == TRUE)
        {
            
            // echo 'valid_id', "kode guruadm dengan Kode $kodeguru sudah terdaftar";
            $this->form_validation->set_message('valid_id', "kode guruadm dengan $kodeguru sudah terdaftar");
            return FALSE;
        }
        else
        {
            return TRUE;

        }
      }



}

/* End of file Buku.php */
/* Location: ./application/controllers/Buku.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-04-06 11:21:06 */
/* http://harviacode.com */