<?php 
require_once(APPPATH.'models\nilai.php');
abstract class Abstract_File extends nilai{
	private $judul;
	private $deskripsi;
	private $namafile;
	private $idForum;
	private $kodemp;
	private $kodeguru;

	function setJudul($judul){
		$this->judul = $judul;
	}

	function getJudul(){
		return $this->judul;
	}

	function setDeskripsi($deskripsi){
		$this->deskripsi = $deskripsi;
	}

	function getDeskripsi(){
		return $this->deskripsi;
	}

	function setNamaFile($namafile){
		$this->namafile = $namafile;
	}

	function getNamaFile(){
		return $this->namafile;
	}

	function getKodemp(){
		return $this->kodemp;
	}

	function setKodemp($kodemp){
		$this->kodemp = $kodemp;
	}

	function setIdForum($idForum){
		$this->idForum = $idForum;
	}

	function getIdForum(){
		return $this->idForum;
	}

	function setKodeGuru($kodeguru){
		$this->kodeguru = $kodeguru;
	}

	function getKodeGuru(){
		return $this->kodeguru;
	}
}


 ?>