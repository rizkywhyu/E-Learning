<?php

class ReplyKomentar extends CI_Model {
	private $isi;
	private $idRcomm;
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

	function getIdRComm(){
		return $this->idRComm;
	}

	function setIdRComm($idRComm){
		$this->idRComm = $idRComm;
	}
	
	function getDetailRComm($idRComm){
		$data = $this->db->query('select idRcomm,idComm, isi, tgl, jam, email from reply_komentar where idRComm = "'.$idRComm.'"');
		return $data;
	}

	function getDaftarByComm($idComm){
		$data = $this->db->query('select idRComm, isi, tgl, jam, email from reply_komentar where idComm = "'.$idComm.'"');
		return $data;
	}

	function insert($idComm,$isi,$email){
		$data = $this->db->query('insert into reply_komentar(idComm,isi,tgl,jam,email) values("'.$idComm.'","'.$isi.'",curdate(),curtime(),"'.$email.'")');
		return $data;
	}

	function delete($idRComm){
		$data = $this->db->query('delete from reply_komentar where idRComm = "'.$idComm.'"');
		return $data;
	}
}

?>