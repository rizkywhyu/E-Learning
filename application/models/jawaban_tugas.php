<?php  
require_once(APPPATH.'models\abstract_file.php');

class jawaban_tugas extends Abstract_File{

	private $kodejt;

	public function setKodeJT($kodejt){
		$this->kodejt = $kodejt;
	}
	public function getKodejT(){
		return $this->kodejt;
	}
 
	function getDetailJawabanTugas($kodeJT,$nis){
		$data = $this->db->query('select kodejt,kodetugas,namafile,deskripsi from jawaban_tugas where NIS = "'.$nis.'" and kodeJT = "'.$kodeJT.'"');
		$jt = new jawaban_tugas();
		foreach($data->result_array() as $c){
				$jt->setKodeJT($c['kodejt']);
				$jt->setDeskripsi($c['deskripsi']);
				$jt->setNamaFile($c['namafile']);				
				}
		return $jt;
	}

	function uploadJwbTugas($kodetugas,$namafile,$deskripsi,$nis){
		$data = $this->db->query('insert into jawaban_tugas(kodetugas, namafile, deskripsi, NIS) VALUES ("'.$kodetugas.'","'.$namafile.'","'.$deskripsi.'","'.$nis.'")');
		return $data;	
	}

}

 ?>