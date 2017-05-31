<?php 

class Admin extends CI_Controller{

	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("index.php/C_login"));
		}
	}

	function index(){
		redirect(base_url("index.php/C_welcome"));
	}
}