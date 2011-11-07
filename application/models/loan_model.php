<?php

class Loan_model extends CI_Model {
	
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
	function chk_loan_exist($param = array()) {
		$exist = $this->db->get_where('lend_loan', $param);
		
		if ($exist->num_rows() > 0) {
			return $exist->row();
		} else {
			return FALSE;
		}
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Check for any record from lend_borrower_loans table based on given parameters
	 * @param array $param
	 * @return boolean
	 */
	function chk_borrower_loan_exist($param = array()) {
		$exist = $this->db->get_where('lend_borrower_loans', $param);
		
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
		
		$insert = $this->db->insert('lend_loan', $param);
		
		if ($insert) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	// --------------------------------------------------------------------
	
	function edit($param = array(), $id) {
		$update = $this->db->update('lend_loan', $param, array('id' => $id));
		
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
		$table = $table . '<tr><td>Interest per Month:</td><td> &#8369;'.$amount_interest*$divisor.'</td></tr>';
		$table = $table . '<tr><td>Interest per Term:</td><td> &#8369;'.$amount_interest.'</td></tr>';
		$table = $table . '<tr><td>Amount Per Term:</td><td> &#8369;'.$amount_term.'</td></tr>';
		$table = $table . '<tr><td>Total Payment:</td><td> &#8369;'.number_format($amount_total, 2, '.', ',').'</td></tr>';
		$table = $table . '</table>';
		$table = $table . '<table border="1" cellpadding="5" cellspacing="0">';
		$table = $table . '<tr><td>Payment #</td><td>Amount (&#8369;)</td><td>Payment Date</td></tr>';
		for ($i = 1; $i <= $loan->terms; $i++)
		{
			$frequency = $days * $i;
			$newdate = strtotime ( '+'.$frequency.' day' , strtotime ( $date ) ) ;
			$newdate = date ( 'm/d/Y' , $newdate );
			$table = $table . '<tr><td>'.$i.'</td><td>'.$amount_term.'</td><td>'.$newdate.'</td></tr>';
		}
		$table = $table . '</table></div>';
		
		return $table;
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * View entries in lend_loan table
	 */
	function view_all()
	{
		$this->db->order_by('lname');
		$return = $this->db->get('lend_loan');
		
		return $return;
	}
	
}