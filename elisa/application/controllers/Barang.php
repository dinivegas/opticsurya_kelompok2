<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {
	public function index()
	{
		$databarang['barang'] = $this->B_barang->tampil_data()->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('barang', $databarang);
		$this->load->view('template/footer');
	}
	public function tambah_aksi(){
		$nama = $this->input ->post('nama_barang');
		$harga = $this->input->post('harga');
		$stok = $this->input->post('stok');

		$databarang = array(
		'nama_barang' => $nama,
		'harga' => $harga,
		'stok' => $stok,
		);
		$this->B_barang->input_data('barang', $databarang);
		redirect('Barang/index');
	}
	public function hapus ($id_barang)
	{
		$where = array ('id_barang' => $id_barang);
		$this->B_barang->hapus_data($where, 'barang');
		redirect ('barang');
	}
		public function edit ($id_barang)
	{
		$where = array('id_barang' => $id_barang);
		$databarang['barang'] = $this->B_barang->edit_data($where, 'barang')->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('edit', $databarang);
		$this->load->view('template/footer');
	}
	public function update(){
		$id_barang = $this->input->post('id_barang');
		$nama = $this->input->post('nama_barang');
		$harga = $this->input->post('harga');
		$stok = $this->input->post('stok');

		$databarang = array(
			'nama_barang' => $nama,
			'harga' => $harga,
			'stok' => $stok
			);
		$where = array(
			'id_barang' => $id_barang
			);
		$this->B_barang->update_data($where,$databarang,'barang');
		redirect('barang');
	}
	public function search(){
		$keyword= $this->input->post('keyword');
		$databarang['barang']=$this->B_barang->get_keyword($keyword);
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('barang', $databarang);
		$this->load->view('template/footer');
	}

}