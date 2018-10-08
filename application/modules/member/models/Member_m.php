<?php
class Member_m extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	public function get_member(){
		$this->db->where('namalevel','member');
		$this->db->order_by('id_pengguna', 'DESC');
		$q = $this->db->get('pengguna');
		return $q->result_array();
	}

	public function add_member($data){
		$this->db->insert('pengguna', $data);
	}

	public function edit_member($id, $data){
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

	public function change_password($where, $data)
    {
        $this->db->update('pengguna', $data, $where);
        return $this->db->affected_rows();
    }
}
?>