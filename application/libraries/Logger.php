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
				$description = "Payment #({$row->payment_number}), Amount({$row->amount})";
				break;
			case 'move':
				$description = "Payment #({$row->payment_number}), Original Date({$row->payment_sched_prev}), Move-in Date({$row->payment_sched})";
				break;
			default:
				$description = '';
				break;
		}
		
		//Insert log
		$insert = $this->CI->db->insert('lend_logs', array('loan_id' => $row->borrower_loan_id, 'payment_id' => $row->id, 'admin_id' => $this->user_id, 'type' => $type, 'ip_address' => $this->CI->input->ip_address(), 'description' => $description));
	}


	public function show($loan_id)
	{
		$i = 0;
		$table = "
		<table class='logger' cellspacing='1'>
    		<thead>
    			<tr>
    				<th>#</th>
    				<th>Trans Date</th>
    				<th>User</th>
    				<th>Type</th>
    				<th>Description</th>
    			</tr>
    		</thead>
    		<tbody>";
		//get all logs
		$query = $this->CI->db->query("
			SELECT a.rdate as 'tdate', b.username as 'user', a.type, a.description
			FROM lend_logs a
			INNER JOIN lend_admin b
			  ON a.admin_id = b.id
			WHERE a.loan_id = {$loan_id}
		");
		
		foreach ($query->result() as $row) {
			$i++;
			$table .= "
				<tr>
					<td>{$i}</td>
					<td>{$row->tdate}</td>
					<td>{$row->user}</td>
					<td>{$row->type}</td>
					<td>{$row->description}</td>
				</tr>
			";		
		}
		$table .= "
    		</tbody>
    	</table>
    	<!-- pager -->
		<div class='logger_pager'>
		    <img src='".base_url()."css/tablesorter/first.png' class='first'/>
		    <img src='".base_url()."css/tablesorter/prev.png' class='prev'/>
		    <span class='pagedisplay'></span> <!-- this can be any element, including an input -->
		    <img src='".base_url()."css/tablesorter/next.png' class='next'/>
		    <img src='".base_url()."css/tablesorter/last.png' class='last'/>
		    <select class='pagesize'>
		        <option value='20'>20</option>
		        <option value='30'>30</option>
		        <option value='40'>40</option>
		    </select>
		</div>
		";
		
		$javascript = "
			<script type='text/javascript'>
				$('.logger').tablesorter()
				.tablesorterPager({
			    container: $('.logger_pager'),
			    updateArrows: true,
			    page: 0,
			    size: 20,
			    fixedHeight: false,
			    removeRows: false,
			    cssNext: '.next',
			    cssPrev: '.prev',
			    cssFirst: '.first',
			    cssLast: '.last',
			    cssPageDisplay: '.pagedisplay',
			    cssPageSize: '.pagesize',
			    cssDisabled: 'disabled'
			});
			</script>
		";
		return $table.$javascript;
	}
}