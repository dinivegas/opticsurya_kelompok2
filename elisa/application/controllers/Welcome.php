<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('Login_model');
	}
	public function index()
	{
		if($this->session->userdata('is_login')==TRUE){redirect('Home');}
		$this->load->view('login');
	}
	public function login()
	{
		if(isset($_POST['submit'])){
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$this->load->model('Login_model');
			$check = $this->Login_model->checkLogin($username, $password);

			if (!$check){
				redirect('Welcome/index');	
			}else{
				$dataadmin = array(
					'username'=>$username,
					'password'=>$password,
					'is_login'=>TRUE,
					);
				$this->session->set_userdata($dataadmin);
				redirect('Home');
			}
		}
	}
	public function logout()
	{
		$dataadmin = array('username','password','is_login');
		$this->session->unset_userdata($dataadmin);
		redirect('Welcome');
	}
}