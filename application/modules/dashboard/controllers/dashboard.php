<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MX_Controller {

	function __construct(){
		parent ::__construct();
		$this->load->model('Dashboard_m');	
	}

	public function index()
	{
		$sess = $this->session->userdata('user');
		$sess = $sess[0];
		$this->load->module('Layout');
		$this->layout->header();
		$this->layout->sidebar();
		$jml_transaksi = $this->Dashboard_m->count_transaksi();
		$jml_member_aktif = $this->Dashboard_m->count_member_aktif();
		$jml_posting = $this->Dashboard_m->count_postingan();
		// $tgl_trx = $this->Dashboard_m->get_tgl_transaksi();
		// $bln_int = array();
		// $data_chart = '';
		// for ($i=0; $i < count($tgl_trx); $i++) { 
		// 	$tgl = $tgl_trx[$i]['tgl_transaksi'];
		// 	$bln = substr($tgl, 5,2);
		// 	if(!in_array($bln, $bln_int)){
		// 		$bln2 = (int)$bln - 1;
		// 		array_push($bln_int,$bln2);
		// 	}
		// }
		// for ($i=0; $i < count($bln_int); $i++) {
		// 	$normal_bln = (int)$bln_int[$i] + 1;
		// 	$year_month = '2018-'.$normal_bln; 
		// 	$count = $this->Dashboard_m->count_by_date($year_month);
		// 	$current = $bln_int[$i];
		// 	if($i+1 != count($bln_int)){
		// 		$str = $current.'_'.$count.'*';
		// 	}else{
		// 		$str = $current.'_'.$count;
		// 	}
		// 	$data_chart .= $str;
		// }
		// $data2 = array(
		// 	'data_chart' => $data_chart
		// );

		$data = array(
			'username' => $sess['username'],
			'jml_transaksi' => $jml_transaksi,
			'jml_member_aktif' => $jml_member_aktif,
			'jml_posting' => $jml_posting
		);

		$this->load->view('Dashboard_v', $data);
		$this->layout->footer();
	}
}
