<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->model('pelanggan_model');
        $this->load->model('detail_transaksi_model');
        $this->load->model('transaksi_model');
		//halaman ini diproeksi dengan simple pelanggan=check login
		$this->simple_pelanggan->cek_login();
	}

	public function index()
	{
		// Ambil data login id_pelanggan
		$id_pelanggan = $this->session->userdata('id_pelanggan');
		$detail_transaksi = $this->detail_transaksi_model->pelanggan($id_pelanggan);	

		$data = array(	'title' 			=> 'Halaman Dashboard Pelanggan',
						'detail_transaksi'  => $detail_transaksi,
						'isi'	 			=> 'dashboard/list'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}
    // belanja
    public function belanja()
    {
        // Ambil data login id_pelanggan
        $id_pelanggan = $this->session->userdata('id_pelanggan');
        $detail_transaksi = $this->detail_transaksi_model->pelanggan($id_pelanggan);

        $data = array(	'title'            => 'Riwayat Belanja',
                        'detail_transaksi'  => $detail_transaksi,
						'isi'	            => 'dashboard/belanja'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}
	
	// detail
	public function detail($kd_transaksi)
	{
		// Ambil data login id_pelanggan
        $id_pelanggan 		= $this->session->userdata('id_pelanggan');
		$detail_transaksi	= $this->detail_transaksi_model->kd_transaksi($kd_transaksi);
		$transaksi 			= $this->transaksi_model->kd_transaksi($kd_transaksi);
		// pastikan bahwa pelanggan mengakses data transaksi
		if($detail_transaksi->id_pelanggan	!= $id_pelanggan) {
			$this->session->set_flashdata('warning', 'Anda Mencoba Mengakses Data Transaksi Orang Lain');
			redirect(base_url('masuk'));
		}

        $data = array(	'title'             => 'Riwayat Belanja',
						'detail_transaksi'  => $detail_transaksi,
						'transaksi'			=> $transaksi,
						'isi'	            => 'dashboard/detail'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function profile()
	{
		// ambil data dari session
		$id_pelanggan 		= $this->session->userdata('id_pelanggan');
		$pelanggan 			= $this->pelanggan_model->detail($id_pelanggan);
		
		// validasi input
		$valid = $this->form_validation;

		$valid->set_rules('nama_pelanggan', 'Nama lengkap', 'required',
			array( 'required'	=> '%s harus diisi'));
		
		$valid->set_rules('alamat', 'Alamat lengkap', 'required',
			array( 'required'	=> '%s harus diisi'));

		$valid->set_rules('telepon', 'Nomor Telepon', 'required',
			array( 'required'	=> '%s harus diisi'));

		if ($valid->run()===FALSE) {
		//end validasi
		$data = array(	'title'             => 'Profile Saya',
						'pelanggan'			=> $pelanggan,
						'isi'	            => 'dashboard/profile'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}//masuk databse
		else{
			$i= $this->input;
			// jika lebih dari 6 karakter maka password diganti
			if(strlen($i->post('password')) >= 6 ) {
			$data= array(	'id_pelanggan' 		=> $id_pelanggan,
							'nama_pelanggan'	=> $i->post('nama_pelanggan'),
							'password' 			=> SHA1($i->post('password')),
							'telepon' 			=> $i->post('telepon'),
							'alamat' 			=> $i->post('alamat')
							);
			}else{
				// jika kurang dari 6 karakter maka password tidak di ganti
			$data= array(	'id_pelanggan' 		=> $id_pelanggan,
							'nama_pelanggan'	=> $i->post('nama_pelanggan'),
							'telepon' 			=> $i->post('telepon'),
							'alamat' 			=> $i->post('alamat')
							);
			}
			$this->pelanggan_model->edit($data);
			$this->session->set_flashdata('sukses', 'Update Profile Berhasil');
			redirect(base_url('dashboard/profile'),'refresh');		
			
		}
	}
}
/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */