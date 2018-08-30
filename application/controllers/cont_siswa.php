<?php 

class Cont_siswa extends CI_Controller {

	function __construct(){
		parent::__construct();
/*		$siswa->setAttrSession();*/
		if(unserialize($this->session->userdata('obj')) == null){
			redirect('web/login');
		}
	}
	
	public function Beranda(){
		$siswa = unserialize($this->session->userdata('obj'));
		$data['siswa'] = $siswa;
		$data['mp'] = new matapelajaran();
		$data['daftarForum'] = $siswa->getDaftarForum($siswa->getnis());
		$this->session->set_userdata('status', 'siswa');
		$this->session->set_userdata('page','home');		
		$this->load->view('index.php',$data);
	}

	public function viewProfil(){
		$siswa = unserialize($this->session->userdata('obj'));
		$data['siswa'] = $siswa;
		$this->session->set_userdata('page','profil');
		$this->load->view('index.php',$data);
	}

	public function viewEditProfil(){
		$siswa = unserialize($this->session->userdata('obj'));
		$data['siswa'] = $siswa;
		$this->session->set_userdata('page','editprofil');
		$this->load->view('index.php',$data);
	}

	public function updatePass(){
		if ($this->input->post('pass1') == $this->input->post('pass2')){
			$siswa->Daftarsiswa(md5($this->input->post('pass1')),$siswa->getnis());
			echo '<script type="text/javascript">alert("Password Berhasil Diubah ! ") 
			window.location = "'.base_url().'Cont_siswa/viewProfil" </script>';
		}
		else{
			echo '<script type="text/javascript">alert("Password Tidak Sama, Silahkan Ulangi ! ") 
			window.location = "'.base_url().'Cont_siswa/viewProfil#ubahPass" </script>';
		}		
	}

	public function viewKerjakanujian($idForum,$kodeujian){
		$siswa = unserialize($this->session->userdata('obj'));
		$ujian = new ujian();
		$ujian = $ujian->getDetailujian($kodeujian);
		$dataujian = $ujian->getDaftarsoal($kodeujian);
		$data['siswa'] = $siswa;
		$data['ujian'] = $ujian;
		$data['dataujian'] = $dataujian;
		$data['idForum'] = $idForum;
		$this->session->set_userdata('page','kerjakanujian');
		$this->load->view('index.php',$data);
	}

	public function viewHasilujian(){
		$siswa = unserialize($this->session->userdata('obj'));
		$data['siswa'] = $siswa;
		$hasilujian = $this->session->userdata('hasilujian');
		$data['nilaiujian'] = $hasilujian['nilaiujian'];
		$data['i'] = $hasilujian['i'];
		$data['jmlsoal'] = $hasilujian['jmlsoal'];
		$data['idForum'] = $hasilujian['idForum'];
		$this->session->set_userdata('page','hasilujian');
		$this->load->view('index.php',$data);
	}

	public function viewNilai(){
		$siswa = unserialize($this->session->userdata('obj'));
		$data['siswa'] = $siswa;
		$datamp = $siswa->getDaftarmp($siswa->getnis(),$siswa->getKelas(),$siswa->getIdSklh());
		$data['datamp'] = $datamp;
		$data['mp'] = new matapelajaran();
		$this->session->set_userdata('page','nilai');
		$this->load->view('index.php',$data);
	}
	

	public function viewNilaimp($kodemp){
		$siswa = unserialize($this->session->userdata('obj'));
		$data['siswa'] = $siswa;
		$ujian = new ujian();
		$tugas = new tugas();
		$mp = new matapelajaran();
		$data['mp'] = $mp;
		$datamp = $siswa->getDaftarmp($siswa->getnis(),$siswa->getKelas(),$siswa->getIdSklh());
		$mp = $mp->getDetailmp($kodemp);
		$data['datamp'] = $datamp;
		$dataujian = $ujian->getNilaipermp($siswa->getnis(),"ujian",$mp->getKodemp());
		$dataTugas = $tugas->getNilaipermp($siswa->getnis(),"tugas",$mp->getKodemp());
		$data['dataujian'] = $dataujian;
		$data['dataTugas'] = $dataTugas;
		$this->session->set_userdata('page','nilai');
		$this->load->view('index.php',$data);
	}

	public function viewForum(){
		$siswa = unserialize($this->session->userdata('obj'));
		$data['siswa'] = $siswa;
		$forum = new forum();
		$data['daftarForum'] = $forum->getDaftarForumBySklh($siswa->getIdSklh());
		$this->session->set_userdata('page','forum');
		$this->load->view('index.php',$data);
	}

	public function viewDetailForum($idForum){
		$siswa = unserialize($this->session->userdata('obj'));
		$data['siswa'] = $siswa;
		$forum = new forum();
		$forum = $forum->getForum($idForum);
		$data['forum'] = $forum;
		$materi = new materi();
		$data['daftarMateri'] = $materi->getDaftarMateriForum($idForum);
		$tugas = new tugas();
		$data['daftarTugas'] = $tugas->getDaftarTugasForum($idForum);
		$ujian = new ujian();
		$data['daftarujian'] = $ujian->getDaftarujianForum($idForum);
		$komentar = new komentar();
		$data['daftarKomentar'] = $komentar->getDaftarByForum($idForum);
		$data['idForum'] = $idForum;
		$this->session->set_userdata('page','detailforum');
		$this->load->view('index.php',$data);
	}

	Public function cetakLaporan($jenis)
	{
		$siswa = unserialize($this->session->userdata('obj'));
		$datamp = $siswa->getDaftarmp($siswa->getnis(),$siswa->getKelas(),$siswa->getIdSklh());
		if($jenis == "ujian"){
			$ujian = new ujian();
			$dataNilai = $ujian->getDaftarNilai($siswa->getnis(),"ujian");
		}
		else {
			$tugas = new tugas();
			$dataNilai = $tugas->getDaftarNilai($siswa->getnis(),"tugas");
		}
		$this->load->library('excel');
	    $this->excel->to_excel($dataNilai,'Laporan_Nilai_'.$jenis.'_'.$siswa->getNis().'_'.$siswa->getKelas());
	}

	function addComment($idForum){
		$siswa = unserialize($this->session->userdata('obj'));
		$isi = $this->input->post('isi');
		$komentar = new komentar();
		$komentar->insert($idForum,$isi,$siswa->getEmail());
		redirect('cont_siswa/viewDetailForum/'.$idForum);
	}

	function addComment2($id,$idForum,$jenis){
		$siswa = unserialize($this->session->userdata('obj'));
		$data['siswa'] = $siswa;
		$isi = $this->input->post('isi');
		$komentar = new komentar();
		$komentar->insert2($id,$jenis,$isi,$siswa->getEmail());
		redirect('cont_siswa/viewDetailForum/'.$idForum);
	}

	function addCommentReply($idForum,$idComm){
		$guru = unserialize($this->session->userdata('obj'));
		$data['guru'] = $guru;
		$isi = $this->input->post('isi');
		$reply = new replykomentar();
		$reply->insert($idComm,$isi,$guru->getEmail());
		redirect('cont_siswa/viewDetailForum/'.$idForum);
	}
}

 ?>