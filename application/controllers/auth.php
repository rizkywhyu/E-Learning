<?php 
if ( ! defined('BASEPATH'))
 exit('No direct script access allowed');

class auth extends CI_Controller {

function __construct() {
		 parent::__construct();
		 $this->load->model('admin/login_model'); 
 }
 

 function index() { 
	 $data = array(
		 'title'=>'Login Administrator',
		 'isi' =>'admin/login_view'
	 );

	 $this->load->view('admin/login_view',$data);
	  // $login = $this->login_model->get_all();

   //      $data = array(
   //          'login_data' => $login
   //      );
    

   //      $this->template->load('template','admin/login_view', $data);
 }
 

 function validasi() { 
	 $data=array(
	 'username'=>$this->input->post('username'),
	 'password'=>$this->input->post('password')
	 );
	 
	 
	 $cek=$this->_auth->ambil_data($data);
	 if($cek == 1) {  
		 $sesi=$this->session->set_userdata($data);
		 redirect('menu');
	 }else
	 {
		 $this->load->view('admin/login_view');
 }
 }
 
 function masuk()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$cek = $this->login_model->cek($username, $password);
		//echo $cek;
		if($cek->num_rows() ==  1)
		{
			foreach($cek->result() as $data){
				$sess_data['Id_User'] = $data->Id_User;
				$sess_data['username'] = $data->username;
				$sess_data['jenis_user'] = $data->jenis_user;
				$this->session->set_userdata($sess_data);
			}
			if($this->session->userdata('jenis_user') == '1')
			{
				redirect('menu');
			}
			elseif($this->session->userdata('jenis_user') == '2')
			{
				redirect('');
			}
			elseif($this->session->userdata('jenis_user') == '3')
			{
				redirect('');
			}
		}
		else
		{
			$this->session->set_flashdata('pesan', 'Maaf, kombinasi username dengan password salah.');
			redirect(base_url('auth'));
		}
	}
 function logout() {
	 session_destroy();
	 redirect('auth');
 } 
}