<?php

class Borrower_model extends CI_Model {
	
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
	 * Check for any record from lend_loan table based on given parameters
	 * @param array $param
	 * @return boolean
	 */
	function chk_borrower_exist($param = array()) {
		$exist = $this->db->get_where('lend_borrower', $param);
		
		if ($exist->num_rows() > 0) {
			return $exist->row();
		} else {
			return FALSE;
		}
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Add entry in lend_loan table
	 * @param array $param
	 */
	function add($param = array()) {
		$this->db->set('rdate', 'NOW()', FALSE);
		
		$insert = $this->db->insert('lend_borrower', $param);
		
		if ($insert) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	// --------------------------------------------------------------------
	
	function edit($param = array(), $id) {
		$update = $this->db->update('lend_borrower', $param, array('id' => $id));
		
		if ($update) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	// --------------------------------------------------------------------
	
	function calculate($amount, $loan_id, $loan_date)
	{
		//get loan parameters
		$loan = $this->chk_loan_exist(array('id' => $loan_id));
		
		//interest
		$amount_interest = $amount * ($loan->interest/100);
		
		//total payments applying interest
		$amount_total = $amount + $amount_interest * $loan->terms;
		
		//payment per term
		$amount_term = number_format(round($amount / $loan->terms, 2) + $amount_interest, 2, '.', ',');
		
		$date = $loan_date;
		
		//Loan info
		$table = '<div id="calculator"><h3>Loan Info</h3>';
		$table = $table . '<table>';
		$table = $table . '<tr><td>Loan Name:</td><td>'.$loan->lname.'</td></tr>';
		$table = $table . '<tr><td>Interest:</td><td>'.$loan->interest.'%</td></tr>';
		$table = $table . '<tr><td>Terms:</td><td>'.$loan->terms.'</td></tr>';
		$table = $table . '<tr><td>Frequency:</td><td>Every '.$loan->frequency.' days</td></tr>';
		$table = $table . '</table>';
		$table = $table . '<h3>Computation</h3>';
		$table = $table . '<table>';
		$table = $table . '<tr><td>Loan Amount:</td><td> &#8369;'.number_format($amount, 2, '.', ',').'</td></tr>';
		$table = $table . '<tr><td>Interest:</td><td> &#8369;'.$amount_interest.'</td></tr>';
		$table = $table . '<tr><td>Amount Per Term:</td><td> &#8369;'.$amount_term.'</td></tr>';
		$table = $table . '<tr><td>Total Payment:</td><td> &#8369;'.number_format($amount_total, 2, '.', ',').'</td></tr>';
		$table = $table . '</table>';
		$table = $table . '<table border="1" cellpadding="5" cellspacing="0">';
		$table = $table . '<tr><td>Payment #</td><td>Amount (&#8369;)</td><td>Payment Date</td></tr>';
		for ($i = 1; $i <= $loan->terms; $i++)
		{
			$frequency = $loan->frequency * $i;
			$newdate = strtotime ( '+'.$frequency.' day' , strtotime ( $date ) ) ;
			$newdate = date ( 'm/d/Y' , $newdate );
			$table = $table . '<tr><td>'.$i.'</td><td>'.$amount_term.'</td><td>'.$newdate.'</td></tr>';
		}
		$table = $table . '</table></div>';
		
		return $table;
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * View entries in lend_borrower table
	 */
	function view_all()
	{
		$this->db->order_by('lname, fname');
		$return = $this->db->get('lend_borrower');
		
		return $return;
	}
	
	// --------------------------------------------------------------------
	
	function get_borrower_loan($borrower_id)
	{
		$this->db->order_by('id');
		$result = $this->db->get_where('lend_borrower_loans', array('borrower_id' => $borrower_id));
		
		if ($result->num_rows() > 0)
		{
			return $result;
		} else {
			return FALSE;		
		}
	}
	
	// --------------------------------------------------------------------
	
	function add_loan($param = array())
	{
		//set Time Zone
		date_default_timezone_set('Asia/Manila');
		
		$amount = $param['loan_amount'];
		$loan_date = $param['loan_date'];
		
		//get loan parameters
		$loan = $this->Loan_model->chk_loan_exist(array('id' => $param['loan_id']));
		
		//divisor
		switch ($loan->frequency) {
			case 'Monthly':
				$divisor = 1;
				$days = 30;
				break;
			case '2 Weeks':
				$divisor = 2;
				$days = 15;
				break;
			case 'Weekly':
				$divisor = 4;
				$days = 7;
				break;
		}
		
		//interest
		$amount_interest = $amount * ($loan->interest/100)/$divisor;
		
		//total payments applying interest
		$amount_total = $amount + $amount_interest * $loan->terms;
		
		//payment per term
		$amount_term = number_format(round($amount / $loan->terms, 2) + $amount_interest, 2, '.', '');
		
		$date = $loan_date;
		
		//additional info to be insert
		$add_info = array(
						'loan_amount_interest' => $amount_interest,
						'loan_amount_term' => $amount_term,
						'loan_amount_total' => $amount_total
					);
					
		$param = array_merge($param, $add_info);
		
		$insert = $this->db->insert('lend_borrower_loans', $param);
		
		//borrower_loan_id
		$id = $this->db->insert_id();
		
		//copy loan parameters to lend_borrower_loan_settings table
		$this->db->insert(
			'lend_borrower_loan_settings', array(
				'loan_id' => $loan->id,
				'borrower_loan_id' => $id,
				'lname' => $loan->lname,
				'interest' => $loan->interest,
				'terms' => $loan->terms,
				'frequency' => $loan->frequency,
				'late_fee' => $loan->late_fee
			)
		);
		
		//insert each payment records to lend_payments
		for ($i = 1; $i <= $loan->terms; $i++)
		{
			$frequency = $days * $i;
			$newdate = strtotime ( '+'.$frequency.' day' , strtotime ( $date ) ) ;
			$newdate = date ( 'Y-m-d' , $newdate );
			
			$this->db->insert(
				'lend_payments', array(
					'borrower_id' => $param['borrower_id'],
					'borrower_loan_id' => $id,
					'payment_sched' => $newdate,
					'payment_number' => $i,
					'amount' => $amount_term
				)
			);
			//$table = $table . '<tr><td>'.$i.'</td><td>'.$amount_term.'</td><td>'.$newdate.'</td></tr>';
		}
		
		//get next payment id and insert to lend_borrower_loans.next_payment_id
		$payment = $this->Loan_model->next_payment($id);
		$this->db->update('lend_borrower_loans', array('next_payment_id' => $payment->id), array('id' => $id));
		
		if ($insert) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
}