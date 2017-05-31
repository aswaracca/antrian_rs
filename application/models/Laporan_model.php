<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function select_pasien($data){
        $this->db->where('tgl_reg',$data);
        return $this->db->get('reg_pasien')->result_array();
    }
  
}
?>