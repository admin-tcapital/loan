<?php

class User extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('log_lib');
	}

	function login()
	{
		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'required|xss_clean');

		if($this->form_validation->run() == FALSE)
		{
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->load->view('template/main', array('content' => 'user/login', 'location' => 'Login', 'menu' => array('Register' => 'user/register')));
		}
		else
		{
			$this->load->library('log_lib');
				
			if (isset($_POST['submit_login'])) {
				$login = $this->log_lib->log_user($_POST['username'], $_POST['password']);

				if ($login) {
					$this->session->set_userdata('lend_user', md5($_POST['username'].config_item('encryption_key')));
					if (isset($_GET['url'])) {
						redirect('http://'.$_SERVER['SERVER_NAME'].urldecode($_GET['url']));
					} else {
						redirect('/stats/', 'refresh');
					}
				} else {
					$this->load->view('template/main', array('content' => 'user/login', 'data' => array('error' => '<div class="error">Invalid Username/Password</div>')));
				}
			}
		}
	}
	
	function logout()
	{
		$sess_data = array(
			'lend_user'	=> ''
		);
		$this->session->unset_userdata($sess_data);

		redirect('/user/login/', 'refresh');
	}

	function register()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('fname','First Name','trim|xss_clean|required');
		$this->form_validation->set_rules('lname','Last Name','trim|xss_clean|required');
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
			$fname = $this->input->post('fname');
			$lname = $this->input->post('lname');
			if($this->log_lib->register_user($username,$password,$fname,$lname))
			{
				$this->session->set_flashdata('insertdata', 'The data was inserted');
				$this->load->view('template/main',array('content'=>'user/register'));
			}else
			{
				return FALSE;
			}
		}
	}


	function username_not_exist($username)
	{
		$this->form_validation->set_message('username_not_exist','That username already exist choose another username');
		if($this->log_lib->check_exist_username($username))
		{
			return FALSE;
		}else
		{
			return TRUE;
		}
	}
	

	function user_manager()
	{
		
		if($this->log_lib->manage_user())
		{
			$data['manage_user'] = $this->log_lib->manage_user();
			$this->load->view('template/main',array('content'=>'user/manage_user','data'=>$data['manage_user']));
		}else
		{
			return  FALSE;
		}
	}
	

	function user_diactivate($id)
	{
		
		if($this->log_lib->diactivate_user($id))
		{
			$data['manage_user'] = $this->log_lib->manage_user();
			$this->load->view('template/main',array('content'=>'user/manage_user','data'=>$data['manage_user']));
		}else
		{
			return  FALSE;
		}
	}
	
	function user_activate($id)
	{
		
		if($this->log_lib->activate_user($id))
		{
			$data['manage_user'] = $this->log_lib->manage_user();
			$this->load->view('template/main',array('content'=>'user/manage_user','data'=>$data['manage_user']));
		}else
		{
			return  FALSE;
		}
	}
	

	function user_edit($id)
	{
		
		if($this->log_lib->edit_user($id))
		{
			$data = $this->log_lib->edit_user($id);
			$this->load->view('template/main',array('content'=>'user/edit_user','data'=>$data));
		}else
		{
			return  FALSE;
		}
	}
	
	function user_update($id)
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('fname','First Name','trim|xss_clean|required');
		$this->form_validation->set_rules('lname','Last Name','trim|xss_clean|required');
		if($this->form_validation->run() == FALSE)
		{
		$this->load->view('template/main',array('content'=>'user/edit_user','data'=>NULL));
		}else 
		{
			$fname = $this->input->post('fname');
			$lname = $this->input->post('lname');
			if(isset($_POST['update']))
			{
				if($this->log_lib->update_user($id,$fname,$lname))
				{
					$data['manage_user'] = $this->log_lib->manage_user();
					$this->load->view('template/main',array('content'=>'user/manage_user','data'=>$data['manage_user']));
					return TRUE;
				}else 
				{
					return FALSE;
				}
			}
		
		}
	}
}