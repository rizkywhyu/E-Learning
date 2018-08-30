<?php

require_once(APPPATH.'models\akun.php');

class Siswa extends Akun {

	private $nis;
	private $kelas;
	private $nmrOrtu;

	function setNis($nis){
		$this->nis = $nis;
	}

	function getNis(){
		return $this->nis;
	}

	function getKelas(){
		return $this->kelas;
	}
	function setKelas($kelas){
		$this->kelas = $kelas;
	}

	function setNmrOrtu($nmrOrtu){
		$this->nmrOrtu = $nmrOrtu;
	}

	function getNmrOrtu(){
		return $this->nmrOrtu;
	}

	function updateSiswa($nama,$alamat,$nohp,$email,$nis,$nmrOrtu){
		$this->db->query('update siswa set nama="'.$nama.'",alamat="'.$alamat.'",nohp="'.$nohp.'",email="'.$email.'",nmrOrtu="'.$nmrOrtu.'" where nis="'.$nis.'"');
	}

	function getDaftarMp($nis,$kelas,$idSklh){
		$data = $this->db->query('select matapelajaran.kodemp ,matapelajaran.nama from matapelajaran inner join siswa on matapelajaran.idSklh = siswa.idSklh where matapelajaran.kelas ="'.$kelas.'" and siswa.Nis="'.$nis.'"');
		return $data;
	}

	/*function getDaftarTugas($nis){
		$data = $this->db->query('select tugas.kodetugas, tugas.judul, tugas.deskripsi, tugas.kelas from tugas inner join jawaban_tugas on tugas.kodetugas = jawaban_tugas.kodetugas where nis = "'.$nis.'"');
		return $data;
	}*/

	function setAkses($nis,$idForum){
		$data = $this->db->query('insert into aksesForum(idForum,nis,akses) values ("'.$idForum.'","'.$nis.'",1)');
	}

	function cekAkses($nis,$idForum){
		$data = $this->db->query('select akses from aksesforum where nis ="'.$nis.'" and idForum="'.$idForum.'"');
		foreach($data->result_array() as $c){
			return $c['akses'];
		}
		
	}

	function getDetailSiswa($nis){
		$data = $this->db->query('select nama,nis,Sekolah,kelas,alamat,nohp,email,nmrOrtu,idSklh from siswa where nis = "'.$nis.'"');
		$siswa = new Siswa();
		foreach($data->result_array() as $c){
			$siswa->setnis($c['nis']);
			$siswa->setNama($c['nama']);
			$siswa->setSekolah($c['Sekolah']);
			$siswa->setIdSklh($c['idSklh']);
			$siswa->setKelas($c['kelas']);
			$siswa->setAlamat($c['alamat']);
			$siswa->setNohp($c['nohp']);
			$siswa->setEmail($c['email']);
			$siswa->setNmrOrtu($c['nmrOrtu']);
		}
		return $siswa;
	}


	function getDaftarForum($nis){
		return $this->db->query('select aksesForum.idForum, Forum.kelas, Forum.mp from aksesForum inner join forum on aksesForum.idForum = Forum.idForum where nis="'.$nis.'"');
	}
}

?>