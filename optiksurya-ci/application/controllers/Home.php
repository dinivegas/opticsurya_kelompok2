<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    //Halaman Utama Website
	public function index()
	{
        $data = array(  'title'     => 'OptikSurya',
                        'isi'       => 'home/list'
    );
		$this->load->view('layout/wrapper', $data , FALSE);
	}
}
