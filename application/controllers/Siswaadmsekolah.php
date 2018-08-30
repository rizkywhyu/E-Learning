<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Siswaadmsekolah extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Siswa_model');
        $this->load->library('form_validation');
        $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $siswa = $this->Siswa_model->getsiswabysekolah($this->session->userdata('id'));

        $data = array(
            'siswa_data' => $siswa
        );

        $this->template->load('templatep','siswaadm_list', $data);
        // $this->load->model('Siswa_model');
        // $data['siswa_data'] = $this->Siswa_model->get_all_siswa();
        // $this->template->load('templatep','siswaadm_list', $data);
    }

    public function read($id) 
    {
        $row = $this->Siswa_model->get_by_id($id);
        if ($row) {
            $data = array(
          		'NIS' => $row->NIS,
          		'Nama' => $row->Nama,
              'Sekolah' => $row->Sekolah,
              // 'Jurusan' => $row->Jurusan,
          		'Kelas' => $row->Kelas,
          		'Alamat' => $row->Alamat,
          		'NoHP' => $row->NoHP,
              'Email' => $row->Email,
              'nmrOrtu' => $row->nmrOrtu,
              'idSklh' => $row->idSklh,
    
        
	    );
            $this->template->load('templatep','siswaadm_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Siswaadmsekolah'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('Siswaadmsekolah/createaksi'),
	    'NIS' => set_value('NIS'),
	    'Nama' => set_value('Nama'),
      'Sekolah' => set_value('Sekolah'),
      // 'Jurusan' => set_value('Jurusan'),
	    'Kelas' => set_value('Kelas'),
      'Alamat' => set_value('Alamat'),
	    'NoHP' => set_value('NoHP'),
      'Email' => set_value('Email'),
      'nmrOrtu' => set_value('nmrOrtu'),
      'idSklh' => set_value('idSklh'), 
	);
        $this->template->load('templatep','siswaadm_form', $data);
    }
    
   
    
    public function update($id) 
    {
        $row = $this->Siswa_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('Siswaadmsekolah/update_action'),
            		'NIS' => set_value('NIS', $row->NIS),
            		'Nama' => set_value('Nama', $row->Nama),
                'Sekolah' => set_value('Sekolah', $row->Sekolah),
                // 'Jurusan' => set_value('Jurusan', $row->Jurusan),
            		'Kelas' => set_value('Kelas', $row->Kelas),
            		'Alamat' => set_value('Alamat', $row->Alamat),
            		'NoHP' => set_value('NoHP', $row->NoHP),
                'Email' => set_value('Alamat', $row->Email),
                'nmrOrtu' => set_value('nmrOrtu', $row->nmrOrtu),
                'idSklh' => set_value('idSklh', $row->nmrOrtu),
	    );
            $this->template->load('templatep','siswaadm_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Siswaadmsekolah'));
        }
    }
    
    public function update_action() 
    {
        $this->_ruless();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('NIS', TRUE));
        } else {
            $data = array(
        
        		'NIS' => $this->input->post('NIS',TRUE),
        		'Nama' => $this->input->post('Nama',TRUE),
            'Sekolah' => $this->input->post('Sekolah',TRUE),
            // 'Jurusan' => $this->input->post('Jurusan',TRUE),
        		'Kelas' => $this->input->post('Kelas',TRUE),
        		'Alamat' => $this->input->post('Alamat',TRUE),
            'NoHP' => $this->input->post('NoHP',TRUE),
            'Email' => $this->input->post('Email',TRUE),
            'nmrOrtu' => $this->input->post('nmrOrtu',TRUE),
            'idSklh' => $this->input->post('idSklh',TRUE),
        
	    );

            $this->Siswa_model->update($this->input->post('NIS', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('Siswaadmsekolah'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Siswa_model->get_by_id($id);

        if ($row) {
            $this->Siswa_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('Siswaadmsekolah'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Siswaadmsekolah'));
        }
    }

     public function _ruless() 
    {
      $this->form_validation->set_rules('NIS', 'NIS', 'trim|required|xss_clean');
      $this->form_validation->set_rules('Nama', 'Nama', 'trim|required|xss_clean');
      $this->form_validation->set_rules('Sekolah', 'Sekolah', 'trim|required|xss_clean');
      // $this->form_validation->set_rules('Jurusan', 'Jurusan', 'trim|required');
      $this->form_validation->set_rules('Kelas', 'Kelas', 'trim|required|xss_clean');
      $this->form_validation->set_rules('Alamat', 'Alamat', 'trim|required|xss_clean');
      $this->form_validation->set_rules('NoHP', 'NoHP', 'trim|required|xss_clean');
      $this->form_validation->set_rules('Email', 'Email', 'trim|required|xss_clean');
      $this->form_validation->set_rules('nmrOrtu', 'nmrOrtu', 'trim|required|xss_clean');
      $this->form_validation->set_rules('idSklh', 'idSklh', 'trim|required|xss_clean');
      
      $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function _rules() 
    {
      $this->form_validation->set_rules('NIS', 'NIS', 'trim|required|xss_clean|callback_valid_id');
    	$this->form_validation->set_rules('Nama', 'Nama', 'trim|required|xss_clean');
      $this->form_validation->set_rules('Sekolah', 'Sekolah', 'trim|required|xss_clean');
      // $this->form_validation->set_rules('Jurusan', 'Jurusan', 'trim|required');
    	$this->form_validation->set_rules('Kelas', 'Kelas', 'trim|required|xss_clean');
    	$this->form_validation->set_rules('Alamat', 'Alamat', 'trim|required|xss_clean');
    	$this->form_validation->set_rules('NoHP', 'NoHP', 'trim|required|xss_clean');
      $this->form_validation->set_rules('Email', 'Email', 'trim|required|xss_clean');
      $this->form_validation->set_rules('nmrOrtu', 'nmrOrtu', 'trim|required|xss_clean');
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
               redirect('Siswaadmsekolah'); 
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
                    "NIS"=> $rowData[0][0],
                    "Nama"=> $rowData[0][1],
                    "Sekolah"=> $rowData[0][2],
                    //"Jurusan"=> $rowData[0][3],
                    "Kelas"=> $rowData[0][3],
                    "Alamat"=> $rowData[0][4],
                    "NoHP"=> $rowData[0][5],
                    "Email"=> $rowData[0][6],
                    "nmrOrtu"=> $rowData[0][7],
                    "idSklh"=> $rowData[0][8]
                );
                $this->db->insert("siswa",$data);
               } 
               $this->session->set_flashdata('msg','Berhasil upload ...!!'); 
               redirect('Siswaadmsekolah');
              }  
             }


    function createaksi()
    {
        $this->form_validation->set_error_delimiters('<div id="error">', '</div>');
        $this->_rules();
                if ($this->form_validation->run() == TRUE){
        $data = array(
            
              'NIS' => $this->input->post('NIS'),
            'Nama' => $this->input->post('Nama'),
            'Sekolah' => $this->input->post('Sekolah'),
            // 'Jurusan' => $this->input->post('Jurusan',TRUE),
            'Kelas' => $this->input->post('Kelas'),
            'Alamat' => $this->input->post('Alamat'),
            'NoHP' => $this->input->post('NoHP'),
            'Email' => $this->input->post('Email'),
            'nmrOrtu' => $this->input->post('nmrOrtu'),
            'idSklh' => $this->input->post('idSklh'),
                     
        );
        $this->Siswa_model->create_data($data);
        redirect('Siswaadmsekolah');
    }
        else {
                $this->create();
             
        }
        }
        /**
     * Cek apakah $nip valid, agar tidak ganda
     */
        function valid_id($NIS)
    {
        if ($this->Siswa_model->valid_id($NIS) == TRUE)
        {
            //echo 'valid_id',"<script>alert('Data yang diinputkan sudah ada')</script>";
            // echo 'valid_id', "kode guru dengan Kode $kodeguru sudah terdaftar";
            $this->form_validation->set_message('valid_id', "Nomor Induk dengan $NIS sudah terdaftar");
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