<?php
class Lapangan_m extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	public function get_lapangan(){
		$q = $this->db->get('lapangan');
		return $q->result_array();
	}
	public function add_lapangan($data){
		$q = $this->db->insert('lapangan', $data);
	}
	public function delete($id){
		$this->db->where('id_lapangan',$id);
		$this->db->delete('lapangan');
	}

	public function get_futsal($id){
		$query = $this->db->where('id_lapangan', $id);
		$query = $this->db->get('lapangan');
		return $query->result_array();
	}
	public function edit_lapangan($id, $data){
		$this->db->where('id_lapangan', $id);
		$this->db->update('lapangan', $data);
	}
}
?>