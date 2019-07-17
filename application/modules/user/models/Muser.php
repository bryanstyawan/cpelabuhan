<?php
class Muser extends CI_Model {

	public function __construct () {
		parent::__construct();
	}

	public function get_chat_video_user($param)
	{
		# code...
		$sql = "SELECT DISTINCT b.name,
								COUNT(a.id_user_sender) as counter,
								a.id_user_sender,
								c.file,
								d.name as materi
				FROM tr_chat a
				LEFT JOIN mr_user b
				ON a.id_user_sender = b.id
				LEFT JOIN mr_video c
				ON a.id_materi = c.id_materi
				LEFT JOIN mr_materi d
				ON c.id_materi = d.id								
				WHERE a.id_user_sender = '".$param."'
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

	public function get_rangking_try_out($parent,$paket)
	{
		# code...
		$sql = "SELECT DISTINCT a.*,
								b.name as b_name,
								COALESCE(b.asal_sekolah,'-') as b_asal_sekolah								
				FROM tr_analisis_rangking a
				LEFT JOIN mr_user b ON b.id = a.id_user
				WHERE a.id_parent = '".$parent."'
				AND a.id_paket = '".$paket."'
				ORDER BY a.total_value DESC
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
}
