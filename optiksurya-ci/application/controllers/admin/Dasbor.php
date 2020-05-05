<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {

    //Halaman Utama dasbor
	public function index()
	{
        $data = array(  'title'     => 'Halaman Administrator',
                        'isi'       => 'admin/dasbor/list'
    );
		$this->load->view('admin/layout/wrapper', $data , FALSE);
	}
}
