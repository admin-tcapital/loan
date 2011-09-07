<?php

class Template extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
	}
	
	function view() 
	{
		$this->load->view('template/main');
	}
	
	function register()
	{
		$this->load->library('log_lib');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username','Username','trim|xss_clean|required|callback_username_not_exist');
		$this->form_validation->set_rules('password','Password','trim|xss_clean|required');
		$this->form_validation->set_rules('password_conf','Confirm Password','trim||xss_clean|required|matches[password]');
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('template/main',array('content'=>'user/register'));
		}else 
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
		if($this->log_lib->register_user($username,$password))
						{
							$this->session->set_flashdata('insertdata', 'The data was inserted');
							$this->load->view('template/main',array('content'=>'user/register'));
						}else
						{
							return FALSE;
						}
		}
	}
}