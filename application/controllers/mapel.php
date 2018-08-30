<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class mapel extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('mapel_model');
        $this->load->library('form_validation');
        $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
        $this->load->helper(array('form', 'url'));
        
    }

    public function index()
    {
        $mapel = $this->mapel_model->getmapelbysekolah($this->session->userdata('id'));

        $data = array(
            'judul' => set_value('judul'),
            //'action' => site_url('Guru/proses'),
            //'error' => $error['error'],
            'mapel_data' => $mapel
        );

        $this->template->load('templatep','mapel_list', $data);
        //$this->template->load('template','uu',$data);
        // $this->load->model('mapel_model');
        // $data['mapel_data'] = $this->mapel_model->get_all_mapel();
        // $this->template->load('templatep','mapel_list', $data);
    }

    public function read($id) 
    {
        $row = $this->mapel_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'kodemp' => $row->kodemp,
        		'nama' => $row->nama,
        		'idSklh' => $row->idSklh,
        		'kelas' => $row->kelas,
        		'kodeguru' => $row->kodeguru,
       );
            $this->template->load('templatep','mapel_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mapel'));
        }
    }

   

    public function create() 
    {
        
        $data = array(
            'button' => 'Create',
            'action' => site_url('mapel/createaksi'),
            // 'dd_tempat' => $this->Barang_model->dd_tempat(),
            // 'tempat_selected' => $this->input->post('tempat') ? $this->input->post('tempat') : '',
	    'kodemp' => set_value('kodemp'),
	    'nama' => set_value('nama'),
	    
      'idSklh' => set_value('idSklh'),
      'kelas' => set_value('kelas'),
        'kodeguru' => set_value('kodeguru'),
	);
        $this->template->load('templatep','mapel_form', $data);
    }
    
    
    
    public function update($id) 
    {
        $row = $this->mapel_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('mapel/update_action'),
      		'kodemp' => set_value('kodemp', $row->kodemp),
      		'nama' => set_value('nama', $row->nama),
      		
          'idSklh' => set_value('idSklh', $row->idSklh),
          'kelas' => set_value('kelas', $row->kelas),
          'kodeguru' => set_value('kodemp', $row->kodeguru),
        
	    );
            $this->template->load('templatep','mapel_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mapel'));
        }
    }
    
    public function update_action() 
    {
        $this->_ruless();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('kodemp', TRUE));
        } else {
            $data = array(
        
    		'kodemp' => $this->input->post('kodemp',TRUE),
    		'nama' => $this->input->post('nama',TRUE),
    		
        'idSklh' => $this->input->post('idSklh',TRUE),
        'kelas' => $this->input->post('kelas',TRUE),
        'kodeguru' => $this->input->post('kodeguru',TRUE),
	    );

            $this->mapel_model->update($this->input->post('kodemp', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('mapel'));
        }
    }

    
    
    public function delete($id) 
    {
        $row = $this->mapel_model->get_by_id($id);

        if ($row) {
            $this->mapel_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('mapel'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('mapel'));
        }
    }
public function _ruless() 
    {
     $this->form_validation->set_rules('kodemp', 'kodemp', 'trim|required|xss_clean');
  $this->form_validation->set_rules('nama', 'nama', 'trim|required|xss_clean');
  
  $this->form_validation->set_rules('idSklh', 'idSklh', 'trim|required|xss_clean');
   $this->form_validation->set_rules('kelas', 'kelas', 'trim|required|xss_clean');
    $this->form_validation->set_rules('kodeguru', 'kodeguru', 'trim|required|xss_clean');
  
  $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function _rules() 
    {
      
	  $this->form_validation->set_rules('kodemp', 'kodemp', 'trim|required|xss_clean|callback_valid_id');
  $this->form_validation->set_rules('nama', 'nama', 'trim|required|xss_clean');
  
  $this->form_validation->set_rules('idSklh', 'idSklh', 'trim|required|xss_clean');
   $this->form_validation->set_rules('kelas', 'kelas', 'trim|required|xss_clean');
   $this->form_validation->set_rules('kodeguru', 'kodeguru', 'trim|required|xss_clean');
  
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    

   
            
             
    function createaksi()
    {
        $this->form_validation->set_error_delimiters('<div id="error">', '</div>');
        $this->_rules();
                if ($this->form_validation->run() == TRUE){
        $data = array(
            
              'kodemp' => $this->input->post('kodemp'),
              'nama' => $this->input->post('nama'),
              
              'idSklh' => $this->input->post('idSklh'),
              'kelas' => $this->input->post('kelas'),
              'kodeguru' => $this->input->post('kodeguru'),
                     
        );
        $this->mapel_model->create_data($data);
        redirect('mapel');
    }
        else {
                $this->create();
             
        }
        }
        /**
     * Cek apakah $nip valid, agar tidak ganda
     */
        function valid_id($kodemp)
    {
        if ($this->mapel_model->valid_id($kodemp) == TRUE)
        {
            //echo 'valid_id',"<script>alert('Data yang diinputkan sudah ada')</script>";
            // echo 'valid_id', "kode guru dengan Kode $kodeguru sudah terdaftar";
            $this->form_validation->set_message('valid_id', "kode mp dengan $kodemp sudah terdaftar");
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