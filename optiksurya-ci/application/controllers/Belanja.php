<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Belanja extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('konfigurasi_model');
		$this->load->model('produk_model');
		$this->load->model('kategori_model');
		$this->load->model('ongkir_model');
		$this->load->model('pelanggan_model');
		$this->load->model('detail_transaksi_model');
		$this->load->model('transaksi_model');

		//load helper random string untuk kode transaksi
		$this->load->helper('string');
	}

	public function index()
	{
		$keranjang = $this->cart->contents();

		$data  = array(	'title' 	=> 'Keranjang Belanja',
						'keranjang'	=> $keranjang,
						'isi'		=> 'belanja/list'
						 );
		$this->load->view('layout/wrapper', $data, FALSE);
	}
	//sukses belanja
	public function sukses()
	{

		$data = array(	'title'		=> 'Belanja Berhasil',
						'isi'		=> 'belanja/sukses'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}
	//checkout
	public function checkout()
	{
		$ongkir = $this->ongkir_model->listing();
		//cek pelanggan sudah login atau belum jika belum maka tidak bisa melakukan proses checkout dan harus login terselbih dahulu
		//cek login dengan menggunakan session
		if($this->session->userdata('email')){
			$email     		= $this->session->userdata('email');
			$nama_pelanggan = $this->session->userdata('nama_pelanggan');
			$pelanggan 		= $this->pelanggan_model->sudah_login($email, $nama_pelanggan);

			$keranjang 		= $this->cart->contents();

			// validasi input
			$valid = $this->form_validation;

			$valid->set_rules('nama_pelanggan', 'Nama lengkap', 'required',
				array( 'required'	=> '%s harus diisi'));
			$valid->set_rules('telepon', 'Nomor Telepon', 'required',
				array( 'required'	=> '%s harus diisi'));
			$valid->set_rules('alamat', 'Alamat', 'required',
				array( 'required'	=> '%s harus diisi'));

			$valid->set_rules('email', 'Email', 'required|valid_email',
				array(	'required'		=> '%s harus diisi',
						'valid_email' 	=> '%s tidak valid',
						'is_unique'		=> '%s sudah terdaftar.'));
			if ($valid->run()===FALSE) {
				//end validasi
			$data = array(	'title'		=> 'Checkout',
							'keranjang'	=> $keranjang,
							'pelanggan'	=> $pelanggan,
							'isi'		=> 'belanja/checkout'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
		//masuk database
		}else{
			$i= $this->input;
			$data= array(	'id_pelanggan'		=> $pelanggan->id_pelanggan,
							'nama_pelanggan'	=> $i->post('nama_pelanggan'),
							'email' 			=> $i->post('email'),
							'telepon' 			=> $i->post('telepon'),
							'alamat' 			=> $i->post('alamat'),
							'kd_transaksi' 		=> $i->post('kd_transaksi'),
							'tgl_transaksi' 	=> $i->post('tgl_transaksi'),
							'jumlah_transaksi' 	=> $i->post('jumlah_transaksi'),
							'status_bayar' 		=> 'Belum Bayar',
							'tgl_post'			=> date('Y-m-d H:i:s')
							);
			//proses masuk ke detail transaksi
			$this->detail_transaksi_model->tambah($data);
			//proses masuk ke transaksi
			foreach ($keranjang as $keranjang) {
				$subtotal = $keranjang['price'] * $keranjang['qty'];

				$data = array(	'id_pelanggan'		=> $pelanggan->id_pelanggan,
								'kd_transaksi'		=> $i->post('kd_transaksi'),
								'id_produk'			=> $keranjang['id'],
								'harga'				=> $keranjang['price'],
								'jumlah'			=> $keranjang['qty'],
								'total_harga'		=> $subtotal,
								'tgl_transaksi'		=> $i->post('tgl_transaksi')
								);
			$this->transaksi_model->tambah($data);
			}
			//end masuk ke tabel transaksi
			//setelah masuk ke tabel transaksi, maaka keranjang di kosongkan 
			$this->cart->destroy();
			//end destroy
			$this->session->set_flashdata('sukses', 'Checkout Berhasil');
			redirect(base_url('belanja/sukses'),'refresh');		
		}
		//end masuk database
		}else{
			//kalau belum maka harus registrasi
			$this->session->set_flashdata('sukses', 'Silahkan Log In atau Registrasi terlebih dahulu');
			redirect(base_url('registrasi'),'refresh');
		}

	}
	//tambahkan keranjang bealanja
	public function add()
	{
		//ambil data kategori
		$ongkir = $this->ongkir_model->listing();
		//ambil data dari form
		$id 			= $this->input->post('id');
		$qty 			= $this->input->post('qty');
		$price			= $this->input->post('price');
		$name 			= $this->input->post('name');
		$redirect_page 	= $this->input->post('redirect_page');
		$ongkir  		= $this->input->post('tarif');

		//proses mmasukan ke keranjang belanja
		$data = array( 	'id'      	=> $id,
        				'qty'     	=> $qty,
        				'price'   	=> $price,
        				'name'    	=> $name,
        				'ongkir'	=> $ongkir
						);
		$this->cart->insert($data);
		// redirect page
		redirect($redirect_page,'refresh');

	}
	//update cart
	public function update_cart($rowid)
	{
		if($rowid) {
			$data = array(	'rowid'	=> $rowid,
							'qty'	=> $this->input->post('qty')
				);
			$this->cart->update($data);
			$this->session->flashdata('sukses', 'Data keranjang telah diupdate');
			redirect(base_url('belanja'),'refresh');
		}else{
			//jika tidak ada row id
			redirect(base_url('belanja'),'refresh');
		}
	}
	//hapus semua keranjang belanja 
	public function hapus($rowid='')
	{
		//hapus salah satu
		if($rowid){
		$this->cart->remove($rowid);
		$this->session->set_flashdata('sukses', 'Produk telah dihapus dari keranjang');
		redirect(base_url('belanja'),'refresh');
		}else{
		//hapus semua
		$this->cart->destroy();
		$this->session->set_flashdata('sukses', 'Data keranjang belanja telah dihapus');
		redirect(base_url('belanja'),'refresh');
		}
	}
}

/* End of file Belanja.php */
/* Location: ./application/controllers/Belanja.php */