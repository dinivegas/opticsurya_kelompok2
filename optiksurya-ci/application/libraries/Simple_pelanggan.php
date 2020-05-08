<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_pelanggan
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();
        //load data model user
        $this->CI->load->model('pelanggan_model');
	}

	//fungsi login
	public function login($email,$password)
	{
		$check = $this->CI->pelanggan_model->login($email,$password);
		//jika ada data user, maka create session login
		if($check){
			$id_pelanggan	= $check->id_pelanggan;
			$nama_pelanggan		= $check->nama_pelanggan;
		
			//create session
			$this->CI->session->set_userdata('id_pelanggan',$id_pelanggan);
			$this->CI->session->set_userdata('nama_pelanggan',$nama_pelanggan);
			$this->CI->session->set_userdata('email',$email);
			//redirect ke halaman admin yang diproteksi
			redirect(base_url('dashboard'),'refresh');
		} else{
			//kalau tidak ada (username/password salah) suruh login lagi
				$this->CI->session->set_flashdata('warning', 'Username atau Password Salah');
				redirect(base_url('masuk'),'refresh');
		}
	}

	//fungsi cek login
	public function cek_login()
	{
		//memeriksa apakah sessiom sudah atau belum, jika belum alihkan ke login
		if ($this->CI->session->userdata('email') == "") {
			$this->CI->session->set_flashdata('warning', 'Anda Belum Login');
			redirect(base_url('masuk'),'refresh');
		}
	}

	//fungsi logout
	public function logout()
	{
		//membuang semua session yang telah diset pada saat 
			$this->CI->session->unset_userdata('id_pelanggan');
			$this->CI->session->unset_userdata('nama_pelanggan');
			$this->CI->session->unset_userdata('email');
	
			//setelah session dibuang maka redirect ke login
			$this->CI->session->set_flashdata('Sukses', 'Anda Berhasil Logout');
			redirect(base_url('masuk'),'refresh');

	}
	

}

/* End of file Simple_pelanggan.php */
/* Location: ./application/libraries/Simple_pelanggan.php */
