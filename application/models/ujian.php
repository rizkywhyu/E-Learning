<?php
require_once(APPPATH.'models\nilai.php'); 
class Ujian extends Nilai{
	private $kodeujian;
	private $judul;
	private $tanggalMulai;
	private $waktuMulai;
	private $waktuAkhir;
	private $jmlsoal;
	private $kelas;

	public function setKodeUjian($kodeujian){
		$this->kodeujian = $kodeujian;
	}

	public function getKodeUjian(){
		return $this->kodeujian;
	}

	public function setJudul($judul){
		$this->judul = $judul;
	}

	public function getJudul(){
		return $this->judul;
	}

	public function setTanggalMulai($tanggalMulai){
		$this->tanggalMulai = $tanggalMulai;
	}

	public function getTanggalMulai(){
		return $this->tanggalMulai;
	}

	public function setWaktuMulai($waktuMulai){
		$this->waktuMulai = $waktuMulai;
	}

	public function getWaktuMulai(){
		return $this->waktuMulai;
	}

	public function setWaktuAKhir($waktuAKhir){
		$this->waktuAKhir = $waktuAKhir;
	}

	public function getWaktuAKhir(){
		return $this->waktuAKhir;
	}

	public function setJmlSoal($jmlsoal){
		$this->jmlsoal = $jmlsoal;
	}

	public function getJmlSoal(){
		return $this->jmlsoal;
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

	function getKelas(){
		return $this->kelas;
	}
	function setKelas($kelas){
		$this->kelas = $kelas;
	}

	public function tambahUjian($data){
		$this->db->query('insert into ujian (idForum,judul,tanggalMulai,waktuMulai,waktuAkhir,kodemp,kodeguru,kelas,jmlsoal) values ("'.$data['idForum'].'","'.$data['judul'].'","'.$data['tanggalMulai'].'","'.$data['waktuMulai'].'","'.$data['waktuAkhir'].'","'.$data['kodemp'].'","'.$data['kodeguru'].'","'.$data['kelas'].'","'.$data['jmlsoal'].'")');
		return $this->db->insert_id();
	}

	public function tambahIsiUjian($data){
		$this->db->query('insert into soalujian (kodeujian,nomor, soal, jwb_benar, jwbA, jwbB, jwbC, jwbD, jwbE) VALUES ('.$data['kodeujian'].','.$data['nomor'].',"'.$data['soal'].'","'.$data['jwb_benar'].'","'.$data['jwbA'].'","'.$data['jwbB'].'","'.$data['jwbC'].'","'.$data['jwbD'].'","'.$data['jwbE'].'")');
	}

	public function getDaftarUjianForum($idForum){
		$data = $this->db->query('select kodeujian, judul, tanggalMulai, waktuMulai, waktuAkhir, kodemp, kodeguru, kelas, jmlsoal FROM ujian where idForum ='.$idForum);
		return $data;
	}

	public function getDetailUjian($kodeujian){
		$data = $this->db->query('select judul, tanggalMulai, waktuMulai, waktuAkhir, kodemp, kodeguru, kelas, jmlsoal, idForum, kodemp FROM ujian WHERE kodeujian = "'.$kodeujian.'"');
		$ujian = new Ujian();
			foreach($data->result_array() as $c){
				$ujian->setJudul($c['judul']);
				$ujian->setKodeujian($kodeujian);
				$ujian->setTanggalMulai($c['tanggalMulai']);
				$ujian->setWaktuMulai($c['waktuMulai']);
				$ujian->setWaktuAKhir($c['waktuAkhir']);
				$ujian->setJmlSoal($c['jmlsoal']);
				$ujian->setKodeGuru($c['kodeguru']);
				$ujian->setIdForum($c['idForum']);
				$ujian->setKodemp($c['kodemp']);
				$ujian->setKelas($c['kelas']);
		}
		return $ujian;
	}

	public function hapusUjian($kodeujian){
		$data = $this->db->query('delete from ujian where kodeujian="'.$kodeujian.'"');
	}

	public function getDaftarSoal($kodeujian){
		$data = $this->db->query('select nomor, soal, jwb_benar, jwbA, jwbB, jwbC, jwbD, jwbE from soalujian where kodeujian="'.$kodeujian.'"');
		return $data;
	}

	public function updateIsiUjian($kodeujian,$data){
		$this->db->query('update soalujian set soal="'.$data['soal'].'",jwb_benar="'.$data['jwb_benar'].'",jwbA="'.$data['jwbA'].'",jwbB="'.$data['jwbB'].'",jwbC="'.$data['jwbC'].'",jwbD="'.$data['jwbD'].'",jwbE="'.$data['jwbE'].'" where kodeujian = "'.$kodeujian.'" and nomor ="'.$data['nomor'].'"');
	}

	public function updateUjian($data){
		$this->db->query('update ujian set judul="'.$data['judul'].'", tanggalMulai="'.$data['tanggalMulai'].'", waktuMulai="'.$data['waktuMulai'].'", waktuAkhir="'.$data['waktuAkhir'].'" where kodeujian = "'.$data['kodeujian'].'"');
	}

	public function cekWaktu($kodeujian){
		$data = $this->db->query('select datediff(curdate(),tanggalMulai) as BatasTgl, timediff(waktuAKhir,curtime()) as batasWaktu, timediff(waktuMulai,curtime()) as waktuMulai from ujian where kodeujian = "'.$kodeujian.'"');
		foreach($data->result_array() as $c){
			return $dataArray = array(
				'batasTanggal' => $c['BatasTgl'],
				'batasWaktu' => $c['batasWaktu'],
				'waktuMulai' => $c['waktuMulai']
				);
		}
	}


}



 ?>