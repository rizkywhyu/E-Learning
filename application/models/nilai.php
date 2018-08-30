<?php 
abstract class Nilai extends CI_Model{
	
	public function saveNilai($nilai,$kode,$nis,$jenis){
		$data = $this->db->query('select nis from nilai_siswa_'.$jenis.' where kode'.$jenis.'="'.$kode.'" and nis="'.$nis.'"');
		if($data->num_rows() == 0){
			$this->db->query('insert into nilai_siswa_'.$jenis.'(nis,kode'.$jenis.',nilai) VALUES ("'.$nis.'","'.$kode.'","'.$nilai.'")');
		}
		else {
			$this->db->query('update nilai_siswa_'.$jenis.' set nilai="'.$nilai.'" where kode'.$jenis.'="'.$kode.'" and nis="'.$nis.'"');
		}
		return $data;
		
	}

	public function getNilai($nis,$kode,$jenis){
		$data =  $this->db->query('select nilai from nilai_siswa_'.$jenis.' where kode'.$jenis.' = "'.$kode.'" and nis = "'.$nis.'"');
		foreach($data->result_array() as $c){
			return $c['nilai'];
		}
	}

	public function getDaftarNilai($nis,$jenis){
		$data = $this->db->query('select matapelajaran.Nama as namamp, '.$jenis.'.judul as nama'.$jenis.', nilai_siswa_'.$jenis.'.nilai as nilai from matapelajaran join '.$jenis.' on matapelajaran.Kodemp = '.$jenis.'.kodemp join nilai_siswa_'.$jenis.' on nilai_siswa_'.$jenis.'.kode'.$jenis.' = '.$jenis.'.kode'.$jenis.' where nilai_siswa_'.$jenis.'.nis = "'.$nis.'"');
		return $data;
	}

	public function getNilaiperMp($nis,$jenis,$kodemp){
		$data = $this->db->query('select matapelajaran.Nama as namamp, '.$jenis.'.judul as nama'.$jenis.', '.$jenis.'.kode'.$jenis.' as kode'.$jenis.', nilai_siswa_'.$jenis.'.nilai as nilai from matapelajaran join '.$jenis.' on matapelajaran.Kodemp = '.$jenis.'.kodemp join nilai_siswa_'.$jenis.' on nilai_siswa_'.$jenis.'.kode'.$jenis.' = '.$jenis.'.kode'.$jenis.' where nilai_siswa_'.$jenis.'.nis = "'.$nis.'" and matapelajaran.kodemp = "'.$kodemp.'"');
		return $data;
	}

}
 ?>