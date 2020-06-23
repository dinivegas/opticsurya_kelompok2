<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {
	//load model
	public function __construct()
	{
		parent::__construct();
		//proteksi halaman
		$this->simple_login->cek_login();

		//model Grafik_model untuk menarik tabel dari database
		$this->load->model('Grafik_model');

	}
	// halaman dashboard
	public function index()
	{
		$data = array(	'title' => 'Halaman Admin',
						'isi' 	=> 'admin/dasbor/list'
						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);

		//grafik
	$data2 = $this->Grafik_model->get_data()->result();
      $x['data'] = json_encode($data2);
      $this->load->view('admin/dasbor/Grafik_view',$x);
	}
	
}

