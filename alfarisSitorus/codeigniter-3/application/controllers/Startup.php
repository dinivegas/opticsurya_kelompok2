<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Startup extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$this->load->view('startup/index');
	}
	public function service(){
		$this->load->view('startup/service');
	}
	public function blog()
	{
		$this->load->view('startup/blog');
	}
	public function about()
	{
		$this->load->view('startup/about');
	}
	public function elements()
	{
		$this->load->view('startup/elements');
	}
	public function contact()
	{
		$this->load->view('startup/contact');
	}
	public function contact_process(){
		$this->load->view('startup/contact_process');
	}
	public function main(){
		$this->load->view('startup/main');
	}
	public function portfolio(){
		$this->load->view('startup/portfolio');
	}
	public function portfolio_details(){
		$this->load->view('startup/portfolio_details');
	}
	public function single_blog(){
		$this->load->view('startup/single-blog');
	}
}

?>