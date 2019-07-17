<?php
class Globalrules extends CI_Model
{

	public function __construct () {
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}

/*
write by Bryan Setyawan
last edited : 27/06/2016
*/
	public function session_rule()
	{
		if($this->session->userdata('_session_login') == "")
		{
			//get user data
			redirect('auth');
		}
	}

	public function trigger_insert_update($arg)
	{
		# code...
		$data = array();
		if ($arg == 'insert') {
			# code...
			return array('audit_time_insert' => date('Y-m-d H:i:s'), 'audit_user_insert' => $this->session->userdata('_session_user'));
		}
		elseif ($arg == 'update') {
			# code...
			return array('audit_time_update' => date('Y-m-d H:i:s'), 'audit_user_update' => $this->session->userdata('_session_user'));			
		}
	}

	/**
	* Returns an encrypted & utf8-encoded
	*/
	public function encrypt($pure_string, $encryption_key) {
		$iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
		$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
		$encrypted_string = mcrypt_encrypt(MCRYPT_BLOWFISH, $encryption_key, utf8_encode($pure_string), MCRYPT_MODE_ECB, $iv);
		return $encrypted_string;
	}

	/**
	* Returns decrypted original string
	*/
	public function decrypt($encrypted_string, $encryption_key) {
		$iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
		$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
		$decrypted_string = mcrypt_decrypt(MCRYPT_BLOWFISH, $encryption_key, $encrypted_string, MCRYPT_MODE_ECB, $iv);
		return $decrypted_string;
	}	



	public function push_notifikasi($data_sender,$flag)
	{
		# code...
		$res_data = '';
		if ($flag == 'read_data')
		{
			# code...
			$data_change = array('status_read' => '1');
			$flag        = array(
									'id_table'   => $data_sender['id_table'],
									'table_name' => $data_sender['table_name']
								);
			$res_data    = $this->Allcrud->editData('log_notifikasi',$data_change,$flag);
		}
		elseif ($flag == 'delete_data') {
			# code...
			$flag        = array(
									'id_table'   => $data_sender['id_table'],
									'table_name' => $data_sender['table_name']
								);
			$res_data = $this->Allcrud->delData('log_notifikasi',$flag);
		}
		elseif ($flag == 'approval') {
			# code...
			$res_data = 0;
		}
		elseif ($flag == 'notify') {
			# code...
			$data_sender['status_log']  = 'notify';
			$data_sender['status_read'] = 0;
			$data_sender['audit_time']  = date('Y-m-d H:i:s');
			$res_data                   = $this->Allcrud->addData('log_notifikasi',$data_sender);
		}
		return $res_data;
	}

	public function check_data_notify($url=NULL,$table_name=NULL,$id_table=NULL)
	{
		# code...
		$sql = "SELECT a.*
				FROM log_notifikasi a
				WHERE a.url = '".$url."'
				AND a.table_name = '".$table_name."'
				AND a.id_table = '".$id_table."'
				AND a.status_read = 0";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function get_info_user($id=NULL,$param=NULL)
	{
		# code...
		$sql = "";
		if ($param == NULL) {
			# code...
			if ($id==NULL) {
				# code...
				$sql = "a.id = '".$this->session->userdata('_session_user')."'";
			}
		}

		$sql = "SELECT  a.*
				FROM mr_user a
				WHERE ".$sql."";
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

	public function get_log_notify_id($id)
	{
		# code...
		$sql = "SELECT a.*
				FROM log_notifikasi a
				WHERE a.id = '".$id."'";
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

	public function check_status_res($res_data,$text_status=NULL)
	{
		# code...
		if ($res_data == 1) {
			# code...
			$text_status = $text_status;
		}
		elseif ($res_data == 2) {
		// code...
			$text_status = $text_status;
		}
		else
		{
			$text_status = "Telah terjadi kesalahan sistem";
		}

		return $text_status;
	}

	public function data_alphabet($param)
	{
		$data = "";
		switch ($param) {
			case '0':
				# code...
				$data = 'A';
				break;
			case '1':
				# code...
				$data = 'B';
				break;
			case '2':
				# code...
				$data = 'C';
				break;
			case '3':
				# code...
				$data = 'D';
				break;
			case '4':
				# code...
				$data = 'E';
				break;
			case '5':
				# code...
				$data = 'F';
				break;
			case '6':
				# code...
				$data = 'G';
				break;
			case '7':
				# code...
				$data = 'H';
				break;
			case '8':
				# code...
				$data = 'I';
				break;
			case '9':
				# code...
				$data = 'J';
				break;
			case '10':
				# code...
				$data = 'K';
				break;
			case '11':
				# code...
				$data = 'L';
				break;
			case '12':
				# code...
				$data = 'M';
				break;
			case '13':
				# code...
				$data = 'N';
				break;
			case '14':
				# code...
				$data = 'O';
				break;
			case '15':
				# code...
				$data = 'P';
				break;
			case '16':
				# code...
				$data = 'Q';
				break;
			case '17':
				# code...
				$data = 'R';
				break;
			case '18':
				# code...
				$data = 'S';
				break;
			case '19':
				# code...
				$data = 'T';
				break;
			case '20':
				# code...
				$data = 'U';
				break;
			case '21':
				# code...
				$data = 'V';
				break;
			case '22':
				# code...
				$data = 'W';
				break;
			case '23':
				# code...
				$data = 'X';
				break;
			case '24':
				# code...
				$data = 'Y';
				break;
			case '25':
				# code...
				$data = 'Z';
				break;
		}
		return $data;
	}

	public function nilai_tugas_tambahan($param)
	{
		# code...
		$value = "";
		if ($param <= 3) {
			# code...
			$value = 1;
		}
		elseif ($param <= 6) {
			# code...
			$value = 2;
		}
		elseif ($param > 6) {
			# code...
			$value = 3;
		}

		return $value;
	}

/*
write by Bryan Setyawan
last edited : 25/06/2016
*/
	public function data_bulan()
	{
		$data_bulan = array
					(
						1  => array('nama' => "Januari"),
						2  => array('nama' => "Februari"),
						3  => array('nama' => "Maret"),
						4  => array('nama' => "April"),
						5  => array('nama' => "Mei"),
						6  => array('nama' => "Juni"),
						7  => array('nama' => "Juli"),
						8  => array('nama' => "Agustus"),
						9  => array('nama' => "Sebtember"),
						10 => array('nama' => "Oktober"),
						11 => array('nama' => "November"),
						12 => array('nama' => "Desember")
					);

		return $data_bulan;
	}

/*
write by Bryan Setyawan
last edited : 25/06/2016
*/
	public function set_bulan($bulan)
	{
		$data_bulan = $this->data_bulan();
		$nama_bulan = "";

		for ($i=1; $i <= count($data_bulan); $i++) {
			# code...

			if ($bulan == $i) {
				# code...
				$nama_bulan = $data_bulan[$i]['nama'];
			}

		}

		return $nama_bulan;
	}

/*
write by Bryan Setyawan
last edited : 21/11/2016
*/
	public function load_template($content,$data_entities)
	{
		$loadv                = $this->load;
		$maintemplate         = "";
		$template_main        = "home/home_template";
		if ($data_entities['menu_param'] == "off") {
			# code...
			$maintemplate['menu']         = "";
			$maintemplate['menu_trigger'] = 'style="margin-left: 0px;"';
		}
		else if ($data_entities['menu_param'] == "1")
		{
			$uri_segment_1                = $this->uri->segments[1];
			$uri_segment_2                = $this->uri->segments[2];
			$menu 						  = "/".$uri_segment_1."/".$uri_segment_2."/";
			$menutemplate['title']        = $this->get_data_menu_title($data_entities['menu_param']);
			$menutemplate['data_segment'] = $menu;
			$menutemplate['data']         = $this->get_data_menu($data_entities['menu_param']);
			$maintemplate['menu']         = $loadv->view("home/menu_1",$menutemplate, true);
			$maintemplate['menu_trigger'] = "";
		}
		$maintemplate['title']   = $data_entities['title'];
		$maintemplate['subtitle']   = $data_entities['subtitle'];
		$maintemplate['header']  = $loadv->view("home/header", NULL, true);
		$maintemplate['content'] = $content;
		$loadv->view($template_main, $maintemplate);
	}

/*
write by Bryan Setyawan
last edited : 15/11/2016
*/
	public function get_data_menu($id=NULL)
	{
		# code...
		$sql = "SELECT a.*
		FROM mn_menu a
		WHERE a.id_parent = '$id'";
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

/*
write by Bryan Setyawan
last edited : 15/11/2016
*/
	public function get_data_menu_title($id=NULL)
	{
		# code...
		$sql = "SELECT a.*
		FROM mn_main_menu a
		WHERE a.id = '$id'";
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



/*
Last Edited : 28/07/2016
By: Bryan Setyawan
*/
	public function set_captcha($value=NULL,$flag=NULL)
	{
		$cookies = get_cookie('oid');
		if ($cookies == "" || $flag == 0)
		{
			$res             = $value;
			$this->input->set_cookie("oid", $res, 10800);

		}
	}

/*
Last Edited : 28/07/2016
By: Bryan Setyawan
*/
	public function notif_message()
	{
		$count_inbox = 0;
		$count_send  = 0;
		// $id_penerima = $this->session->userdata('sesUser');
		// $sql_inbox = "SELECT DISTINCT count(a.id_pesan) as `row`
		// 		    FROM pesan a
		// 		    WHERE a.id_penerima = '$id_penerima'
		// 		    AND a.flag_read <> 1
		// 		    AND a.flag_delete_inbox <> 1";

		// $sql_send = "SELECT DISTINCT count(a.id_pesan) as `row`
		// 		    FROM pesan a
		// 		    WHERE a.id_pengirim = '$id_penerima'
		// 		    AND a.audit_pengguna = '$id_penerima'
		// 		    AND a.flag_delete_sent <> 1";			    

		// $query_inbox = $this->db->query($sql_inbox);
		// $query_send  = $this->db->query($sql_send);		

		// if($query_inbox->num_rows() > 0)
		// {
		// 	$count_inbox = $query_inbox->result();
		// 	$count_inbox = $count_inbox[0]->row;
		// }
		// else
		// {
		// 	$count_inbox = 0;
		// }					

		// if($query_send->num_rows() > 0)
		// {
		// 	$count_send = $query_send->result();
		// 	$count_send = $count_send[0]->row;
		// }
		// else
		// {
		// 	$count_send = 0;
		// }							

		// $this->input->set_cookie("row_send", $count_send, 3600);							
		// $this->input->set_cookie("row_inbox", $count_inbox, 3600);							
		return $count_inbox;			
	}		

/*
Last Edited : 12/07/2016
By: Bryan Setyawan
*/
	public function randomCode($length)
	{
	    $retVal = "";
	    while(strlen($retVal) < $length)
	    {
	        $nextChar = mt_rand(0, 61); // 10 digits + 26 uppercase + 26 lowercase = 62 chars
	        if(($nextChar >=10) && ($nextChar < 36)){ // uppercase letters
	            $nextChar -= 10; // bases the number at 0 instead of 10
	            $nextChar = chr($nextChar + 65); // ord('A') == 65
	        } else if($nextChar >= 36){ // lowercase letters
	            $nextChar -= 36; // bases the number at 0 instead of 36
	            $nextChar = chr($nextChar + 97); // ord('a') == 97
	        } else { // 0-9
	            $nextChar = chr($nextChar + 48); // ord('0') == 48
	        }
	        $retVal .= $nextChar;
	    }
	    return $retVal;
	}

/*
Last Edited : 12/07/2016
By: Bryan Setyawan
*/
	public function set_captcha_number($flag=NULL)
	{
		$cookies = get_cookie('oid');
		$res = "";
		if ($cookies == "" || $flag == 0)
		{
			$res             = $this->randomCode(6);
			$this->input->set_cookie("oid", $res, 10800);
		}
		return $res;
	}

	public function counter_datatable($arg,$table_destiny,$key_from,$key_to,$param_return,$param=NULL)
	{
		# code...
		$store = array();
		if ($param == NULL) {
			# code...
			if($arg->result_array() != array())
			{
				$store = $arg->result_array();
				for ($i=0; $i < count($arg->result_array()); $i++) { 
					# code...
					$get_data_es = $this->Allcrud->getData($table_destiny,array($key_to => $arg->result_array()[$i][$key_from]));
					if($get_data_es->result_array() != array())
					{					
						$store[$i][$param_return] = count($get_data_es->result_array());
					}
					else {	
						# code...
						$store[$i][$param_return] = 0;
					}
				}
			}			
		}
		
		return $store;
	}
}
