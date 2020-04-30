<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Optik extends CI_Controller {

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
	
	/**
	 *  PS : untuk mengarahkan klik tombol ke suatu halaman lain,
	 *  gunakan php site_url('FILECONTROLLER/NAMAMETHOD')
	 *  di dalam TAG ATTRIBUTE HREF.
	 *  Untuk memuat assets dengan PHP base_url('folder/folder1/...') di dalam TAG ATTRIBUTE HREF
	 */
	
	public function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$this->load->view('optiksurya/kategori.php');
		$this->load->view('optiksurya/menu.php');
		$this->load->view('optiksurya/footer.php');
	}
	/*delete comment sign if done
	public function kategori(){
		$this->load->view('optiksurya/kategori.php');
	}
	*/
	public function keranjang(){
		$this->load->view('optiksurya/keranjang.php');
	}
	public function barang(){
		$this->load->view('optiksurya/barang.php');
	}
	public function beli(){
		$this->load->view('optiksurya/beli.php');
	}
	public function checkout(){
		$this->load->view('optiksurya/checkout.php');
	}
	public function detail(){
		$this->load->view('optiksurya/detail.php');
	}
	public function daftar(){
		$this->load->view('menu.php');
	}
	
}