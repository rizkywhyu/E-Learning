<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

	public function login()
	{
		$this->load->view('login.php');
	}
	
	public function register(){
		$this->load->view('register.php');	
	}

	public function smssend(){
		$this->load->view('sms.php');	
	}

}
?>