<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layout extends MX_Controller {

	function __cunstruct(){
		parent ::__construct();

	}

	public function header()
	{
		$sess = $this->session->userdata('user');
		$data = array(
			'nama' => 	$sess[0]['username']
		);
		$this->load->view('header', $data);
	}

	public function footer($data = null)
	{
		if($data){
			$this->load->view('footer', $data);
		}else{
			$this->load->view('footer');
		}
	}

	public function sidebar()
	{
		$sess = $this->session->userdata('user');
		$data = array(
			'sess' => $this->session->userdata('user'),
			'nama' => 	$sess[0]['username']
		);
		$this->load->view('aside', $data);
	}
}
