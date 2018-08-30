<?php
require_once(APPPATH.'models\nilai.php'); 
class Kuis extends Nilai{
	private $kodekuis;
	private $judul;
	private $tanggalMulai;
	private $waktuMulai;
	private $waktuAkhir;
	private $jmlsoal;

	public function setKodeKuis($kodekuis){
		$this->kodekuis = $kodekuis;
	}

	public function getKodeKuis(){
		return $this->kodekuis;
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

	public function tambahKuis($data){
		$this->db->query('insert into kuis (idForum,judul,tanggalMulai,waktuMulai,waktuAkhir,kodemk,kodedsn,kelas,jmlsoal) values ("'.$data['idForum'].'","'.$data['judul'].'","'.$data['tanggalMulai'].'","'.$data['waktuMulai'].'","'.$data['waktuAkhir'].'","'.$data['kodemk'].'","'.$data['kodedsn'].'","'.$data['kelas'].'","'.$data['jmlsoal'].'")');
		return $this->db->insert_id();
	}

	public function tambahIsiKuis($data){
		$this->db->query('insert into soalkuis (kodekuis,nomor, soal, jwb_benar, jwbA, jwbB, jwbC, jwbD, jwbE) VALUES ('.$data['kodekuis'].','.$data['nomor'].',"'.$data['soal'].'","'.$data['jwb_benar'].'","'.$data['jwbA'].'","'.$data['jwbB'].'","'.$data['jwbC'].'","'.$data['jwbD'].'","'.$data['jwbE'].'")');
	}

	public function getDaftarSoalForum($idForum){
		$data = $this->db->query('select kodekuis, judul, tanggalMulai, waktuMulai, waktuAkhir, kodemk, kodedsn, kelas, jmlsoal FROM kuis where idForum ='.$idForum);
		return $data;
	}

	public function getDetailKuis($kodekuis){
		$data = $this->db->query('select judul, tanggalMulai, waktuMulai, waktuAkhir, kodemk, kodedsn, kelas, jmlsoal FROM kuis WHERE kodekuis = "'.$kodekuis.'"');
			foreach($data->result_array() as $c){
				$this->setJudul($c['judul']);
				$this->setKodeKuis($kodekuis);
				$this->setTanggalMulai($c['tanggalMulai']);
				$this->setWaktuMulai($c['waktuMulai']);
				$this->setWaktuAKhir($c['waktuAkhir']);
				$this->setJmlSoal($c['jmlsoal']);
			return $data;
		}
	}

	public function hapusKuis($kodekuis){
		$data = $this->db->query('delete from kuis where kodekuis="'.$kodekuis.'"');
	}

	public function getDaftarSoal($kodekuis){
		$data = $this->db->query('select nomor, soal, jwb_benar, jwbA, jwbB, jwbC, jwbD, jwbE from soalkuis where kodekuis="'.$kodekuis.'"');
		return $data;
	}

	public function updateIsiKuis($kodekuis,$data){
		$this->db->query('update soalkuis set soal="'.$data['soal'].'",jwb_benar="'.$data['jwb_benar'].'",jwbA="'.$data['jwbA'].'",jwbB="'.$data['jwbB'].'",jwbC="'.$data['jwbC'].'",jwbD="'.$data['jwbD'].'",jwbE="'.$data['jwbE'].'" where kodekuis = "'.$kodekuis.'" and nomor ="'.$data['nomor'].'"');
	}

	public function updateKuis($data){
		$this->db->query('update kuis set judul="'.$data['judul'].'", tanggalMulai="'.$data['tanggalMulai'].'", waktuMulai="'.$data['waktuMulai'].'", waktuAkhir="'.$data['waktuAkhir'].'" where kodekuis = "'.$data['kodekuis'].'"');
	}

	public function cekWaktu($kodekuis){
		$data = $this->db->query('select datediff(curdate(),tanggalMulai) as BatasTgl, timediff(waktuAKhir,curtime()) as batasWaktu, timediff(waktuMulai,curtime()) as waktuMulai from kuis where kodekuis = "'.$kodekuis.'"');
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