<?php
class Mreport extends CI_Model {

	public function __construct () {
		parent::__construct();
	}

	public function get_report_1($date)
	{
		# code...

		$sql = "SELECT b.name as name_product,
						c.name as name_pipeline,
						d.name as name_tank_number,
						e.name as name_pump_number,
						DATE_FORMAT(a.audit_time_insert,'%Y-%m') as date_year
				FROM tr_vessel_activity a
				LEFT JOIN mr_product b ON a.id_product = b.id
				LEFT JOIN mr_pipeline c ON a.id_pipeline = c.id
				LEFT JOIN mr_tank_number d ON c.id_tank_number = d.id
				LEFT JOIN mr_pump_number e ON c.id_pump_number = e.id
				WHERE DATE_FORMAT(a.audit_time_insert,'%Y-%m') = '".$date."'";
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

	public function get_report_2_main($date)
	{
		# code...

		$sql = "SELECT b.name as name_jetty,
						c.name as name_vessel,
						a.id as id_vessel_jetty
				FROM tr_vessel_jetty a
				LEFT JOIN mr_jetty b ON a.id_jetty = b.id
				LEFT JOIN mr_vessel c ON a.id_vessel = c.id
				WHERE DATE_FORMAT(a.audit_time_insert,'%Y-%m') = '".$date."'";
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
	
	public function get_report_2_activity($id_vessel_jetty)
	{
		# code...
		$sql = "SELECT ac.name as name_activity,
						pr.name as name_product,
						a.id as id_vessel_activity,
						c.name as name_pipeline,		
						d.name as name_tank_number,
						e.name as name_pump_number,						
						a.*
				FROM tr_vessel_activity a
				LEFT JOIN mr_activity ac ON a.id_activity = ac.id
				LEFT JOIN mr_product pr ON a.id_product = pr.id
				LEFT JOIN mr_pipeline c ON a.id_pipeline = c.id
				LEFT JOIN mr_tank_number d ON c.id_tank_number = d.id
				LEFT JOIN mr_pump_number e ON c.id_pump_number = e.id												
				WHERE a.id_vessel_jetty = '".$id_vessel_jetty."'
				ORDER BY a.id_activity ASC";
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

	public function get_report_2_activity_proses($id_activity_process)
	{
		# code...
		$sql = "SELECT a.*,
						ss.name as name_status_stop
				FROM tr_activity_process a
				LEFT JOIN mr_status_stop ss ON a.id_status_stop = ss.id				
				WHERE a.id_vessel_activity = '".$id_activity_process."'
				ORDER BY a.audit_time_insert ASC";
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
