<?php 
class Cont_Forum extends CI_Controller {

	public function tambahForum($kodeguru){
		$pass1 = md5($this->input->post('pass1'));
		$pass2 = md5($this->input->post('pass2'));
		$guru = unserialize($this->session->userdata('obj'));
		if($pass1 == $pass2){
			$namaForum = $this->input->post('nama');
			$arr = explode("_", $this->input->post('kmp'), 2);
			$mp= $arr[1];
			$kelas = $arr[0];
			$forum = new forum();
			$idForum = $forum->tambahForum($pass1,$namaForum,$kelas,$mp,$kodeguru,$guru->getIdSklh());
			redirect('cont_guru/viewDetailForum/'.$idForum);
		}
		else{
			echo '<script type="text/javascript"> alert("Password Tidak Sama") 
				window.location = "'.base_url().'cont_guru/viewForum" </script>';
		}
		
	}

	public function hapusForum($idForum){
		$forum = new forum();
		$forum->hapusForum($idForum);
		redirect('cont_guru/viewForum');
	}

	public function cekPass($idForum,$nis){
		$forum = new forum();
		$forum = $forum->getForum($idForum);
		$pass1 = md5($this->input->post('pass'));
		$pass2 = $forum->getPassword();
		if($pass1 == $pass2){
			$siswa = new siswa();
			$siswa->setAkses($nis,$idForum);
			redirect('cont_siswa/viewDetailForum/'.$idForum);
		}else {
			echo '<script type="text/javascript"> alert("Password Salah") 
				window.location = "'.base_url().'cont_siswa/viewForum" </script>';
		}
	}


}