<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logger {

	var $CI;
	var $user_id;

	public function __construct()
	{
		$this->CI =& get_instance();
		//get user_id through session
		$this->user_id = $this->CI->session->userdata('lend_user_id');
	}

	public function save($affected = '', $id = 0, $type = '')
	{
		if ($affected != '') {
			switch ($affected) {
				case 'payment': 
					$table = 'lend_payments';
					break;
				case 'loan':
					$table = 'lend_borrower_loans';
					break;
				default:
			}
		} else {
			return FALSE;
		}
		
		//get info
		$query = $this->CI->db->get_where($table, array('id' => $id), 1);
		
		//No result? exit
		if ($query->num_rows() == 0) {
			return FALSE;
		}
		
		//If there's an info, get it.
		$row = $query->row();
		
		//generate description
		switch ($type) {
			case 'payment':
				$description = "Payment #({$row->id}), Amount({$row->amount})";
				break;
			case 'move':
				$description = "Payment #({$row->id}), Original Date({$row->payment_sched_prev}), Move-in Date({$row->payment_sched})";
				break;
			default:
				$description = '';
				break;
		}
		
		//Insert log
		$insert = $this->CI->db->insert('lend_logs', array('loan_id' => $row->borrower_loan_id, 'payment_id' => $row->id, 'admin_id' => $this->user_id, 'type' => $type, 'ip_address' => $this->CI->input->ip_address(), 'description' => $description));
	}
}