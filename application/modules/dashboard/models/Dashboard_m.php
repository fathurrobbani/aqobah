<?php
class Dashboard_m extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	public function count_transaksi() {
		$q = $this->db->count_all('transaksi_lapangan');
		return $q;
	}
	  
	public function count_member_aktif() {
		$this->db->where('ismember', 'member');
		$this->db->where('status', 'aktif');
		$q = $this->db->count_all('pengguna');
		return $q;
	}
	  
	public function count_postingan() {
		$q = $this->db->count_all('postingan');
		return $q;
	}

	public function get_tgl_transaksi(){
		$this->db->select('tgl_transaksi');
		$q = $this->db->get('transaksi_lapangan');
		return $q->result_array();
	}

	public function count_by_date($year_month){
		$this->db->where("DATE_FORMAT('tgl_transaksi','%Y-%m') = ", $year_month);
		$q = $this->db->count_all('transaksi_lapangan');
		return $q;
	}
}
?>