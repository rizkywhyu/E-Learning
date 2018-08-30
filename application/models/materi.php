<?php 
require_once(APPPATH.'models\abstract_file.php');

class Materi extends Abstract_File{
	private $kodemateri;

	public function setKodeMateri($kodemateri){
		$this->kodemateri = $kodemateri;
	}

	public function getKodeMateri(){
		return $this->kodemateri;
	}

	public function getDaftarMateriForum($idForum){
		$data = $this->db->query('select kodemateri,judul,deskripsi,namafile from materi where idForum = '.$idForum);
		return $data;
	}

	public function getDetailMateri($kodemateri){
		$data = $this->db->query('select kodemateri,judul,deskripsi,namafile from materi where kodemateri="'.$kodemateri.'"');
		$materi = new Materi();
		foreach($data->result_array() as $c){
				$materi->setKodeMateri($c['kodemateri']);
				$materi->setJudul($c['judul']);
				$materi->setDeskripsi($c['deskripsi']);
				$materi->setNamaFile($c['namafile']);				
			}
		return $materi;
	}

	public function hapusMateri($kodemateri){
		$this->db->query('delete from materi where kodemateri="'.$kodemateri.'"');
	}

	public function tambahMateri($idForum,$namaFile,$judul,$deskripsi,$kodeMP,$kelas){
		$this->db->query('insert into materi (idForum,namafile,judul,deskripsi,kodemp,kelas) values("'.$idForum.'","'.$namaFile.'","'.$judul.'","'.$deskripsi.'","'.$kodeMP.'","'.$kelas.'")');
	}

	public function updateMateri($kodemateri,$judul,$deskripsi){
		$this->db->query('update materi set judul="'.$judul.'", deskripsi = "'.$deskripsi.'" where kodemateri = "'.$kodemateri.'"');
	}

	public function updateFullMateri($kodemateri,$judul,$deskripsi,$namaFile){
		$this->db->query('update materi set judul="'.$judul.'", deskripsi = "'.$deskripsi.'", namafile = "'.$namaFile.'"  where kodemateri = "'.$kodemateri.'"');
	}



}



 ?>