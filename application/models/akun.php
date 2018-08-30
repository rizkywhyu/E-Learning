<?php

class Akun extends CI_Model {
	private $nama;
	private $Sekolah;
	private $idSklh;
	private $alamat;
	private $nohp;
	private $email;
	private $password;


	function getNama(){
		return $this->nama;
	}

	function setNama($nama){
		$this->nama = $nama;
	}

	function getSekolah(){
		return $this->Sekolah;
	}

	function setSekolah($Sekolah){
		$this->Sekolah = $Sekolah;
	}

	function getIdSklh(){
		return $this->idSklh;
	}

	function setIdSklh($idSklh){
		$this->idSklh = $idSklh;
	}

	function getAlamat(){
		return $this->alamat;
	}

	function setAlamat($alamat){
		$this->alamat = $alamat;
	}

	function getNohp(){
		return $this->nohp;
	}

	function setNohp($nohp){
		$this->nohp = $nohp;
	}

	function getEmail(){
		return $this->email;
	}

	function setEmail($email){
		$this->email = $email;
	}
	function getPass(){
		return $this->password;
	}

	function setPass($password){
		$this->password = $password;
	}

	function cekUser($username,$password){
		$data = $this->db->query('select password,level from user where username="'.$username.'" and password="'.$password.'"');
		return $data;
	}

	function isExistUser($username){
		$data = $this->db->query('select password,level from user where username="'.$username.'"');
		return $data;
	}

	function updatePass($password,$username){
		$data = $this->db->query('update user set Password = "'.$password.'" where username = "'.$username.'"');
		return $data;
	}
	
}

?>