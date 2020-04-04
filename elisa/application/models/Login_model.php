<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model{

	public function checkLogin($username, $password)
	{
		return $this->db->query("SELECT * FROM admin WHERE username='$username' AND password='$password'")->result();
	}
	
}