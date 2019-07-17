<?php
class Mconfig extends CI_Model
{
	public function __construct () {
		parent::__construct();
	}

	public function get_menu($id,$arg=NULL)
	{
		// code...
		$sql1 = "";
		if ($arg!=NULL) {
			# code...
			// $sql1 = "AND a.user_role = '".$arg."'";
		}
		$sql = "SELECT DISTINCT a.*,
						COALESCE(
							(
								SELECT count(aa.id_menu) as counter
								FROM config_menu aa
								WHERE aa.id_parent = a.id_menu
							),'-'
						) as child
				FROM config_menu a
				WHERE a.id_parent = '".$id."'
				".$sql1."
				ORDER BY a.flag DESC, a.prioritas ASC";
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
