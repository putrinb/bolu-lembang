<?php

class m_laporan extends CI_Model
{
	private $_table = "pembelian_bb";
	function get_pembelian()
	{
		$this->db->select("pembelian_bb.no_faktur, concat(day(pembelian_bb.waktu),' ',monthname(pembelian_bb.waktu),' ',year(pembelian_bb.waktu)) as Tanggal, sum(detail_beli.jumlah*detail_beli.harga_satuan) as total");
		$this->db->from('pembelian_bb');
		$this->db->join('detail_beli','detail_beli.no_faktur=pembelian_bb.no_faktur');
		$this->db->group_by('pembelian_bb.waktu');
		$this->db->order_by('pembelian_bb.waktu');
		return $this->db->get()->result();
	}

	function get_pembelian_pertahun()
	{
		$this->db->select("pembelian_bb.no_faktur, pembelian_bb.waktu, sum(detail_beli.jumlah*detail_beli.harga_satuan) as total");
		$this->db->from('pembelian_bb');
		$this->db->join('detail_beli','detail_beli.no_faktur=pembelian_bb.no_faktur');
		$this->db->group_by('year(pembelian_bb.waktu)');
		$this->db->order_by('pembelian_bb.waktu');
		return $this->db->get()->result();
	}

	function get_pembelian_perbulan()
	{
		$this->db->select("pembelian_bb.no_faktur, concat(monthname(pembelian_bb.waktu),' ',year(pembelian_bb.waktu)) as Tanggal, sum(detail_beli.jumlah*detail_beli.harga_satuan) as total");
		$this->db->from('pembelian_bb');
		$this->db->join('detail_beli','detail_beli.no_faktur=pembelian_bb.no_faktur');
		$this->db->group_by('month(pembelian_bb.waktu)');
		$this->db->order_by('pembelian_bb.waktu');
		return $this->db->get()->result();
	}

	public function get_supplier(){
		$sql = "SELECT a.*,b.nama as NamaSupplier FROM ".$this->_table." a ";
		$sql = $sql." JOIN supplier b ON (a.id_supplier=b.id_supplier) ";
		$query = $this->db->query($sql);
		
		return $query->result_array();
	  }
}
?>