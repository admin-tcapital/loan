<?php

class Stats extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		
		$this->load->model('Loan_model');
	}
	
	function index()
	{
		$this->load->view('template/main', array('content'=>'stats/index', 'location' => 'Home', 'menu' => array('Logout' => 'user/logout', 'Loan' => 'loan/view', 'Home' => 'stats')));
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * View all future payments
	 * 
	 */
	function payments()
	{
		$this->load->view(
			'template/main', 
			array(
				'content'=>'stats/payment', 
				'location' => 'Home', 
				'menu' => array(
					'Logout' => 'user/logout', 
					'Loan' => 'loan/view', 
					'Home' => 'stats'
					)
				)
			);
	}
}

