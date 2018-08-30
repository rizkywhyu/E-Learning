<?php 
class Cont_Tugas extends CI_Controller {

	public function __construct()    
	         {  
	            parent::__construct();   
	            $this->load->helper('download');
/*	            $this->tugas->setAttrSession();
	            $this->mahasiswa->setAttrSession(); */  
	         } 

	public function download($kodetugas){
		$tugas = new tugas();
		$tugas = $tugas->getDetailTugas($kodetugas);
		$name = $tugas->getNamaFile();  
	    $data = file_get_contents('assets/Tugas/'.$tugas->getNamaFile());  
	    force_download($name,$data);  	
	}

	public function downloadJwb($namafile){
		$name = $namafile;
		$data = file_get_contents('assests/jawabanTugas/'.$namafile);
		force_download($name,$data);
	}

	public function uploadJawabanTugas($idForum,$kodetugas,$nim){
		$config['upload_path']          = './assets/jawabanTugas/';
		$config['allowed_types']        = 'rar|zip|pdf|xls|xlsx|doc|docx|ppt|pptx';
		$config['max_size']             = 4096;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('berkasUpload'))
		{
			$idForum = $this->input->post('idForum');
			$tugas = new tugas();
			echo '<script type="text/javascript"> alert("Tipe File Tidak Sama") 
				window.location = "'.base_url().'cont_siswa/viewDetailForum/.'.$idForum.'" </script>';
		}
		else
		{
			$namaFile = $this->upload->data('file_name');
			$deskripsi = $this->input->post('TxtDeskripsi');
			$jawabanTugas = new jawaban_tugas();
			$jawabanTugas->uploadJwbTugas($kodetugas,$namaFile,$deskripsi,$nim);
			redirect('cont_'.$this->session->userdata('status').'/viewDetailForum/'.$idForum);
		}
	}

	public function TambahTugasFromForum(){
		$config['upload_path']          = './assets/Tugas/';
		$config['allowed_types']        = 'rar|zip|pdf|xls|xlsx|doc|docx|ppt|pptx';
		$config['max_size']             = 4096;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('berkasUpload'))
		{
			$idForum = $this->input->post('idForum');
			$tugas = new tugas();
			echo '<script type="text/javascript"> alert("Tipe File Tidak Sama") 
				window.location = "'.base_url().'cont_guru/viewDetailForum/'.$idForum.'" </script>';
		}
		else
		{
			$namaFile = $this->upload->data('file_name');
			$deskripsi = $this->input->post('TxtDeskripsi');
			$judul = $this->input->post('TxtJudul');
			$batastgl = $this->input->post('batastgl');
			$kodemp = $this->input->post('matapelajaran') ;
			$kelas = $this->input->post('kelas');
			$idForum = $this->input->post('idForum');
			$tugas = new tugas();
			$tugas->tambahTugas($idForum,$namaFile,$judul,$deskripsi,$batastgl,$kodemp,$kelas);
			redirect('cont_'.$this->session->userdata('status').'/viewDetailForum/'.$idForum);
		}
	}


	public function hapusFromForum($idForum,$kodetugas){
		$tugas = new tugas();
		$tugas = $tugas->getDetailTugas($kodetugas);
		unlink('./assets/Tugas/'.$tugas->getNamaFile());
		$tugas->hapusTugas($kodetugas);
		redirect('cont_'.$this->session->userdata('status').'/viewDetailForum/'.$idForum);
	}

	public function updateTugasFromForum($idForum,$kodetugas){
		$config['upload_path']          = './assets/Tugas/';
		$config['allowed_types']        = 'rar|zip|pdf|xls|xlsx|doc|docx|ppt|pptx';
		$config['max_size']             = 4096;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('berkasUpload') == null)
		{
			$judul = $this->input->post('TxtJudul');	
			$deskripsi = $this->input->post('TxtDeskripsi');
			$batastgl = $this->input->post('batastgl');
			$tugas = new tugas();
			$tugas->updateTugas($kodetugas,$deskripsi,$judul,$batastgl);
			redirect('cont_'.$this->session->userdata('status').'/viewDetailForum/'.$idForum);
		}
		else {
			$namaFile = $this->upload->data('file_name');
			$judul = $this->input->post('TxtJudul');	
			$deskripsi = $this->input->post('TxtDeskripsi');
			$batastgl = $this->input->post('batastgl');
			$tugas = new tugas();
			$tugas = $tugas->getDetailTugas($kodetugas);
			unlink('./assets/Tugas/'.$tugas->getNamaFile());
			$tugas->updateFullTugas($kodetugas,$deskripsi,$judul,$batastgl,$namaFile);
			redirect('cont_'.$this->session->userdata('status').'/viewDetailForum/'.$idForum);
		}

	}

	public function nilaiJawabanTugas($kodetugas,$idForum,$jmlsiswa){
		$i=0;
		$tugas = new tugas();
		while($i<$jmlsiswa){
			$i++;
			$tugas->saveNilai($this->input->post('nilai_'.$i),$kodetugas,$this->input->post('nis_'.$i),'tugas');
		}
		redirect('cont_guru/viewDetailForum/'.$idForum); 
	}

}
 ?>