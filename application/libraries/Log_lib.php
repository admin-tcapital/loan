<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Log_lib{
	
	public $CI;
	
	public function __construct(){
		$this->CI =& get_instance();
		
	} 

    public function log_user($username,$password)
    {
    	
    	$key = "utang_mo_bayaran_mo";
		$password = md5($password.$key);
    	$query_str = "SELECT * FROM lend_admin WHERE username='$username' and password='$password'";
    	$result = $this->CI->db->query($query_str,array($username,$password));
    	if($result->num_rows()>0){
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
    
    public function register_user($username,$password)
    {
    	
    		$key = "utang_mo_bayaran_mo";
			$password = md5($password.$key);
			$query_str =  "INSERT INTO  lend_admin (username,password,rdate) Values (?,?,NOW())";
			if($this->CI->db->query($query_str,array($username,$password))){
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
}
?>