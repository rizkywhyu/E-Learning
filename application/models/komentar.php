<?php

class Komentar extends CI_Model {
	private $isi;
	private $idForum;
	private $idComm;


	function getIsi(){
		return $this->isi;
	}

	function setIsi($isi){
		$this->isi = $isi;
	}

	function getIdForum(){
		return $this->idForum;
	}

	function setIdForum($idForum){
		$this->idForum = $idForum;
	}

	function getIdComm(){
		return $this->idComm;
	}

	function setIdComm($idComm){
		$this->idComm = $idComm;
	}
	
	function getDetailComm($idComm){
		$data = $this->db->query('select idForum, isi, tgl, jam, email from komentar where idComm = "'.$idComm.'"');
		return $data;
	}

	function getDetailComm2($idComm){
		$data = $this->db->query('select id, jenis, isi, tgl, jam, email from komentar2 where idComm = "'.$idComm.'"');
		return $data;
	}

	function getDaftarByForum($idForum){
		$data = $this->db->query('select idComm, isi, tgl, jam, email from komentar where idForum = "'.$idForum.'"');
		return $data;
	}

	function getDaftarByTugas($kodeTugas){
		$data = $this->db->query('select idComm, isi, tgl, jam, email from komentar2 where id = "'.$kodeTugas.'" AND jenis = 1');
		return $data;
	}

	function getDaftarByMateri($kodeMateri){
		$data = $this->db->query('select idComm, isi, tgl, jam, email from komentar2 where id = "'.$kodeMateri.'" AND jenis = 0');
		return $data;
	}

	function insert($idForum,$isi,$email){
		$data = $this->db->query('insert into komentar(idForum,isi,tgl,jam,email) values("'.$idForum.'","'.$isi.'",curdate(),curtime(),"'.$email.'")');
		return $data;
	}

	function insert2($id,$jenis,$isi,$email){
		$data = $this->db->query('insert into komentar2(id,jenis,isi,tgl,jam,email) values("'.$id.'","'.$jenis.'","'.$isi.'",curdate(),curtime(),"'.$email.'")');
		return $data;
	}

	function delete($idComm){
		$data = $this->db->query('delete from komentar where idComm = "'.$idComm.'"');
		return $data;
	}

	function delete2($idComm){
		$data = $this->db->query('delete from komentar where idComm = "'.$idComm.'"');
		return $data;
	}
}

?>