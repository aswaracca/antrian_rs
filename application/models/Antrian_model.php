<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Antrian_model extends CI_Model {
		
		public function tampil(){
		
		// return $this->db->get('reg_pasien',1);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get('reg_pasien', 1);
		return $query->result();
		
		
	}
}