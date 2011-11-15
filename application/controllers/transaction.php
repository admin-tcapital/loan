<?php

class Transaction extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->model('Borrower_model');
		
		$this->load->model('Loan_model');
		
		$this->load->model('Payment_model');
	}
	
	function payment()
	{
		$this->load->view(
			'template/main', 
			array(
				'content'=>'transaction/payment', 
				'location' => 'Transaction / Payment', 
				'menu' => array(
					'Logout' => 'user/logout', 
					'Loan' => 'loan/view', 
					'Home' => 'stats')
			)
		);
	}
	
	function paid($payment_id)
	{
		$transac = $this->Payment_model->paid($payment_id);
	}
}