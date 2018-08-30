<?php 
class Cont_Ujian extends CI_Controller{
	
	public function tambahujian(){
		$i = 1;
		$ujian = new ujian();
		$dataujian = $this->session->userdata('data_ujian');
		$kodeujian = $ujian->tambahujian($dataujian);
		while($i <= $dataujian['jmlsoal']){
			$data = array(
					'kodeujian' => $kodeujian,
					'nomor' => $i,
					'soal' => $this->input->post('txtSoal_'.$i),
					'jwb_benar' => $this->input->post('rad_'.$i),
					'jwbA' => $this->input->post('txtA_'.$i),
					'jwbB' => $this->input->post('txtB_'.$i),
					'jwbC' => $this->input->post('txtC_'.$i),
					'jwbD' => $this->input->post('txtD_'.$i),
					'jwbE' => $this->input->post('txtE_'.$i),
				);
			$ujian->tambahIsiujian($data);
			$i++;
		}
		redirect('cont_'.$this->session->userdata('status').'/viewDetailForum/'.$dataujian['idForum']);
	}

	public function hapus($idForum,$kodeujian){
		$ujian= new ujian();
		$ujian->hapusujian($kodeujian);
		redirect('cont_'.$this->session->userdata('status').'/viewDetailForum/'.$idForum);
	}

	public function updateIsiujian($kodeujian,$jmlsoal,$idForum){
		$ujian=new ujian();
		$i = 1;
		while($i <= $jmlsoal){
			$data = array(
					'nomor' => $i,
					'soal' => $this->input->post('txtSoal_'.$i),
					'jwb_benar' => $this->input->post('rad_'.$i),
					'jwbA' => $this->input->post('txtA_'.$i),
					'jwbB' => $this->input->post('txtB_'.$i),
					'jwbC' => $this->input->post('txtC_'.$i),
					'jwbD' => $this->input->post('txtD_'.$i),
					'jwbE' => $this->input->post('txtE_'.$i),
				);
			$ujian->updateIsiujian($kodeujian,$data);
			$i++;
		}
		
		redirect('cont_'.$this->session->userdata('status').'/viewDetailForum/'.$idForum);
	}

	public function updateujian($kodeujian,$idForum){
		$ujian=new ujian();
			$data = array(
					'kodeujian' => $kodeujian,
					'judul' => $this->input->post('judul'),
					'tanggalMulai' => $this->input->post('tanggalMulai'),
					'waktuMulai' => $this->input->post('waktuMulai'),
					'waktuAkhir' => $this->input->post('waktuAkhir')
				);
			$ujian->updateujian($data);
		redirect('cont_'.$this->session->userdata('status').'/viewEditujian/'.$idForum.'/'.$kodeujian);
	}

	public function hasilujian($idForum,$kodeujian,$jmlsoal){
		$ujian = new ujian();
		$siswa = unserialize($this->session->userdata('obj'));
		$data['idForum'] = $idForum;
		$i = 0;
		$dataSoal = $ujian->getDaftarSoal($kodeujian);
		foreach($dataSoal->result_array() as $c){
			if($this->input->post('rad_'.$c['nomor']) == $c['jwb_benar']){
				$i++;
			}
		}
		$nilaiSoal = ($i/$jmlsoal)*100;
		$ujian->saveNilai($nilaiSoal,$kodeujian,$siswa->getnis(),"ujian");
		$data = array(
			'idForum' => $idForum,
			'nilaiujian' => $nilaiSoal,
			'i' => $i,
			'jmlsoal' => $jmlsoal,
			);
		// load nexmo library
		$this->load->library('nexmo');
		$message = array(
            'text' => 'Nilai ujian anak anda ' . $nilaiSoal,
        );

		// Send sms using nexmo
		$response = $this->nexmo->send_message('E-Learning',format_no_hp($siswa->getNmrOrtu()),$message);
		// print_r($response);
		// exit();
		$this->session->set_userdata('hasilujian',$data);
		redirect('cont_siswa/viewHasilujian/');
	}
}


?>