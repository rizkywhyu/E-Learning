<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller
{
    
        
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('form_validation');
        $this->load->library(array('PHPExcel','PHPExcel/IOFactory'));
        $this->load->helper(array('form', 'url'));
        
    }

    public function index()
    {
        $user = $this->User_model->get_all();

        $data = array(
            //'judul' => set_value('judul'),
            //'action' => site_url('user/proses'),
            //'error' => $error['error'],
            'user_data' => $user
        );

        $this->template->load('template','user_list', $data);
        //$this->template->load('template','uu',$data);
    }

    public function read($id) 
    {
        $row = $this->User_model->get_by_id($id);
        if ($row) {
            $data = array(
            //'uid' => $row->uid,
        		'username' => $row->username,
        		'password'=> $row->password,
        		'level' => $row->level,
        		
       );
            $this->template->load('template','user_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    function edit(){ 
    //$id=$this->uri->segment(3);
    $data['user_data']=$this->User_model->get_by_id($id);
     
    if (empty($id) or count($data['user_data'])==NULL ){
        redirect('user/index');
    }else{    
        $result=$this->User_model->get_by_id($id);
        $data['uid'] = $result['uid'];
        $data['username'] = $result['username'];
        $data['password'] = $result['password'];
        $data['level'] = $result['level'];
        $this->template->load('template','user_form', $data);
    }    
  }

   

        
    public function update($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('user/createaksi'),
                //'uid' => set_value('uid'),
            		'username' => set_value('username'),
            		'password' => set_value('password'),
            		//'level' => set_value('level', $row->level),
      		
        
	    );
            $this->template->load('template','user_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }
    
    public function update_action() 
    {
        $this->_ruless();

        if ($this->form_validation->run() == TRUE) {
            $this->update($this->input->post('uid'));
        } else {
            $data = array(
              //'uid' => $this->input->post('uid'),
           		'username' => $this->input->post('username'),
          		'password' => md5($this->input->post('password1')),
          		//'level' => $this->input->post('level'),
    		
	    );

            $this->User_model->update($this->input->post('uid'), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('user'));
        }
    }

    
    
    public function delete($id) 
    {
        $row = $this->User_model->get_by_id($id);

        if ($row) {
            $this->User_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('user'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('user'));
        }
    }

    public function _rules() 
    {
      $this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean|callback_valid_id');
    	$this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');
    	$this->form_validation->set_rules('level', 'level', 'trim|required|xss_clean');
	  	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
     public function _ruless() 
    {
      $this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean');
      $this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');
      $this->form_validation->set_rules('level', 'level', 'trim|required|xss_clean');
      $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    

            
             
    function createaksi()
    {
        //$this->form_validation->set_error_delimiters('<div id="error">', '</div>');
        $this->_ruless();
                if ($this->form_validation->run() == TRUE){
        $data = array(
            
              // 'username' => $this->input->post('username'),
              'password' => md5($this->input->post('password')),
              // 'level' => $this->input->post('level'),
              
                     
        );
        $this->User_model->create_data($data);
        redirect('user');
    }
        else {
                $this->index();
             
        }
        }
        /**
     * Cek apakah $nip valid, agar tidak ganda
     */
        function valid_id($username)
    {
        if ($this->User_model->valid_id($username) == TRUE)
        {
            //echo 'valid_id',"<script>alert('Data yang diinputkan sudah ada')</script>";
            // echo 'valid_id', "kode guruadm dengan Kode $kodeguru sudah terdaftar";
            $this->form_validation->set_message('valid_id', "username dengan $username sudah terdaftar");
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