<?php

class Payment_model extends CI_Model {
	
	// --------------------------------------------------------------------
	
	/**
	 * Constructor. Instantiate CI to load database class.
	 * 
	 */
	function __construct()
	{
		parent::__construct();
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Get the info of the specified payment
	 * 
	 */
	function get_info($payment_id) {
		$this->db->select('*, lend_payments.id as payment_id');
		$this->db->from('lend_payments');
		$this->db->join('lend_borrower', 'lend_payments.borrower_id = lend_borrower.id');
		$this->db->where(array('lend_payments.id' => $payment_id));
		$info = $this->db->get();

		if ($info->num_rows() > 0) {
			return $info->row();
		} else {
			return FALSE;
		}
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Get the info of the specified payment
	 * 
	 */
	function paid($payment_id) {
		//get first the infos
		$info = $this->get_info($payment_id);
		
		//update payment status to PAID
		$this->db->update('lend_payments', array('status' => 'PAID'), array('id' => $payment_id));
		
		//if it was the last payment, CLOSED the loan
		$this->db->update('lend_borrower_loans', array('status' => 'CLOSED'), array('id' => $info->borrower_loan_id));
		
		//insert transaction
		$this->db->insert('lend_transactions', array('borrower_id' => $info->borrower_id, 'payment' => $info->amount, 'admin_id' => $this->session->userdata('lend_user_id'), 'payment_id' => $info->payment_id));
	}
	
}