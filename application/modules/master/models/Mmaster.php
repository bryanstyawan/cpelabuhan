<?php
class Mmaster extends CI_Model {

	public function __construct () {
		parent::__construct();
	}

	public function get_tank_number($id=NULL)
	{
		# code...
		$sql_helper = "";
		if ($id != NULL) {
			# code...
			$sql_helper = "WHERE a.id = '".$id."'";
		}
		$sql = "SELECT a.*,
						b.name as name_product
				FROM mr_tank_number a
				LEFT JOIN mr_product b ON a.id_product = b.id
				".$sql_helper."
				ORDER BY a.audit_time_insert DESC
				";
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

	public function get_pipeline($id=NULL)
	{
		# code...
		$sql_helper = "";
		if ($id != NULL) {
			# code...
			$sql_helper = "WHERE a.id = '".$id."'";
		}
		$sql = "SELECT a.*,
						b.name as name_tank_number,
						c.name as name_product
				FROM mr_pipeline a
				LEFT JOIN mr_tank_number b ON a.id_tank_number = b.id
				LEFT JOIN mr_product c ON b.id_product = c.id
				".$sql_helper."
				ORDER BY a.audit_time_insert DESC";
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

	public function get_pump_number()
	{
		# code...
		$sql = "SELECT a.*,
						b.name as name_pipeline,
						c.name as name_tank_number,
						d.name as name_product
				FROM mr_pump_number a
				LEFT JOIN mr_pipeline b ON a.id_pipeline = b.id
				LEFT JOIN mr_tank_number c ON b.id_tank_number = c.id
				LEFT JOIN mr_product d ON d.id = c.id_product";
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
