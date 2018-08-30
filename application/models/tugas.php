 <?php
require_once(APPPATH.'models\abstract_file.php');

class Tugas extends Abstract_File{
	private $batas_tgl;
	private $kodetugas;


	function setKodeTugas($kodetugas){
		$this->kodetugas = $kodetugas;
	}

	function getKodeTugas(){
		return $this->kodetugas;
	}

	function setBatasTanggal($batas_tgl){
		$this->batas_tgl = $batas_tgl;
	}

	function getBatasTanggal(){
		return $this->batas_tgl;
	}

	public function getDaftarTugasForum($idForum){
		$data = $this->db->query('select kodetugas,judul,deskripsi,batas_tgl,namafile from tugas where idForum = "'.$idForum.'"');
		return $data;
	}

	function getDetailTugas($kodetugas){
		$data = $this->db->query('select kodetugas,judul,deskripsi,batas_tgl,namafile from tugas where kodetugas="'.$kodetugas.'"');
		$tugas = new tugas();
		foreach($data->result_array() as $c){
				$tugas->setKodeTugas($c['kodetugas']);
				$tugas->setJudul($c['judul']);
				$tugas->setDeskripsi($c['deskripsi']);
				$tugas->setBatasTanggal($c['batas_tgl']);
				$tugas->setNamaFile($c['namafile']);				
				}
		return $tugas;
	}

	function cekBatasTugas($kodetugas){
		$data = $this->db->query('select datediff(curdate(),batas_tgl) as cekBatas from tugas where kodetugas="'.$kodetugas.'"');
		foreach($data->result_array() as $c){
			return $c['cekBatas'];
		}
	}

	function hapusTugas($kodetugas){
		$this->db->query('delete from tugas where kodetugas="'.$kodetugas.'"');
	}

	function updateTugas($kodetugas,$deskripsi,$judul,$batastgl){
		$this->db->query('update tugas set judul="'.$judul.'", deskripsi="'.$deskripsi.'", batas_tgl="'.$batastgl.'" where kodetugas="'.$kodetugas.'"');
	}
	function updateFullTugas($kodetugas,$deskripsi,$judul,$batastgl,$namaFile){
		$this->db->query('update tugas set judul="'.$judul.'", deskripsi="'.$deskripsi.'", batas_tgl="'.$batastgl.'", namafile="'.$namaFile.'" where kodetugas="'.$kodetugas.'"');
	}

	function tambahTugas($idForum,$namafile,$judul,$deskripsi,$batastgl,$kodemp,$kelas){
		$this->db->query('insert into tugas(idForum,namafile,judul,deskripsi,batas_tgl,kodemp,kelas) values ("'.$idForum.'","'.$namafile.'","'.$judul.'","'.$deskripsi.'","'.$batastgl.'","'.$kodemp.'","'.$kelas.'")');
	}
	
	function getJawabanTugas($nis,$kodetugas){
		$data = $this->db->query('select kodeJT from jawaban_tugas where nis = "'.$nis.'" and kodetugas = "'.$kodetugas.'"');
		return $data;
	}

	function getDaftarJawabanTugas($kodetugas){
		$data = $this->db->query('select kodejt,nis,kodetugas from jawaban_tugas where kodetugas="'.$kodetugas.'"');
		return $data;
	}
}

?>