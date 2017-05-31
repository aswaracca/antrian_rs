<?php 

class Home extends CI_Controller{

	function __construct(){
		parent::__construct();				
                $this->load->helper('url');
	}

	function index(){				
		$isi = array(
			'judul' => "Dashboard",
			'status' => "",
			);				
		$this->load->view('template/v_header');
		$this->load->view('v_home');	
		
	}
}