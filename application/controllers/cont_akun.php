<?php 

class Cont_Akun extends CI_Controller {

	function __construct(){
		parent::__construct();
		//$this->load->library('session');
		$this->load->model('Akun');
		$this->load->model('sekolah_model');
	}

	public function verifikasiLogin(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$akun = new Akun();
		$hasil = $akun->cekUser($username,$password);
		if ($hasil->num_rows() == 1) {
			foreach ($hasil->result_array() as $c) {
				$sess = $c['level'];
				$this->session->set_userdata('level',$sess);
			}
			if ($this->session->userdata('level')=='admin') {
				redirect('Menu');
			}
			else if($this->session->userdata('level')=='siswa') {
				$siswa = new Siswa();
				$siswa = $siswa->getDetailSiswa($this->input->post('username'));
				$this->session->set_userdata('obj',serialize($siswa));
				redirect('cont_siswa/Beranda');
			}
			else if($this->session->userdata('level')=='guru') {
				$guru = new guru();				
				$guru = $guru->getDetailGuru($this->input->post('username'));
				$this->session->set_userdata('obj',serialize($guru));
				redirect('cont_guru/Beranda');
			}
			else if($this->session->userdata('level')=='sekolah') {
				//$admSklh = new admin();				
				//$admSklh = $admSklh->getDetailAdminSklh($this->input->post('username'));
				//$this->session->set_userdata('obj',serialize($admSklh));
				$query = $this->sekolah_model->getsekolahbyuname($this->input->post('username'));
				if ($query->num_rows()>0){
					foreach ($query->result() as $sklh) {
						$data = array(
							'id' => $sklh->idSklh,
							'nama' => $sklh->nm_sklh,
							'user_name' => $this->input->post('username')
							);
					}
					$this->session->set_userdata($data);
					//$this->output->enable_profiler(TRUE);
					redirect('MenuAdmSekolah');
				}
				else{
					echo "salah";
				}
				
			}			
		}
		else {
			echo "<script>alert('Gagal login: Username/Password salah');history.go(-1);</script>";
		}
	}

	public function tambahAkun(){
			$username = $this->input->post('username');
			$akun = new Akun();
			$data = $akun->isExistUser($username);
			foreach($data->result_array() as $c){
				$pass = $c['password'];
				$level = $c['level'];
				$this->session->set_userdata('level',$level);
			}			
			if(($data->num_rows() == 1)&&($pass != null)){
				echo '<script type="text/javascript"> alert("Anda Sudah Terdaftar !") 
				window.location = "'.base_url().'web/register" </script>';
			}
			else if (($data->num_rows() == 1) && ($pass == null) ){
				if($this->session->userdata('level') == 'siswa'){
					if($this->input->post('password') == $this->input->post('password2')){
						$siswa = new Siswa();
						$siswa = $siswa->getDetailsiswa($this->input->post('username'));	
						$this->session->set_userdata('nama',$siswa->getNama());
						$this->session->set_userdata('username',$this->input->post('username'));
						$this->session->set_userdata('password',md5($this->input->post('password')));
						$this->session->set_userdata('sekolah',$siswa->getSekolah());
						header('Location:'.base_url().'web/register#cek');
					}
					else {
						echo '<script type="text/javascript">alert("Password Tidak Sama, Silahkan Ulangi !") 
						window.location = "'.base_url().'web/register" </script>';						
					}
				}
				else if($this->session->userdata('level') == 'guru'){
					if($this->input->post('password') == $this->input->post('password2')){
						$guru = new Guru();
						$guru = $guru->getDetailguru($this->input->post('username'));	
						$this->session->set_userdata('nama',$guru->getNama());
						$this->session->set_userdata('username',$this->input->post('username'));
						$this->session->set_userdata('password',md5($this->input->post('password')));
						$this->session->set_userdata('sekolah',$guru->getSekolah());
						header('Location:'.base_url().'web/register#cek');
					}
					else {
						echo '<script type="text/javascript">alert("Password Tidak Sama, Silahkan Ulangi !") 
						window.location = "'.base_url().'web/register" </script>';						
					} 
				}
				else if($this->session->userdata('level') == 'sekolah'){
					if($this->input->post('password') == $this->input->post('password2')){
						$admSklh = new Admin();
						$admSklh = $admSklh->getDetailAdminSklh($this->input->post('username'));	
						$this->session->set_userdata('nama','Admin Sekolah');
						$this->session->set_userdata('username',$this->input->post('username'));
						$this->session->set_userdata('password',md5($this->input->post('password')));
						$this->session->set_userdata('sekolah',$admSklh->getNama());
						header('Location:'.base_url().'web/register#cek');
					}
					else {
						echo '<script type="text/javascript">alert("Password Tidak Sama, Silahkan Ulangi !") 
						window.location = "'.base_url().'web/register" </script>';						
					} 
				}
			}
			else {
				echo '<script type="text/javascript"> alert("Username Tidak Ada!") 
				window.location = "'.base_url().'web/register" </script>';
			}
	}

	public function daftarSukses(){
		$akun = new Akun();
		$akun->updatePass($this->session->userdata('password'),$this->session->userdata('username'));
		echo '<script type="text/javascript"> alert("Pendaftaran Berhasil !")
			window.location = "'.base_url().'web/login"; </script>';
	}

	public function updateSiswa($nis){
			$nama = $this->input->post('nama');
			$alamat= $this->input->post('alamat');
			$nohp = $this->input->post('nohp');
			$email = $this->input->post('email');
			$nmrOrtu = $this->input->post('nmrOrtu');
			$siswa = new siswa();
			$siswa->updatesiswa($nama,$alamat,$nohp,$email,$nis,$nmrOrtu);
			$siswa = $siswa->getDetailsiswa($nis);
			$this->session->set_userdata('obj',serialize($siswa));
			redirect('cont_siswa/viewProfil');
	}

	public function logout(){	
		session_destroy();
		redirect('web/login');
	}
}
?>

