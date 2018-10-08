<?php
class Transaksi_m extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	public function get_transaksi(){
		$this->db->join('pengguna','pengguna.id_pengguna=transaksi_lapangan.id_pengguna');
		$this->db->join('jadwal_lapangan','jadwal_lapangan.id_jadwallapangan=transaksi_lapangan.id_jadwal');
		$q = $this->db->get('transaksi_lapangan');
		return $q->result_array();
	}

	public function add_jadwal($data){
		$this->db->insert('jadwal_lapangan', $data);
		$insert_id = $this->db->insert_id();
   		return $insert_id;
	}

	public function add_transaksi($data){
		$this->db->insert('transaksi_lapangan', $data);
	}

	public function get_lapangan(){
		$l = $this->db->get('lapangan');
		return $l->result_array();
	}
	public function get_pengguna(){
		$this->db->where('ismember','member');
		$this->db->where('status','aktif');
		$p = $this->db->get('pengguna');
		return $p->result_array();
	}

	public function get_info_pengguna($id){
		$this->db->where('id_pengguna', $id);
		$p = $this->db->get('pengguna');
		return $p->result_array();
	}

	public function get_info_lapangan($id){
		$this->db->where('id_lapangan', $id);
		$p = $this->db->get('lapangan');
		return $p->result_array();
	}

	public function get_membertransaksi(){
		$this->db->join('pengguna','pengguna.id_pengguna=transaksi_lapangan.id_pengguna','left');
		$q = $this->db->get('transaksi_lapangan');
		return $q->result_array();
	}

	public function update_pengguna($id,$data){
		$this->db->where('id_pengguna',$id);
		$this->db->update('pengguna', $data);
	}
}
?>