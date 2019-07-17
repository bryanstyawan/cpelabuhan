<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct () {
		parent::__construct();
		$this->load->model ('Mbank_data', '', TRUE);
	}
	
	public function index()
	{
		$this->Globalrules->session_rule();						
		$data['title']     = 'Data Pengguna';
		$data['content']   = 'bank_data/pengguna/index';
		$data['list']      = $this->Allcrud->listData('mr_user')->result_array();
		if ($data['list'] != array()) {
			# code...
			// for ($i=0; $i < count($data['list']); $i++) { 
			// 	# code...
			// 	$get_token = $this->Allcrud->getData('mr_user',array('id_user' => 3),array('id_role','DESC'));
			// }
		}
		$data['role_user'] = $this->Allcrud->listData('user_role');
		$this->load->view('templateAdmin',$data);
	}

	public function store($arg=NULL,$oid=NULL)
	{
		# code...
		$res_data    = 0;
		$text_status = '';
		$data_sender = array();
		if ($arg == NULL) {
			# code...
			$data_sender = $this->input->post('data_sender');
		}
		else {
			# code...
			$data_sender['crud'] = $arg;
			$data_sender['oid']  = $oid;
		}
		$data_store  = $this->Globalrules->trigger_insert_update($data_sender['crud']);
		if ($data_sender['crud'] == 'insert') {
			# code...
			$data_store['username']  = $data_sender['f_username'];
			$data_store['name']      = $data_sender['f_name'];
			$data_store['id_role']   = $data_sender['f_role'];
			$data_store['password']  = md5($data_sender['f_password']);
			$data_store['status']    = 1;
			            $res_data    = $this->Allcrud->addData('mr_user',$data_store);
			            $text_status = $this->Globalrules->check_status_res($res_data,'Data Pengguna telah berhasil ditambahkan.');
		} elseif ($data_sender['crud'] == 'update') {
			# code...
			if ($data_sender['f_password'] != '' || $data_sender['f_password'] != NULL) {
				# code...
				$data_store['password']  = md5($data_sender['f_password']);				
			}			
			$data_store['username']  = $data_sender['f_username'];
			$data_store['name']      = $data_sender['f_name'];
			$data_store['id_role']   = $data_sender['f_role'];
			$data_store['status']    = 1;			
			            $res_data    = $this->Allcrud->editData('mr_user',$data_store,array('id'=>$data_sender['oid']));
			            $text_status = $this->Globalrules->check_status_res($res_data,'Data Pengguna telah berhasil diubah.');
		} elseif ($data_sender['crud'] == 'delete') {
			# code...
			$res_data          = $this->Allcrud->delData('mr_user',array('id'=>$data_sender['oid']));
			$text_status       = $this->Globalrules->check_status_res($res_data,'Data Pengguna telah berhasil dihapus.');			
		}

		$res = array
					(
						'status' => $res_data,
						'text'   => $text_status
					);
		echo json_encode($res);		
	}

	public function get_data($id,$arg=NULL,$table)
	{
		# code...
		$data       = $this->Allcrud->getData($table,array('id'=>$id));		
		if ($arg == 'ajax') {
			# code...
			$res_status = "";
			$res_text   = "";
			$res_data   = "";
			if ($data->result_array() != array()) {
				# code...
				$res_data   = $data->result_array();
				$res_status = 1;
				$res_text   = '';
			}
			else {
				# code...
				$res_data   = $data->result_array();
				$res_status = $res_data;
				$res_text   = 'Data tidak ditemukan';
			}

			$res = array
						(
							'status' => $res_status,
							'data'   => $res_data,
							'text'   => $res_text
						);
			echo json_encode($res);					
		}
		elseif($arg == 'result_array') {
			# code...
			return $data->result_array();
		}
		else {
			# code...
			return $data;			
		}
	}

}