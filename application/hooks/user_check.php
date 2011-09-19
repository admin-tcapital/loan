<?php
class User_check
{
	function is_login()
	{
		$CI = &get_instance();
		if ($CI->router->class == 'user')
			return TRUE;
		
		$sess_id = $CI->session->userdata('lend_user');
		if (!$sess_id) {
			show_error('You must <a href="user/login">login</a> first to continue.', 500, $heading = 'Login First');
		}
	}
}