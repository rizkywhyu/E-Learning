<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sekolah extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('Sekolah_model');
        $this->load->library('form_validation');
        $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
        $this->load->helper(array('form', 'url'));
        
    }

    public function index()
    {
        $Sekolah = $this->Sekolah_model->get_all();

        $data = array(
            //'judul' => set_value('judul'),
            //'action' => site_url('Sekolah/proses'),
            //'error' => $error['error'],
            'Sekolah_data' => $Sekolah
        );

        $this->template->load('template','Sekolah_list', $data);
        //$this->template->load('template','uu',$data);
    }

    public function read($id) 
    {
        $row = $this->Sekolah_model->get_by_id($id);
        if ($row) {
            $data = array(
            'idSklh' => $row->idSklh,
        		'nm_sklh' => $row->nm_sklh,
        		'u_name' => $row->u_name,
        		
        		
       );
            $this->template->load('template','Sekolah_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Sekolah'));
        }
    }

   

    public function create() 
    {
        
        $data = array(
            'button' => 'Create',
            'action' => site_url('Sekolah/createaksi'),
            'idSklh' => set_value('idSklh'),
      	    'nm_sklh' => set_value('nm_sklh'),
      	    'u_name' => set_value('u_name'),
      	    
	    
        
	);
        $this->template->load('template','Sekolah_form', $data);
    }
    
    
    
    public function update($id) 
    {
        $row = $this->Sekolah_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('Sekolah/update_action'),
                'idSklh' => set_value('idSklh', $row->idSklh),
            		'nm_sklh' => set_value('nm_sklh', $row->nm_sklh),
            		'u_name' => set_value('u_name', $row->u_name),
      		
      		
        
	    );
            $this->template->load('template','Sekolah_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Sekolah'));
        }
    }
    
    public function update_action() 
    {
        $this->_ruless();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idSklh', TRUE));
        } else {
            $data = array(
                'idSklh' => $this->input->post('idSklh',TRUE),
            		'nm_sklh' => $this->input->post('nm_sklh',TRUE),
    		        'u_name' => $this->input->post('u_name',TRUE),
    		
    		
	    );

            $this->Sekolah_model->update($this->input->post('idSklh', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('Sekolah'));
        }
    }

    
    
    public function delete($id) 
    {
        $row = $this->Sekolah_model->get_by_id($id);

        if ($row) {
            $this->Sekolah_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('Sekolah'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('Sekolah'));
        }
    }

    public function _rules() 
    {
      $this->form_validation->set_rules('nm_sklh', 'nm_sklh', 'trim|required|xss_clean');
    	$this->form_validation->set_rules('u_name', 'u_name', 'trim|required|xss_clean|callback_valid_id');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
     public function _ruless() 
    {
      $this->form_validation->set_rules('nm_sklh', 'nm_sklh', 'trim|required|xss_clean');
      $this->form_validation->set_rules('u_name', 'u_name', 'trim|required|xss_clean');
      $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    

    
            
             
    function createaksi()
    {
        $this->form_validation->set_error_delimiters('<div id="error">', '</div>');
        $this->_rules();
                if ($this->form_validation->run() == TRUE){
        $data = array(
            
              'nm_sklh' => $this->input->post('nm_sklh'),
              'u_name' => $this->input->post('u_name'),
              
              
                     
        );
        $this->Sekolah_model->create_data($data);
        redirect('Sekolah');
    }
        else {
                $this->create();
             
        }
        }
        /**
     * Cek apakah $nip valid, agar tidak ganda
     */
        function valid_id($u_name)
    {
        if ($this->Sekolah_model->valid_id($u_name) == TRUE)
        {
            //echo 'valid_id',"<script>alert('Data yang diinputkan sudah ada')</script>";
            // echo 'valid_id', "kode guruadm dengan Kode $kodeguru sudah terdaftar";
            $this->form_validation->set_message('valid_id', "u_name dengan $u_name sudah terdaftar");
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