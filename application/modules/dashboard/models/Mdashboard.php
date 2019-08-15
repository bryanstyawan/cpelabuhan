<?php

class Mdashboard extends CI_Model 
{
	public function __construct () 
	{
		parent::__construct();
	
	}

	public function get_last_activity_jetty($id_jetty)
	{
		# code...
		$sql = "SELECT 	a.id,
						b.name as name_jetty,
						c.name as name_vessel,
						IFNULL(d.name,'none') as last_activity,
						a.date
				FROM tr_vessel_jetty a
				LEFT JOIN mr_jetty b ON a.id_jetty = b.id
				LEFT JOIN mr_vessel c ON a.id_vessel = c.id
				LEFT JOIN mr_activity d ON a.last_activity = d.id
				WHERE a.id_jetty = '".$id_jetty."'
				ORDER BY a.audit_time_insert DESC
				LIMIT 1";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return 0;
		}								
	}		


	public function get_chat_user($param,$id=NULL,$id2=NULL)
	{
		# code...
		$sql = "";
		if ($param == 'all') {
			# code...
			$sql = "";
		}
		else {
			# code...
			$and = "";
			$and2 = "";			
			if ($id != NULL)$and = "AND a.id_user_sender = ".$id."";
			if ($id2 != NULL)$and2 = "AND a.id_materi = ".$id2."";			
			$sql = "WHERE a.status_read = 0 AND a.id_admin_sender = 0 ".$and." ".$and2."";
		}

		$sql = "SELECT DISTINCT b.name,
								COUNT(a.id_user_sender) as counter,
								a.id_user_sender,
								a.id_materi
				FROM tr_chat a
				LEFT JOIN mr_user b
				ON a.id_user_sender = b.id
--				LEFT JOIN mr_video c
--				ON a.id_materi = c.id_materi
--				LEFT JOIN mr_materi d
--				ON c.id_materi = d.id				
				".$sql."
				GROUP BY a.id_materi, a.id_user_sender, b.name
		";
		// print_r($sql);die();		
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return 0;
		}								
	}

	public function get_data_notify_user($param,$id_pegawai)
	{
		# code...
		$sql = "SELECT a.*
				FROM log_notifikasi a
				WHERE a.receiver = '".$id_pegawai."'
				AND a.status_log = '".$param."'";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->result();
		}
		else
		{
			return 0;
		}								
	}
}