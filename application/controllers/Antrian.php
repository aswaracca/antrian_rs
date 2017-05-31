<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Antrian extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('antrian_model');
        
    }
    
    public function index()
    {
        $data['data']   = $this->antrian_model->tampil();
        $data['isi']    = 'isi';
        $this->load->view('template/v_header');
        $this->load->view('v_antrian', $data);
        
    }
    
}
