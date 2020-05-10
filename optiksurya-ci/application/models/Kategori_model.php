<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Kategori_model extends CI_Model
	{

		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		//detail kategori
		public function detail($id_Kategori)
		{
			$this->db->select('*');
			$this->db->from('kategori');
			$this->db->where('id_Kategori', $id_Kategori);
			$this->db->order_by('id_Kategori', 'desc');
			$query = $this->db->get();
			return $query->row();
		}

		//login kategori
		public function login($Kategoriname,$password)
		{
			$this->db->select('*');
			$this->db->from('kategori');
			$this->db->where(array('Kategoriname' => $Kategoriname, 
				'password' => SHA1($password)));
			$this->db->order_by('id_Kategori', 'desc');
			$query = $this->db->get();
			return $query->row();
		}


		public function tambah($data)
		{
			$this->db->insert('kategori', $data);
		}

		public function edit($data)
		{
			$this->db->where('id_kategori', $data['id_kategori']);
			$this->db->update('kategori', $data);
		}

		public function delete($data)
		{
			$this->db->where('id_Kategori', $data['id_Kategori']);
			$this->db->delete('kategori', $data);
		}
	}