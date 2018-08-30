<?php 
class Cont_Kuis extends CI_Controller{
	
	public function tambahKuis(){
		$i = 1;
		$kuis = new kuis();
		$dataKuis = $this->session->userdata('data_kuis');
		$kodekuis = $kuis->tambahKuis($dataKuis);
		while($i <= $dataKuis['jmlsoal']){
			$data = array(
					'kodekuis' => $kodekuis,
					'nomor' => $i,
					'soal' => $this->input->post('txtSoal_'.$i),
					'jwb_benar' => $this->input->post('rad_'.$i),
					'jwbA' => $this->input->post('txtA_'.$i),
					'jwbB' => $this->input->post('txtB_'.$i),
					'jwbC' => $this->input->post('txtC_'.$i),
					'jwbD' => $this->input->post('txtD_'.$i),
					'jwbE' => $this->input->post('txtE_'.$i),
				);
			$kuis->tambahIsiKuis($data);
			$i++;
		}
		redirect('cont_'.$this->session->userdata('status').'/viewDetailForum/'.$dataKuis['idForum']);
	}

	public function hapus($kodekuis){
		$kuis= new kuis();
		$kuis->hapusKuis($kodekuis);
		redirect('cont_dsn/viewKuis');
	}

	public function updateIsiKuis($kodekuis,$jmlsoal,$idForum){
		$kuis=new kuis();
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
			$kuis->updateIsiKuis($kodekuis,$data);
			$i++;
		}
		
		redirect('cont_'.$this->session->userdata('status').'/viewDetailForum/'.$idForum);
	}

	public function updateKuis($kodekuis,$idForum){
		$kuis=new kuis();
			$data = array(
					'kodekuis' => $kodekuis,
					'judul' => $this->input->post('judul'),
					'tanggalMulai' => $this->input->post('tanggalMulai'),
					'waktuMulai' => $this->input->post('waktuMulai'),
					'waktuAkhir' => $this->input->post('waktuAkhir')
				);
			$kuis->updateKuis($data);
		redirect('cont_'.$this->session->userdata('status').'/viewEditKuis/'.$idForum.'/'.$kodekuis);
	}

	public function hasilKuis($idForum,$kodekuis,$jmlsoal){
		$kuis = new kuis();
		$mhs = unserialize($this->session->userdata('obj'));
		$data['idForum'] = $idForum;
		$i = 0;
		$dataSoal = $kuis->getDaftarSoal($kodekuis);
		foreach($dataSoal->result_array() as $c){
			if($this->input->post('rad_'.$c['nomor']) == $c['jwb_benar']){
				$i++;
			}
		}
		$nilaiSoal = ($i/$jmlsoal)*100;
		$kuis->saveNilai($nilaiSoal,$kodekuis,$mhs->getNim(),"kuis");
		$data = array(
			'idForum' => $idForum,
			'nilaiSoal' => $nilaiSoal,
			'i' => $i,
			'jmlsoal' => $jmlsoal,
			);
		$this->session->set_userdata('hasilSoal',$data);
		redirect('cont_mhs/viewHasilKuis/');
	}
}


?>