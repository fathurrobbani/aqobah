<?php
class Berita_m extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	public function get_berita(){
		$this->db->join('pengguna','pengguna.id_pengguna=postingan.id_pengguna','left');
		$q = $this->db->get('postingan');
		return $q->result_array();
	}
	public function get_berita2($id){
		$this->db->join('pengguna','pengguna.id_pengguna=postingan.id_pengguna','left');
		$this->db->where('id_postingan', $id);
		$q = $this->db->get('postingan');
		return $q->result_array();
	}


	public function add_berita($data){
		$this->db->insert('postingan', $data);
	}
	public function delete($id){
		$this->db->where('id_postingan',$id);
		$this->db->delete('postingan');
	}
	public function edit_berita($id, $data){
		$this->db->where('id_postingan', $id);
		$this->db->update('postingan', $data);
	}

}
?>