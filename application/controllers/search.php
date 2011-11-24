<?php

class Search extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->model('Search_model');
	}
	
	function loan()
	{
		$this->load->view(
			'template/main',
			array(
				'content'=>'search/index', 
				'location' => 'Search', 
				'menu' => array(
					'Logout' => 'user/logout', 
					'Loan' => 'loan/view', 
					'Home' => 'stats')
				)
			);
	}
	
}