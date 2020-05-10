<?php
	defined('BASEPATH') OR exit('No direct script access allowed.');

	class Simple_login{
		protected $CI;

		public function __construct()
		{
			$this->CI =& get_instance();
			//load data model user
			$this->CI->load->model('User_model');
		}

		//fungsi login
		public function login($username, $password)
		{
			$check = $this->CI->User_model->login($username, $password);
			//jika ada data user, maka create session login
			if ($check) {
				$id_user = $check->id_user;
				$nama	 = $check->nama;
			}
		}

		public function cek_login()
		{

		}

		public function logout()
		{
			# code...
		}
	}
?>