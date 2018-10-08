<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_futsal extends MX_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Jadwal_futsal_m');
	}

	public function index()
	{	$sess = $this->session->userdata('user');
		if($sess){
			$this->load->module('Layout');
			$this->layout->header();
			$this->layout->sidebar();
			$data_jadwal_futsal = $this->Jadwal_futsal_m->get_jadwal_futsal();
			$data = array(
				'jadwal_futsal' => $data_jadwal_futsal
			);
			$this->load->view('data_jadwal_futsal',$data);
			$this->layout->footer($data);
		}else{
			redirect('home');
		}	
	}

	public function tambah_jadwal_futsal(){
		$this->load->module('Layout');
		$this->layout->header();
		$this->layout->sidebar();
		$this->load->view('add_jadwal_futsal');
		$this->layout->footer();
	}

	public function proses_tambah_jadwal(){
		$data = array(
			"tgl_jadwal" => $this -> input -> post ("tanggal"),
			"jam_awal" => $this -> input -> post ("jamawal"),
			"jam_akhir" => $this -> input -> post ("jamakhir")
			);
		$this->Jadwal_futsal_m->add_jadwal_futsal($data);
		redirect('jadwal_futsal');
	}
}