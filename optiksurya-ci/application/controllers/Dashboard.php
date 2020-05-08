<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pelanggan_model');
		//halaman ini diproeksi dengan simple pelanggan=check login
		$this->simple_pelanggan->cek_login();
	}
	public function index()
	{
		$data = array(	'tittle' => 'Halaman Dashboard Pelanggan',
						'isi'	 => 'dashboard/list'
						);
		$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */