<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * 
 */
class Konfigurasi extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Konfigurasi_model');
	}

	//konfigurasi umum
	public function index()
	{
		$konfigurasi  		= $this->konfigurasi_model->listing();


			//validasi input
			$valid = $this->form_validation;

			$valid->set_rules('namaweb', 'Nama Website', array(
				'required'		=> '%s harus diisi',
				));

			
			if ($valid->run() === FALSE) {
				//end validasi

				$data = array('title'  => 'Konfigurasi Website', 
					'konfigurasi'	=> $konfigurasi,
								'isi'  => 'admin/konfigurasi/list'
							);
				$this->load->view('admin/layout/wrapper', $data, FALSE);
				//masuk database
			}else{
				$i = $this->input;
				$data = array(
					'id_konfigurasi'	=> $konfigurasi->id_konfigurasi,
					'namaweb'	=> $i->post('nama_kategori'),
					'tagline'	=> $i->post('tagline'),
					'email'		=> $i->post('email'),
					'website'	=> $i->post('website'),
					'keywords'	=> $i->post('keywords'),
					'metatext'	=> $i->post('metatext'),
					'telepon'	=> $i->post('telepon'),
					'alamat'	=> $i->post('alamat'),
					'facebook'	=> $i->post('facebook'),
					'instagram'	=> $i->post('instagram'),
					'deskripsi'	=> $i->post('deskripsi'),
					'rekening_pembayaran'	=> $i->post('rekening_pembayaran'),
						);	
				$this->konfigurasi_model->edit($data);
				$this->session->set_flashdata('sukses', 'Data telah diupdate');
				redirect(base_url('admin/konfigurasi'), 'refresh');
			}
			//end masuk database
	}

	//konfigurasi logo website
	public function logo()
	{
		$konfigurasi = $this->konfigurasi_model->listing();
		//validasi input
		$validasi	= $this->form_validation;

		$valid->set_rules('nama_web', 'Nama Website', 'required', array('required' 	=> '%s harus diisi'));

		$valid->set_rules('kode_produk', 'Kode produk', 'required', array('required'	=> '%s harus diisi'));

		if($valid->run())
		{
			//check jika gambar diganti
			if (!empty($_FILES['gambar']['name'])) 
			{
				$config['upload_path']	= './assets/upload/image/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size']		= '2400';
				$config['max_width']	= '2024';
				$config['max_height']	= '2024';

				$this->load->library('upload', $config);

				if (! $this->upload->do_upload('logo'))
					//end validasi
				{
					$data = array('title' 	=> 'Konfigurasi logo website',
						'konfigurasi' 		=> $konfigurasi,
						'produk'		=> $produk,
						'error'			=> $this->upload->display_errors(),
						'isi'			=> 'admin/konfigurasi/logo'
					);
					$this->load->view('admin/layout/wrapper', $data, FALSE);
					//masuk database
				}else{
					$upload_gambar	= array('upload_data'	=> $this->upload->data());

					//create thumbnail gambar
					$config['image_library']	='gd2';
					$config['source_image']		='./assets/upload/image'.$upload_gambar['upload_data']['file_name'];
					//lokasi folder thumbnail
					$config['new_image']	= './assets/upload/image/thumbs/';
					$config['create_thumb']	= TRUE;
					$config['maintain_ratio']	= TRUE;
					$config['width']		= 250; //pixels
					$config['height']		= 250;
					$config['thumb_marker']	='';

					$this->load->library('image_lib', $config);

					$this->image_lib->resize();
					//end create thumbnail

					$i = $this->input;
					//slug produk
					$slug_produk	= url_title($this->input->post('nama_produk'). ''. $this->input->post('kode_produk'), 'dash', TRUE);

					$data  =  array(
						'id_produk'		=> $id_produk,
						'id_user'		=> $this->session->userdata('id_user'),
						'id_kategori'	=> $i->post('id_kategori'),
						'kode_produk'	=> $i->post('kode_produk'),
						'nama_produk'	=> $i->post('nama_produk'),
						'slug_produk'	=> $slug_produk,
						'keterangan'	=> $i->post('keterangan'),
						'keywords'		=> $i->post('keywords'),
						'harga'			=> $i->post('harga'),
						'stok'			=> $i->post('stok'),
						//disimpn nama file gambar(gambar tidak diganti)
						'gambar'	=> $upload_gambar['upload_data']['file_name'],
						'berat'			=> $i->post('berat'),
						'ukuran'		=> $i->post('ukuran'),
						'status_produk'	=> $i->post('status_produk')
					);
					$this->produk_model->edit($data);
					$this->session->set_flashdata('sukses', 'data telah diedit');
					redirect(base_url('admin/produk'), 'refresh');
				}}
					else{
						//edit produk tanpa ganti gambar
						$i = $this->input;
						//slug produk
						$slug_produk = url_title($this->input->post('nama_produk').''.$this->input->post('kode_produk'), 'dash', TRUE);

						$data  =  array(
						'id_produk'		=> $id_produk,
						'id_user'		=> $this->session->userdata('id_user'),
						'id_kategori'	=> $i->post('id_kategori'),
						'kode_produk'	=> $i->post('kode_produk'),
						'nama_produk'	=> $i->post('nama_produk'),
						'slug_produk'	=> $slug_produk,
						'keterangan'	=> $i->post('keterangan'),
						'keywords'		=> $i->post('keywords'),
						'harga'			=> $i->post('harga'),
						'stok'			=> $i->post('stok'),
						//disimpn nama file gambar(gambar tidak diganti)
						//'gambar'	=> $upload_gambar['upload_data']['file_name'],
						'berat'			=> $i->post('berat'),
						'ukuran'		=> $i->post('ukuran'),
						'status_produk'	=> $i->post('status_produk')
					);
					$this->produk_model->edit($data);
					$this->session->set_flashdata('sukses', 'data telah diedit');
					redirect(base_url('admin/produk'), 'refresh');
				}}$data = array('title' 	=> 'Konfigurasi logo website',
						'konfigurasi' 		=> $konfigurasi,
						'produk'		=> $produk,
						'error'			=> $this->upload->display_errors(),
						'isi'			=> 'admin/konfigurasi/logo'
					);
				$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	//konfigurasi icon website
	public function icon()
	{

	}
}