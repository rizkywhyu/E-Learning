<?php 

require_once(APPPATH.'models\akun.php');

class Guru extends Akun{
	private $kodeguru;

	function setKodeGuru($kodeguru){
		$this->kodeguru = $kodeguru;
	}

	function getKodeGuru(){
		return $this->kodeguru;
	}

	function getDaftarMP($kodeguru){
		$data = $this->db->query('select kodeguru , kodemp, kelas, nama from matapelajaran where kodeguru = "'.$kodeguru.'"');
		return $data;
	}

	function getDaftarNilaiAll($kodeguru){
		$data = $this->db->query('select matapelajaran.kodeguru as kodeguru , matapelajaran.kodemp as kodemp, matapelajaran.kelas as kelas, matapelajaran.Nama as nama, siswa.nis as nis from matapelajaran inner join siswa on matapelajaran.kelas = siswa.kelas where kodeguru = "'.$kodeguru.'"');
		return $data;
	}

	function getDaftarNilaiUjian($kelas,$kodemp,$kodeguru){
		return $this->db->query('select siswa.nis as NIS, siswa.Nama as Nama_Siswa, ujian.judul as namaUjian, ujian.kelas as Kelas, matapelajaran.nama as Mata_Pelajaran, nilai_siswa_ujian.nilai as Nilai from ujian inner join nilai_siswa_ujian on nilai_siswa_ujian.kodeujian = ujian.kodeujian inner join siswa on siswa.nis = nilai_siswa_ujian.nis inner join matapelajaran on matapelajaran.kodemp = ujian.kodemp where ujian.kelas = "'.$kelas.'" and ujian.kodemp="'.$kodemp.'" and ujian.kodeguru="'.$kodeguru.'" ');
	}

	function getDaftarNilaiTugas($kelas,$kodemp){
		return $this->db->query('select siswa.nis as NIS, siswa.Nama as Nama_Siswa, tugas.judul as namaTugas, tugas.kelas as Kelas, matapelajaran.nama as Mata_Pelajaran, nilai_siswa_tugas.nilai as Nilai from tugas inner join nilai_siswa_tugas on nilai_siswa_tugas.kodetugas = tugas.kodetugas inner join siswa on siswa.nis = nilai_siswa_tugas.nis inner join matapelajaran on matapelajaran.kodemp = tugas.kodemp where tugas.kelas = "'.$kelas.'" and tugas.kodemp="'.$kodemp.'"');
	}

	function getDetailGuru($kodeguru){
		$data = $this->db->query('select nama,kodeguru,Sekolah,alamat,nohp,email,idSklh from guru where kodeguru = "'.$kodeguru.'"');
		$guru = new Guru();
		foreach($data->result_array() as $c){
			$guru->setNama($c['nama']);
			$guru->setKodeGuru($c['kodeguru']);
			$guru->setSekolah($c['Sekolah']);
			$guru->setIdSklh($c['idSklh']);
			$guru->setAlamat($c['alamat']);
			$guru->setNohp($c['nohp']);
			$guru->setEmail($c['email']);
		}
		return $guru;
	}

}


 ?>