<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Log_lib{

	public $CI;

	public function __construct(){
		$this->CI =& get_instance();
	}

	public function log_user($username,$password)
	{
		$password = md5($password.config_item('encryption_key'));

		$result = $this->CI->db->get_where('lend_admin', array('username' => $username, 'password' => $password,'status'=>'ACTIVE'));
		 
		if($result->num_rows() > 0){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function fetch_info($id = array())
	{
		$result = $this->CI->db->get_where('lend_admin', $id);
		 
		return array('count' => $result->num_rows(), 'data' => $result);
	}

	public function register_user($username,$password,$fname,$lname)
	{
		 
		$key = config_item('encryption_key');
		$password = md5($password.$key);
		$query_str =  "INSERT INTO  lend_admin (fname,lname,username,password,rdate) Values (?,?,?,?,NOW())";
		if($this->CI->db->query($query_str,array($fname,$lname,$username,$password))){
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	public function check_exist_username($username)
	{
		$query_str = "SELECT username from lend_admin where username = ?";
		$result = $this->CI->db->query($query_str,$username);
		if($result->num_rows() > 0)
		{
			return TRUE;
		}else
		{
			return FALSE;
		}
	}
	
	public function manage_user()
	{
		$query = "SELECT * from lend_admin";
		$result = $this->CI->db->query($query );
		if($result->num_rows() > 0)
		{
			return $result;
		}else
		{
			return FALSE;
		}
		
	}
	

	public function diactivate_user($id)
	{
		$query = "UPDATE lend_admin SET status = 'INACTIVE' WHERE id = '$id'";
		$result = $this->CI->db->query($query);
		if($result)
		{
			return $result;
		}else
		{
			return FALSE;
		}
		
	}
	

	public function activate_user($id)
	{
		$query = "UPDATE lend_admin SET status = 'ACTIVE' WHERE id = '$id'";
		$result = $this->CI->db->query($query);
		if($result)
		{
			return $result;
		}else
		{
			return FALSE;
		}
		
	}
	
	

	public function edit_user($id)
	{
		$query = "SELECT * FROM lend_admin WHERE id = '$id'";
		$result = $this->CI->db->query($query);
		if($result)
		{
			return $result;
		}else
		{
			return FALSE;
		}
		
	}
	

	public function update_user($id,$fname,$lname)
	{
		$query = "UPDATE lend_admin SET fname = '$fname',lname =  '$lname'  WHERE id = '$id'";
		$result = $this->CI->db->query($query);
		if($result)
		{
			return TRUE;
		}else
		{
			return FALSE;
		}
		
	}
	
	

	public function search_loan($search,$option,$filter=NULL)
	{
		
		if($option == 'id')
		{
			$filter.="lend_borrower.id = '$search'";
		}else 
		{
			$filter.="fname like '%$search%'";
		}
		
		$query = "select
					lend_borrower_loans.borrower_id,loan_id,status,loan_amount,loan_amount_interest,loan_amount_term,loan_amount_total,lend_borrower.id as borrower_id,company,address,
					phone_cell,email,income,civil_status,sex,age,employment_status,job_title,fname,lname,mi,lend_borrower.rdate,birth_date from lend_borrower inner join 
					lend_borrower_loans on lend_borrower.id = lend_borrower_loans.borrower_id WHERE $filter ";
		$result = $this->CI->db->query($query);
		if($result)
		{
			return $result;
		}else
		{
			return FALSE;
		}
		
	}
	

	public function view_loan($id)
	{
		$query = "select
					lend_borrower_loans.borrower_id,loan_id,status,loan_amount,loan_amount_interest,loan_amount_term,loan_amount_total,lend_borrower.id as borrower_id,company,address,
					phone_cell,email,income,civil_status,sex,age,employment_status,job_title,fname,lname,mi,lend_borrower.rdate,birth_date from lend_borrower inner join 
					lend_borrower_loans on lend_borrower.id = lend_borrower_loans.borrower_id WHERE lend_borrower.id = '$id' ";
		$result = $this->CI->db->query($query);
		if($result)
		{
			return $result;
		}else
		{
			return FALSE;
		}
		
	}
}
?>