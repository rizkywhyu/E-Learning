 <?php 
class Matapelajaran extends CI_Model {
	private $kodemp;
	private $nama;
	private $kelas;
	private $idSklh;

	function getKodemp(){
		return $this->kodemp;
	}

	function setKodemp($kodemp){
		$this->kodemp = $kodemp;
	}

	function getNama(){
		return $this->nama;
	}

	function setNama($nama){
		$this->nama = $nama;
	}

	function getKelas(){
		return $this->kelas;
	}

	function setKelas($kelas){
		$this->kelas = $kelas;
	}

	function getIdSklh(){
		return $this->idSklh;
	}

	function setIdSklh($idSklh){
		$this->idSklh = $idSklh;
	}

	function getDetailMP($kodemp){
		$data = $this->db->query('select kodemp,nama,idSklh,kelas from matapelajaran where kodemp = "'.$kodemp.'"');
		$mp = new Matapelajaran();
		foreach($data->result_array() as $c){
			$mp->setKodeMp($c['kodemp']);
			$mp->setNama($c['nama']);
			$mp->setKelas($c['kelas']);
			$mp->setIdSklh($c['idSklh']); 
		}
		return $mp;
	}
	/*harusnya di kelas*/

	function getDaftarTugas($kelas,$kodemp){
		$data = $this->db->query('select kodetugas from tugas where kelas = "'.$kelas.'" and kodemp = "'.$kodemp.'"');
		return $data;
	}

	function getJawabanTugas($nis,$kodetugas){
		$data = $this->db->query('select kodeJT from jawaban_tugas where nis = "'.$nis.'" and kodetugas = "'.$kodetugas.'"');
		return $data;
	}

	function getDaftarJawabanTugas($kodetugas){
		$data = $this->db->query('select kodejt,nis,kodetugas from jawaban_tugas where kodetugas="'.$kodetugas.'"');
		return $data;
	}

	function getDaftarMateri($kelas,$kodemp){
		$data = $this->db->query('select kodemateri from materi where kelas = "'.$kelas.'" and kodemp = "'.$kodemp.'"');
		return $data;
	}

	function getDaftarUjian($kelas,$kodemp){
		$data = $this->db->query('select kodeujian from ujian where kelas = "'.$kelas.'" and kodemp="'.$kodemp.'"');
		return $data;
	}

}
?>
