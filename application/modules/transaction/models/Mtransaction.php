<?php
class Mtransaction extends CI_Model {

	public function __construct () {
		parent::__construct();
	}

	public function get_vessel_jetty($id=NULL)
	{
		# code...
		$sql_helper = "";
		if ($id!=NULL) {
			# code...
			$sql_helper = "WHERE a.id = '".$id."'";
		}
		$sql = "SELECT 	a.id,
						b.name as name_jetty,
						c.name as name_vessel,
						IFNULL(d.name,'none') as last_activity,
						a.date
				FROM tr_vessel_jetty a
				LEFT JOIN mr_jetty b ON a.id_jetty = b.id
				LEFT JOIN mr_vessel c ON a.id_vessel = c.id
				LEFT JOIN mr_activity d ON a.last_activity = d.id				
				".$sql_helper."";
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

	public function get_vessel_activity($id=NULL,$id_secondary=NULL,$order=NULL)
	{
		# code...
		$sql_helper = "";
		if ($id_secondary!=NULL) {
			# code...
			$sql_helper = "AND a.id = ".$id_secondary."";
		}
		$sql = "SELECT 	a.id,
						b.name as name_activity,
						c.name as name_product,
						a.nominasi,
						d.name as name_pipeline,
						d1.name as name_tank_number,
						d2.name as name_pump_number,
						a.destination,
						a.rate,
						e1.username as name_audit_insert,
						a.audit_time_insert,
						e2.username as name_audit_update,
						a.audit_time_update,
						a.id_activity,
						a.id_vessel_jetty
				FROM tr_vessel_activity a
				LEFT JOIN mr_activity b ON a.id_activity = b.id
				LEFT JOIN mr_product c ON a.id_product = c.id
				LEFT JOIN mr_pipeline d ON a.id_pipeline = d.id								
				LEFT JOIN mr_tank_number d1 ON d.id_tank_number = d1.id
				LEFT JOIN mr_pump_number d2 ON d.id_pump_number = d2.id
				LEFT JOIN mr_user e1 ON a.audit_user_insert = e1.id
				LEFT JOIN mr_user e2 ON a.audit_user_update = e2.id																
				WHERE a.id_vessel_jetty = '".$id."'
				".$sql_helper."
				ORDER BY a.audit_time_insert ".$order."";
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
