<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lapangan extends MX_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('Lapangan_m');
	}

	public function index()
	{
		$sess = $this->session->userdata('user');
		if($sess){
			$this->load->module('Layout');
			$this->layout->header();
			$this->layout->sidebar();
			$data_lapangan = $this->Lapangan_m->get_lapangan();
			$data = array(
				'lapangan' => $data_lapangan
			);
			$this->load->view('data_lapangan',$data);
			$this->layout->footer();
		}else{
			redirect('home');
		}
	}

	public function tambah_lapangan(){
		$this->load->module('Layout');
		$this->layout->header();
		$this->layout->sidebar();
		$this->load->view('add_lapangan');
		$this->layout->footer();
	}


	public function proses_tambah_lapangan(){
		$data = array(
			"kode_lapangan" => $this->input->post ("kode_lap"),
			"hrg_weekday07-12_umum" =>$this->input -> post ("weekdaypagi_umum"),
			"hrg_weekday07-12_member" =>$this->input -> post ("weekdaypagi_member"),
			"hrg_weekday12-17_umum" =>$this->input -> post ("weekdaysiang_umum"),
			"hrg_weekday12-17_member" =>$this->input -> post ("weekdaysiang_member"),
			"hrg_weekday17-24_umum" =>$this->input -> post ("weekdaymalam_umum"),
			"hrg_weekday17-24_member" =>$this->input -> post ("weekdaymalam_member"),
			"hrg_weekend07-12_umum" =>$this->input -> post ("weekendpagi_umum"),
			"hrg_weekend07-12_member" =>$this->input -> post ("weekendpagi_member"),
			"hrg_weekend12-17_umum" =>$this->input -> post ("weekendsiang_umum"),
			"hrg_weekend12-17_member" =>$this->input -> post ("weekendsiang_member"),
			"hrg_weekend17-24_umum" =>$this->input -> post ("weekendmalam_umum"),
			"hrg_weekend17-24_member" =>$this->input -> post ("weekendmalam_member")
			);
		$this->Lapangan_m->add_lapangan($data);
		redirect('lapangan');
	}

	public function hapus($id_lap){
		$data = array(
			'sess' => $this->session->userdata('user')
		);
		$this->Lapangan_m->delete($id_lap);
		redirect('lapangan');
	}

	public function edit($id_lapangan){
		$get_futsal = $this->Lapangan_m->get_futsal($id_lapangan);
		$data = array(
			'lapangan' => $get_futsal
		);
		$this->load->module('Layout');
		$this->layout->header();
		$this->layout->sidebar();
		$this->load->view('edit_lapangan', $data);
		$this->layout->footer();
	}

	public function proses_edit_lapangan(){
		$sess = $this->session->userdata('user');
		$sess = $sess[0];
		$id_lapangan = $this->input->post('id_lapangan');
		$data = array(
			"kode_lapangan" => $this->input->post ("kode_lap"),
			"hrg_weekday07-12_umum" =>$this->input -> post ("weekdaypagi_umum"),
			"hrg_weekday07-12_member" =>$this->input -> post ("weekdaypagi_member"),
			"hrg_weekday12-17_umum" =>$this->input -> post ("weekdaysiang_umum"),
			"hrg_weekday12-17_member" =>$this->input -> post ("weekdaysiang_member"),
			"hrg_weekday17-24_umum" =>$this->input -> post ("weekdaymalam_umum"),
			"hrg_weekday17-24_member" =>$this->input -> post ("weekdaymalam_member"),
			"hrg_weekend07-12_umum" =>$this->input -> post ("weekendpagi_umum"),
			"hrg_weekend07-12_member" =>$this->input -> post ("weekendpagi_member"),
			"hrg_weekend12-17_umum" =>$this->input -> post ("weekendsiang_umum"),
			"hrg_weekend12-17_member" =>$this->input -> post ("weekendsiang_member"),
			"hrg_weekend17-24_umum" =>$this->input -> post ("weekendmalam_umum"),
			"hrg_weekend17-24_member" =>$this->input -> post ("weekendmalam_member")
			);
		$this->Lapangan_m->edit_lapangan($id_lapangan, $data);
		redirect('lapangan');
	}
}