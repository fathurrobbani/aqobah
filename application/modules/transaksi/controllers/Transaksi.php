<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends MX_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Transaksi_m');
	}

	public function index()
	{
		$sess = $this->session->userdata('user');
		if($sess){
			$this->load->module('Layout');
			$this->layout->header();
			$this->layout->sidebar();
			$sess = $sess[0];
			if($sess['namalevel'] == 'operator' || $sess['namalevel'] == 'admin'){
				$data_transaksi = $this->Transaksi_m->get_transaksi();
				$data = array(
					'transaksi' => $data_transaksi
				);
				$this->load->view('data_transaksi',$data);
			}
			if($sess['namalevel'] == 'member'){
				$data_transaksi = $this->Transaksi_m->get_membertransaksi($sess['id_pengguna']);
				$data = array(
					'transaksi' => $data_transaksi
				);
				$this->load->view('data_membertransaksi',$data);
			}
			$this->layout->footer();
		}else{
			redirect('home');
		}
	}

	public function tambah_transaksi(){
		$this->load->module('Layout');
		$this->layout->header();
		$this->layout->sidebar();
		$data_transaksi = $this->Transaksi_m->get_lapangan();
		$data_pengguna = $this->Transaksi_m->get_pengguna();
			$data = array(
				'transaksi' => $data_transaksi,
				'pengguna' => $data_pengguna
			);
		$this->load->view('add_transaksi', $data);
		$this->layout->footer();
	}

	public function proses_tambah_transaksi(){
		$awal = $this->input->post ("jamawal");
		$durasi = $this->input->post ("durasi");
		$akhir = date("H:i",strtotime($awal)+ ($durasi * 3600) );
		$tgl = $this ->input->post ("tgl_sewa");

		$weekday = ['Mon','Tue','Wed','Thu','Fri'];
		// $weekend = ['Sat','Sun'];
		$pengguna = $this->Transaksi_m->get_info_pengguna($this->input-> post ("id_pengguna"));
		$pengguna = $pengguna[0];
		$lapangan = $this->Transaksi_m->get_info_lapangan($this->input-> post ("id_lapangan"));
		$lapangan = $lapangan[0];
		$jam_awal = explode(":",$awal);
		$jam_awal = (int)$jam_awal[0];
		$day = date('D',strtotime($tgl));
		$hrg_lapangan = 0;
		if($pengguna['ismember'] == 'member'){ //cek apakah yg memesan member ?
			if(in_array($day, $weekday)){ //cek apakah tgl sewa adalah weekday ?
				if($jam_awal > 7 && $jam_awal < 12){
					$hrg_lapangan = $lapangan['hrg_weekday07-12_member'];
				}else if($jam_awal > 12 && $jam_awal < 17){
					$hrg_lapangan = $lapangan['hrg_weekday12-17_member'];
				}else if($jam_awal > 17 && $jam_awal < 24){
					$hrg_lapangan = $lapangan['hrg_weekday17-24_member'];
				}else{
					$hrg_lapangan = 0;
				}
			}else{
				if($jam_awal > 7 && $jam_awal < 12){
					$hrg_lapangan = $lapangan['hrg_weekend07-12_member'];
				}else if($jam_awal > 12 && $jam_awal < 17){
					$hrg_lapangan = $lapangan['hrg_weekend12-17_member'];
				}else if($jam_awal > 17 && $jam_awal < 24){
					$hrg_lapangan = $lapangan['hrg_weekend17-24_member'];
				}else{
					$hrg_lapangan = 0;
				}
			}
		}else{
			if(in_array($day, $weekday)){ //cek apakah tgl sewa adalah weekday ?
				if($jam_awal > 7 && $jam_awal < 12){
					$hrg_lapangan = $lapangan['hrg_weekday07-12_umum'];
				}else if($jam_awal > 12 && $jam_awal < 17){
					$hrg_lapangan = $lapangan['hrg_weekday12-17_umum'];
				}else if($jam_awal > 17 && $jam_awal < 24){
					$hrg_lapangan = $lapangan['hrg_weekday17-24_umum'];
				}else{
					$hrg_lapangan = 0;
				}
			}else{
				if($jam_awal > 7 && $jam_awal < 12){
					$hrg_lapangan = $lapangan['hrg_weekend07-12_umum'];
				}else if($jam_awal > 12 && $jam_awal < 17){
					$hrg_lapangan = $lapangan['hrg_weekend12-17_umum'];
				}else if($jam_awal > 17 && $jam_awal < 24){
					$hrg_lapangan = $lapangan['hrg_weekend17-24_umum'];
				}else{
					$hrg_lapangan = 0;
				}
			}
		}
		
		if($hrg_lapangan != 0){
			$data = array(
				"tgl_sewa" => $this ->input->post ("tgl_sewa"),
				"jam_awal" => $awal,
				"jam_akhir" => $akhir,
				"durasi" => $durasi,
				"id_lapangan" => $this->input->post("id_lapangan")
			);
			$id_jadwal = $this->Transaksi_m->add_jadwal($data);
			
			$total_harga = $hrg_lapangan * $durasi;
			$data = array(
				"id_pengguna" => $this->input->post("id_pengguna"),
				"id_jadwal" => (int)$id_jadwal,
				"tot_bayar" => $total_harga,
				"ip_address" => $this->input->ip_address(),
				"tgl_transaksi" => date('Y-m-d')
			);
			$this->Transaksi_m->add_transaksi($data);

			if($pengguna['totalmain'] < 10){
				$data = array(
					'totalmain' => $pengguna['totalmain']+1
				);
				$this->Transaksi_m->update_pengguna($this->input->post("id_pengguna"), $data);
				if($pengguna['totalmain'] == 9){
					$data = array(
						'status' => 'nonaktif'
					);
					$this->Transaksi_m->update_pengguna($this->input->post("id_pengguna"), $data);
				}
			}
			redirect('transaksi');
		}
	}
	
}