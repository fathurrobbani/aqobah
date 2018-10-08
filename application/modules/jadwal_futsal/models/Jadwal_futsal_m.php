<?php
class Jadwal_futsal_m extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	public function get_jadwal_futsal(){
		$this->db->join('lapangan','lapangan.id_lapangan=jadwal_lapangan.id_lapangan');
		$q = $this->db->get('jadwal_lapangan');
		return $q->result_array();
	}
	public function add_jadwal_futsal($data){
		$q = $this->db->insert('jadwal_lapangan', $data);
	}
}
?>