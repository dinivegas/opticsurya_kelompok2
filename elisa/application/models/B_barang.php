<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class B_barang extends CI_Model{
		public function tampil_data()
	{
		return $this->db->get('barang');
	}	
	public function input_data($table, $databarang)
	{
		$this->db->insert($table, $databarang);
	}	
	public function hapus_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function edit_data($where, $table)
	{
		return $this->db->get_where($table,$where);	
	}
	public function update_data($where,$databarang,$table)
	{
		$this->db->where($where);	
		$this->db->update($table, $databarang);
	}
	public function get_keyword($keyword){
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->like('nama_barang', $keyword);
		$this->db->or_like('harga', $keyword);
		return $this->db->get()->result();
	}
}
