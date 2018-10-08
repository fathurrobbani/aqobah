<?php
class Login_m extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	public function get_pengguna($username, $password){
		$this->db->where('username', $username);
		$this->db->where('password',$password);
		$q = $this->db->get('pengguna');
		return $q->result_array();
	}
}