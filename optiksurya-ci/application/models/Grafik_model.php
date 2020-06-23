<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grafik_model extends CI_Model {

	function get_data(){
		$this->db->select('year, purchase, sale, profit');
		$result = $this->db->get('account');
		return $result;
	
	}
}