<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct(){
		parent::__construct();
		//$this->load->model('Home_m');
	}

	public function index()
	{
		$this->load->module('layout_frontend');
		$this->layout_frontend->header();
		$this->load->view('home');
		$this->layout_frontend->footer();
	}
}