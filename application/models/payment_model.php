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
	 * process payment
	 * 
	 */
	function paid($payment_id) {
		//get first the infos
		$info = $this->get_info($payment_id);
		
		//update payment status to PAID
		$uStatus = $this->db->update('lend_payments', array('status' => 'PAID'), array('id' => $payment_id));
		
		//if it was the last payment, CLOSED the loan
		$this->db->select('MAX(id) as last_payment');
		$payment = $this->db->get_where('lend_payments', array('borrower_loan_id' => $info->borrower_loan_id));
		$result = $payment->row();
		
		if($result->last_payment == $payment_id) {
			$this->db->update('lend_borrower_loans', array('status' => 'CLOSED'), array('id' => $info->borrower_loan_id));
		}
		
		//insert transaction
		$uTransact = $this->db->insert('lend_transactions', array('borrower_id' => $info->borrower_id, 'payment' => $info->amount, 'admin_id' => $this->session->userdata('lend_user_id'), 'payment_id' => $info->payment_id));
		
		//if all were successfull, return TRUE 
		if ($uStatus AND $uTransact) {
			return TRUE;
		}
		
		//if something went wrong return FALSE
		return FALSE;
	}

	// --------------------------------------------------------------------
	
	/**
	 * Get incoming payments
	 * 
	 */
	function get_incoming_payments()
	{
		$this->db->select('*');
		$this->db->from('lend_payments');
		$this->db->join('lend_borrower', 'lend_payments.borrower_id = lend_borrower.id');
		$this->db->where(array('lend_payments.status' => 'UNPAID'));
		$this->db->order_by('lend_payments.payment_sched');
		$info = $this->db->get();

		if ($info->num_rows() > 0) {
			return $info;
		} else {
			return FALSE;
		}
	}

	// --------------------------------------------------------------------
	
	/**
	 * Get received payments
	 * 
	 */
	function get_received_payments()
	{
		$this->db->select('*, lend_transactions.rdate as process_date ');
		$this->db->from('lend_transactions');
		$this->db->join('lend_borrower', 'lend_transactions.borrower_id = lend_borrower.id');
		$this->db->join('lend_admin', 'lend_transactions.admin_id = lend_admin.id');
		$this->db->join('lend_payments', 'lend_transactions.payment_id = lend_payments.id');
		$this->db->order_by('lend_transactions.rdate', 'DESC');
		$info = $this->db->get();

		if ($info->num_rows() > 0) {
			return $info;
		} else {
			return FALSE;
		}
	}

	// --------------------------------------------------------------------
	
	/**
	 * Move payment date
	 * 
	 */
	function move_payment($payment_id, $movein_date)
	{
		//update payment date
		$uDate = $this->db->update('lend_payments', array('payment_sched' => $movein_date), array('id' => $payment_id));
		
		//if all were successfull, return TRUE 
		if ($uDate) {
			return TRUE;
		}
		
		//if something went wrong return FALSE
		return FALSE;
	}
	
}