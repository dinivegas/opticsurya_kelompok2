<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');

		//proteksi
		$this->simple_login->cek_login();

	}

	public function index()
	{
		$user = $this->user_model->listing();
		$data = array(	'title'		=> 'Data Pengguna',
						'user'		=> $user,
						'isi'		=> 'admin/user/list'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	// tambah user
	public function tambah()
	{
		// validasi
		$valid = $this->form_validation;

		$valid->set_rules('nama', 'Nama lengkap', 'required',
			array( 'required'	=> '%s harus diisi'));

		$valid->set_rules('email', 'Email', 'required|valid_email',
			array(	'required'		=> '%s harus diisi',
					'valid_email' 	=> '%s tidak valid'));

		$valid->set_rules('username', 'Username', 'required|min_length[6]|max_length[30]|is_unique[user.username]',
			array(	'required'		=> '%s harus diisi',
					'min_length'	=> '%s minimal 6 karakter',
					'max_length'	=> '%s maksimal 30 karakter',
					'is_unique'		=> '%s sudah tersedia. Buat Username Baru.'));

		$valid->set_rules('password', 'Password', 'required',
			array( 'required'	=> '%s harus diisi'));
		if ($valid->run()===FALSE) {

			//end validasi

		$data = array(	'title' => 'Tambah Pengguna',
						'isi'	=> 'admin/user/tambah'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		//masuk databse
		}else{
			$i= $this->input;
			$data= array(	'nama' 			=> $i->post('nama'),
							'email' 		=> $i->post('email'),
							'username' 		=> $i->post('username'),
							'password' 		=> SHA1($i->post('password')),
							'akses_level' 	=> $i->post('akses_level')
							);
			$this->user_model->tambah($data);
			$this->session->set_flashdata('sukses', 'Data berhasil ditambahkan');
			redirect(site_url('admin/user'),'refresh');				
		}
	}
	// edit
	public function edit($id_user)
	{
		// validasi
		$user = $this->user_model->detail($id_user);
		$valid = $this->form_validation;

		$valid->set_rules('nama', 'Nama lengkap', 'required',
			array( 'required'		=> '%s harus diisi'));

		$valid->set_rules('email', 'Email', 'required|valid_email',
			array(	'required'		=> '%s harus diisi',
					'valid_email' 	=> '%s tidak valid'));

		$valid->set_rules('password', 'Password', 'required',
			array( 'required'	=> '%s harus diisi'));
		if ($valid->run()===FALSE) {

		$data = array(	'title' 	=> 'Edit Pengguna',
						'user'		=>	$user,
						'isi'		=> 'admin/user/edit'
					);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		}else{
			$i= $this->input;
			$data= array(	'id_user'		=> $id_user,
							'nama' 			=> $i->post('nama'),
							'email' 		=> $i->post('email'),
							'username' 		=> $i->post('username'),
							'password' 		=> SHA1($i->post('password')),
							'akses_level' 	=> $i->post('akses_level')
							);
			$this->user_model->edit($data);
			$this->session->set_flashdata('sukses', 'Data telah diedit');
			redirect(site_url('admin/user'),'refresh');				
		}
	}
	public function delete($id_user)
	{
		$data = array('id_user'	=> $id_user);
		$this->user_model->delete($data);
		$this->session->set_flashdata('Sukses', 'Data Berhasil Dihapus');
		redirect(site_url('admin/user'), 'refresh');

	}

}
