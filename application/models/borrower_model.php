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
			return $this->db->insert_id();
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
		$months = $param['loan_months'];
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
		$amount_total = $amount + $amount_interest * $months * $divisor;
		
		//payment per term
		$amount_term = number_format(round($amount / ($months * $divisor), 2) + $amount_interest, 2, '.', '');
		
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
				'months' => $months,
				'terms' => $months * $divisor,
				'frequency' => $loan->frequency,
				'late_fee' => $loan->late_fee
			)
		);
		
		//insert each payment records to lend_payments
		for ($i = 1; $i <= $months * $divisor; $i++)
		{
			$frequency = $days * $i;
			$newdate = strtotime ('+'.$frequency.' day', strtotime ($date)) ;
			
			//check if payment date landed on weekend
			//if Sunday, make it Monday. If Saturday, make it Friday
			if(date ('D', $newdate) == 'Sun') {
				$newdate = strtotime('+1 day', $newdate) ;
			} elseif(date('D', $newdate) == 'Sat') {
				$newdate = strtotime('-1 day', $newdate) ;
			}
			
			$newdate = date('Y-m-d', $newdate );
			
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