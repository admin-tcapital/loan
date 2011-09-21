<?php

class Stats extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$this->load->view('template/main', array('content'=>'stats/index', 'location' => 'Home', 'menu' => array('Logout' => 'user/logout', 'Loan' => 'loan/view', 'Home' => 'stats')));
	}
}

