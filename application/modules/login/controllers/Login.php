<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MX_Controller {

	function __construct(){
		parent ::__construct();
		$this->load->model('Login_m');
	}

	public function index()
	{
		$this->load->view('login_v');
	}

	public function check_pengguna(){
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		$check = $this->Login_m->get_pengguna($username,$password);
		if(count($check) == 1){
			$this->session->set_userdata('user',$check);
			redirect('dashboard');
		}else{
			redirect('login');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('home');
	}
}
