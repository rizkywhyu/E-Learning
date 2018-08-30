<?php
 
class Forum extends CI_Model{

	private $nama;
	private $idForum;
	private $kelas;
	private $idSklh;
	private $kodeguru;
	private $mp;
	private $password;


	function setNama($nama){
		$this->nama = $nama;
	}

	function getNama(){
		return $this->nama;
	}

	function setPassword($password){
		$this->password = $password;
	}

	function getPassword(){
		return $this->password;
	}

	function setKodeGuru($kodeguru){
		$this->kodeguru = $kodeguru;
	}

	function getKodeGuru(){
		return $this->kodeguru;
	}

	function setIdForum($idForum){
		$this->idForum = $idForum;
	}

	function getIdForum(){
		return $this->idForum;
	}

	function getIdSklh(){
		return $this->idSklh;
	}

	function setIdSklh($idSklh){
		$this->idSklh = $idSklh;
	}

	function setKelas($kelas){
		$this->kelas = $kelas;
	}

	function getKelas(){
		return $this->kelas;
	}

	function setMp($mp){
		$this->mp = $mp;
	}

	function getMp(){
		return $this->mp;
	}

	function tambahForum($password,$nama,$kelas,$mp,$kodeguru,$idSklh){
		$this->db->query('insert into forum(password,kodeguru, nama, kelas, mp, idSklh) VALUES ("'.$password.'","'.$kodeguru.'","'.$nama.'","'.$kelas.'","'.$mp.'","'.$idSklh.'")');
		$id = $this->db->insert_id();
		return $id;
	}

	function hapusForum($idForum){
		$this->db->query('delete from forum where idForum = '.$idForum);
	}

	function getDaftarForumBySklh($idSklh){
		$data = $this->db->query('select idForum, password, nama, kelas, mp, kodeguru from forum where idSklh="'.$idSklh.'" ');
		return $data;
	}

	function getDaftarForumByGuru($kodeguru){
		$data = $this->db->query('select idForum, password, nama, kelas, mp, idSklh from forum where kodeguru="'.$kodeguru.'"');
		return $data;
	}

	function getSiswaAksesForum($idForum){
		$data = $this->db->query('select aksesforum.Nis as nis, forum.mp as kodemp from aksesforum inner join forum on aksesforum.idForum = forum.idForum where aksesforum.idforum="'.$idForum.'" and aksesforum.akses=1');
		return $data;
	}

	function getForum($idForum){
		$data = $this->db->query('select password, nama, kelas, mp, kodeguru, idSklh from forum where idForum='.$idForum);
		$forum = new forum();
		foreach ($data->result_array() as $c) {
			$forum->setIdForum($idForum);
			$forum->setPassword($c['password']);
			$forum->setNama($c['nama']);
			$forum->setKelas($c['kelas']);
			$forum->setmp($c['mp']);
			$forum->setKodeGuru($c['kodeguru']);
			$forum->setIdSklh($c['idSklh']);
		}
		return $forum;
	}



}