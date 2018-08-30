<?php 
require_once(APPPATH.'models\akun.php');

class Admin extends Akun {
	private $username;

	public function setUsername($username){
		$this->username = $username;
	}

	public function getUsername(){
		return $this->username;
	}

	public function getDetailAdminSklh($username){
		$data = $this->db->query('select idSklh, nm_sklh from sekolah where u_name = "'.$username.'"');
		$admin = new admin();
		foreach($data->result_array() as $c){
			$admin->setNama($c['nm_sklh']);
			$admin->setIdSklh($c['idSklh']);
			$admin->setUsername($username);
		}
		return $admin;
	}
}

 ?>