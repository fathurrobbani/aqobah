<?php
class Operator_m extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	public function get_operator(){
		$this->db->where('namalevel','operator');
		$q = $this->db->get('pengguna');
		return $q->result_array();
	}

	public function add_operator($data){
		$this->db->insert('pengguna', $data);
	}

	public function edit_operator($id, $data){
		$this->db->where('id_pengguna', $id);
		$this->db->update('pengguna', $data);
	}

	public function get_pengguna($id){
		$query = $this->db->where('id_pengguna', $id);
		$query = $this->db->get('pengguna');
		return $query->result_array();
	}

	public function delete($id){
		$this->db->where('id_pengguna',$id);
		$this->db->delete('pengguna');
	}
}
?>