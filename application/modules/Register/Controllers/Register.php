<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class register extends MX_Controller {

	function __cunstruct(){
		parent ::__construct();

	}

	public function index()
	{
		$this->load->view('register');
	}
}
