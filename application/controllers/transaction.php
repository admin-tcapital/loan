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
					'Report' => 'report/summary',
					'Loan' => 'loan/view', 
					'Borrower' => 'borrower', 'Payments' => 'stats/payments', 'Borrower' => 'borrower', 'Payments' => 'stats/payments', 'Borrower' => 'borrower', 'Payments' => 'stats/payments', 'Home' => 'stats')
			)
		);
	}
	
	function paid($payment_id, $loan_id)
	{
		$transac = $this->Payment_model->paid($payment_id);
		
		if ($transac) {
			redirect('loan/view_info/?id='.$loan_id, 'refresh');
			
		}
	}
}