<?php 
class Cont_Materi extends CI_Controller {

	public function __construct()    
	         {  
	            parent::__construct();   
	            $this->load->helper('download');
/*	            $this->materi->setAttrSession();
	            $this->mahasiswa->setAttrSession();  */
	         } 

	public function download($kodemateri){
		$materi = new materi();
		$materi = $materi->getDetailMateri($kodemateri);
		$name = $materi->getNamaFile();  
	    $data = file_get_contents('assets/Materi/'.$materi->getNamaFile());  
	    force_download($name,$data);  	
	}

	public function hapusFromForum($idForum,$kodemateri,$namafile){
		$materi = new materi();
		$materi = $materi->getDetailMateri($kodemateri);
		unlink('./assets/Materi/'.$materi->getNamaFile());
		$materi->hapusMateri($kodemateri);
		redirect('cont_'.$this->session->userdata('status').'/viewDetailForum/'.$idForum);
	}


	public function tambahMateriFromForum(){
		$config['upload_path']          = './assets/materi/';
		$config['allowed_types']        = 'rar|zip|pdf|xls|xlsx|doc|docx|ppt|pptx';
		$config['max_size']             = 4096;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('berkasUpload'))
		{

			//$error = $this->upload->display_errors();
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
			$kodemp = $this->input->post('matapelajaran') ;
			$kelas = $this->input->post('kelas');
			$idForum = $this->input->post('idForum');
			$materi = new materi();
			$materi->tambahMateri($idForum,$namaFile,$judul,$deskripsi,$kodemp,$kelas);
			redirect('cont_'.$this->session->userdata('status').'/viewDetailForum/'.$idForum);
		}
	}

	public function updateMateriFromForum($idForum,$kodemateri){
		$config['upload_path']          = './assets/materi/';
		$config['allowed_types']        = 'rar|zip|pdf|xls|xlsx|doc|docx|ppt|pptx';
		$config['max_size']             = 4096;
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('berkasUpload')){
				$materi = new materi();
				echo '<script type="text/javascript"> alert("Tipe File Tidak Sama") 
					window.location = "'.base_url().'cont_guru/viewDetailForum/'.$idForum.'" </script>';
			
		}
		elseif ($this->upload->do_upload('berkasUpload') == null) {
				$materi = new materi();
				$judul = $this->input->post('TxtJudul');
				$deskripsi = $this->input->post('TxtDeskripsi');
				$materi->updateMateri($kodemateri,$judul,$deskripsi);
				redirect('cont_'.$this->session->userdata('status').'/viewDetailForum/'.$idForum);
		}
		else  {
				$materi = new materi();
				$materi = $materi->getDetailMateri($kodemateri);
				$judul = $this->input->post('TxtJudul');
				$deskripsi = $this->input->post('TxtDeskripsi');
				unlink('./assets/Materi/'.$materi->getNamaFile());
				$namaFile = $this->upload->data('file_name');
				$materi->updateFullMateri($kodemateri,$judul,$deskripsi,$namaFile);
				redirect('cont_'.$this->session->userdata('status').'/viewDetailForum/'.$idForum);
				
		};
	}

}
 ?>