<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Log_lib{
	
	public $CI;
	
	public function __construct(){
		$this->CI =& get_instance();
		
	} 

    public function log_user($username,$password)
    {
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
}
?>