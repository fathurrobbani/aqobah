<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layout_frontend extends MX_Controller {

	function __cunstruct(){
		parent ::__construct();

	}

	public function header()
	{
		$this->load->view('header');
	}

	public function footer()
	{
		$this->load->view('footer');
	}

}
