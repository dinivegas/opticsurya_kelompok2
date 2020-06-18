<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_transaksi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function listing()
	{
		$this->db->select('*');
		$this->db->from('detail_transaksi');
		$this->db->order_by('id_detail_transaksi', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	// riwayat transaksi pelanggan
	public function pelanggan($id_pelanggan)
	{
		$this->db->select('detail_transaksi.*, SUM(transaksi.jumlah) AS total_item');
		$this->db->from('detail_transaksi');
		$this->db->where('detail_transaksi.id_pelanggan',$id_pelanggan);
		// Join
		$this->db->join('transaksi', 'transaksi.kd_transaksi = detail_transaksi.kd_transaksi', 'left');
		// end join
		$this->db->group_by('detail_transaksi.id_detail_transaksi');
		$this->db->order_by('id_detail_transaksi', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	// detail kode_transaksi
	public function kd_transaksi($kd_transaksi)
	{
		$this->db->select('*');
		$this->db->from('detail_transaksi');
		$this->db->where('kd_transaksi', $kd_transaksi);
		$this->db->order_by('id_detail_transaksi', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	// detail detail_transaksi
	public function detail($id_detail_transaksi)
	{
		$this->db->select('*');
		$this->db->from('detail_transaksi');
		$this->db->where('id_detail_transaksi', $id_detail_transaksi);
		$this->db->order_by('id_detail_transaksi', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	//detail slug detail_transaksi
	public function read($slug_detail_transaksi)
	{
		$this->db->select('*');
		$this->db->from('detail_transaksi');
		$this->db->where('slug_detail_transaksi', $slug_detail_transaksi);
		$this->db->order_by('id_detail_transaksi', 'desc');
		$query = $this->db->get();
		return $query->row();
	}
	
	// tambah
	public function tambah($data)
	{
		$this->db->insert('detail_transaksi', $data);
	}
	// edit
	public function edit($data)
	{
		$this->db->where('id_detail_transaksi', $data['id_detail_transaksi']);
		$this->db->update('detail_transaksi', $data);
	}
	// hapus
	public function delete($data)
	{
		$this->db->where('id_detail_transaksi', $data['id_detail_transaksi']);
		$this->db->delete('detail_transaksi', $data);
	}
		

}
