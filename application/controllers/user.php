<?php

class User extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
	}
	
	function login() 
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required|xss_clean');

		if($this->form_validation->run() == FALSE)
		{
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->load->view('template/main', array('content' => 'user/login'));
		}
		else
		{
			$this->load->library('log_lib');
			
			if (isset($_POST['submit_login'])) {
				$login = $this->log_lib->log_user($_POST['username'], $_POST['password']);
				
				if ($login) {
					$this->session->set_userdata('lend_user', md5($_POST['username'].config_item('encryption_key')));
					redirect('/stats/', 'refresh');
				} else {
					$this->load->view('template/main', array('content' => 'user/login', 'data' => array('error' => '<div class="error">Invalid Username/Password</div>')));
				}
			}
		}
	}

}