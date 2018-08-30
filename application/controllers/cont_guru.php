<?php 
Class Cont_guru extends CI_Controller{

	function __construct(){
		parent::__construct(); 
		if(unserialize($this->session->userdata('obj')) == null){
			redirect('web/login');
		}
	}

	public function Beranda(){
		$guru = unserialize($this->session->userdata('obj'));
		$data['guru'] = $guru;
		$data['datamp'] = $guru->getDaftarmp($guru->getKodeguru());
		$data['mp'] = new matapelajaran();
		$this->session->set_userdata('status', 'guru');
		$this->session->set_userdata('page','home');		
		$this->load->view('index.php',$data);
	}

	public function viewTambahUjian(){
		$guru = unserialize($this->session->userdata('obj'));
		$data['guru'] = $guru;
		$data['datamp'] = $guru->getDaftarmp($guru->getKodeguru());
		$kodemp = $this->input->post('matapelajaran') ;
		$kelas = $this->input->post('kelas');
		$judul = $this->input->post('judul');
		$jmlsoal = $this->input->post('jmlsoal');
		$tanggalMulai = $this->input->post('tanggalMulai');
		$waktuMulai = $this->input->post('waktuMulai');
		$waktuAkhir = $this->input->post('waktuAkhir');
		$idForum = $this->input->post('idForum');
		$dataArray = array(
					'kodeguru' => $guru->getKodeguru(),
					'judul' => $judul,
					'kelas' => $kelas,
					'kodemp' => $kodemp,
					'jmlsoal' => $jmlsoal,
					'tanggalMulai' => $tanggalMulai,
					'waktuMulai' => $waktuMulai,
					'waktuAkhir' => $waktuAkhir,
					'idForum' => $idForum );
		$this->session->set_userdata('data_ujian',$dataArray);
		$data['kelas'] = $kelas;
		$data['kodemp'] = $kodemp;
		$data['jmlsoal'] = $jmlsoal;
		$this->session->set_userdata('page','tambahujian');
		$this->load->view('index.php',$data);
	}

	public function viewEditUjian($idForum,$kodeujian){
		$guru = unserialize($this->session->userdata('obj'));
		$data['guru'] = $guru;
		$data['datamp'] = $guru->getDaftarmp($guru->getKodeguru());
		$ujian = new ujian();
		$ujian = $ujian->getDetailujian($kodeujian);
		$dataSoal = $ujian->getDaftarSoal($kodeujian);
		$data['ujian'] = $ujian;
		$data['dataSoal'] = $dataSoal;
		$data['cek'] = 'checked';
		$data['idForum'] = $idForum;
		$this->session->set_userdata('page','editujian');
		$this->load->view('index.php',$data);
	}

	public function viewNilai(){
		$idx=0;
		$data['idx'] = $idx;
		$guru = unserialize($this->session->userdata('obj'));
		$data['datamp'] = $guru->getDaftarmp($guru->getKodeguru());
		$data['guru'] = $guru;
		$dataAll = $guru->getDaftarNilaiAll($guru->getKodeguru());
		$data['dataAll'] = $dataAll;
		$forum = new forum();
		$data['dataForum'] = $forum->getDaftarForumByGuru($guru->getKodeguru());
		$this->session->set_userdata('page','nilai');
		$this->load->view('index.php',$data);
	}

	public function viewNilaiKelas($kelasPil){
		$idx=1;
		$data['idx'] = $idx;
		$guru = unserialize($this->session->userdata('obj'));
		$data['datamp'] = $guru->getDaftarmp($guru->getKodeguru());
		$data['guru'] = $guru;
		$dataAll = $guru->getDaftarNilaiAll($guru->getKodeguru());
		$data['dataAll'] = $dataAll;
		$data['kelasPil'] = str_replace("%20"," ",$kelasPil);
		$forum = new forum();
		$data['dataForum'] = $forum->getDaftarForumByGuru($guru->getKodeguru());
		$this->session->set_userdata('page','nilai');
		$this->load->view('index.php',$data);
	}

	public function viewNilaiMp($mps){
		$idx=2;
		$data['idx'] = $idx;
		$guru = unserialize($this->session->userdata('obj'));
		$data['datamp'] = $guru->getDaftarmp($guru->getKodeguru());
		$data['guru'] = $guru;
		$dataAll = $guru->getDaftarNilaiAll($guru->getKodeguru());
		$data['dataAll'] = $dataAll;
		$data['mps'] = $mps;
		$forum = new forum();
		$data['dataForum'] = $forum->getDaftarForumByGuru($guru->getKodeguru());
		$this->session->set_userdata('page','nilai');
		$this->load->view('index.php',$data);
	}

	public function viewNilaiKm($km){
		$idx=3;
		$data['idx'] = $idx;
		$guru = unserialize($this->session->userdata('obj'));
		$data['datamp'] = $guru->getDaftarmp($guru->getKodeguru());
		$data['guru'] = $guru;
		$dataAll = $guru->getDaftarNilaiAll($guru->getKodeguru());
		$data['dataAll'] = $dataAll;
		$arr = explode("_", $km, 2);
		$data['kmp'] = $arr[1];
		$data['kelas'] = str_replace("%20"," ",$arr[0]);
		$forum = new forum();
		$data['dataForum'] = $forum->getDaftarForumByGuru($guru->getKodeguru());
		$this->session->set_userdata('page','nilai');
		$this->load->view('index.php',$data);
	}

	public function viewNilaiperForum($idForum){
		$idx=4;
		$data['idx'] = $idx;
		$guru = unserialize($this->session->userdata('obj'));
		$data['datamp'] = $guru->getDaftarmp($guru->getKodeguru());
		$data['guru'] = $guru;
		$dataAll = $guru->getDaftarNilaiAll($guru->getKodeguru());
		$data['dataAll'] = $dataAll;
		$forum = new forum();
		$data['dataForum'] = $forum->getDaftarForumByGuru($guru->getKodeguru());
		$data['dataNisForum'] = $forum->getSiswaAksesForum($idForum);
		$this->session->set_userdata('page','nilai');
		$this->load->view('index.php',$data);
	}

	public function viewJawabanTugas($idForum,$kodetugas){
		$guru = unserialize($this->session->userdata('obj'));
		$data['guru'] = $guru;
		$data['jwbtugas'] = new jawaban_tugas();
		$data['tugas'] = new tugas();
		$data['idForum'] = $idForum;
		$mp = new matapelajaran();
		$data['dataJwbTugas'] = $mp->getDaftarJawabanTugas($kodetugas);
		$this->session->set_userdata('page','jawabantugas');
		$this->load->view('index.php',$data);
	}

	public function viewForum(){
		$guru = unserialize($this->session->userdata('obj'));
		$data['guru'] = $guru;
		$data['datamp'] = $guru->getDaftarmp($guru->getKodeguru());
		$forum = new forum();
		$data['daftarForum'] = $forum->getDaftarForumByguru($guru->getKodeguru());
		$this->session->set_userdata('page','forum');
		$this->load->view('index.php',$data);
	}

	public function viewDetailForum($idForum){
		$guru = unserialize($this->session->userdata('obj'));
		$data['guru'] = $guru;
		$forum = new forum();
		$forum = $forum->getForum($idForum);
		$data['forum'] = $forum;
		$materi = new materi();
		$data['daftarMateri'] = $materi->getDaftarMateriForum($idForum);
		$tugas = new tugas();
		$data['daftarTugas'] = $tugas->getDaftarTugasForum($idForum);
		$ujian = new ujian();
		$data['daftarUjian'] = $ujian->getDaftarUjianForum($idForum);
		$komentar = new komentar();
		$data['daftarKomentar'] = $komentar->getDaftarByForum($idForum);
		$data['idForum'] = $idForum;
		$this->session->set_userdata('page','detailforum');
		$this->load->view('index.php',$data);
	}

	public function saveNilai($jmlTugas,$jmlujian,$nim){

		for($x = 1; $x <= $jmlTugas; $x++) {
			$tugas = new Tugas();
			$jenis = 'tugas';
		    $kodeTugas = $this->input->post('kodeTugas_'.$x);
		    $nilai = $this->input->post('nTugas_'.$x);
		    $tugas->saveNilai($nilai,$kodeTugas,$nim,$jenis);
		}
		
		for($x = 1; $x <= $jmlujian; $x++) {
			$ujian = new ujian();
			$jenis = 'ujian';
		    $kodeujian = $this->input->post('kodeujian_'.$x);
		    $nilai = $this->input->post('nujian_'.$x);
		    $ujian->saveNilai($nilai,$kodeujian,$nim,$jenis);
		}

		echo "<script>alert('Berhasil !');history.go(-1);</script>";
	}

	Public function toExcelSoal()
	{
		$guru = unserialize($this->session->userdata('obj'));
		$arr = explode("_", $this->input->post('pilCetak'), 2);
		$kodemp = $arr[1];
		$kelas = $arr[0]; 
		$dataSoal = $guru->getDaftarNilaiUjian($kelas,$kodemp,$guru->getKodeguru());
		$this->load->library('excel');
	    $this->excel->to_excel($dataSoal,'Laporan_Nilai_'.$kodemp.'_'.$kelas);
	}

	Public function toExcelTugas()
	{
		$guru = unserialize($this->session->userdata('obj'));
		$arr = explode("_", $this->input->post('pilCetak'), 2);
		$kodemp = $arr[1];
		$kelas = $arr[0]; 
		$dataTugas = $guru->getDaftarNilaiTugas($kelas,$kodemp);
		$this->load->library('excel');
	    $this->excel->to_excel($dataTugas,'Laporan_Nilai_'.$kodemp.'_'.$kelas);
	}

	function addComment($idForum){
		$guru = unserialize($this->session->userdata('obj'));
		$data['guru'] = $guru;
		$isi = $this->input->post('isi');
		$komentar = new komentar();
		$komentar->insert($idForum,$isi,$guru->getEmail());
		redirect('cont_guru/viewDetailForum/'.$idForum);
	}

	function addComment2($id,$idForum,$jenis){
		$guru = unserialize($this->session->userdata('obj'));
		$data['guru'] = $guru;
		$isi = $this->input->post('isi');
		$komentar = new komentar();
		$komentar->insert2($id,$jenis,$isi,$guru->getEmail());
		redirect('cont_guru/viewDetailForum/'.$idForum);
	}

	function addCommentReply($idForum,$idComm){
		$guru = unserialize($this->session->userdata('obj'));
		$data['guru'] = $guru;
		$isi = $this->input->post('isi');
		$reply = new replykomentar();
		$reply->insert($idComm,$isi,$guru->getEmail());
		redirect('cont_guru/viewDetailForum/'.$idForum);
	}

}



 ?>