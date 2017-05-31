<?php 
	/**
	* 
	*/
	class Login extends CI_Controller
	{
		
		public function __construct()
		{
			parent::__construct();
			$this->load->library('session');
		}
		
		public function index()
		{
			
			//utk menampung form
			$user = $this->input->post('username');
			$pass = $this->input->post('password');
			
			if($user == 'admin' && $pass == 'admin')
			{
				//buat sessionnya gitu
				$this->session->set_userdata('username',$user);
				
				//redirectki gitu
				redirect('home/index');	
			}
			else
			{
				$this->load->view('login/index');
			}				
		}
		
		public function admin_page()
		{
			$this->load->view('login/admin_page');
		}
		
		public function logout()
		{
			$this->session->unset_userdata(array('username' => ''));
			redirect('login/index');
		}
	}


 ?>