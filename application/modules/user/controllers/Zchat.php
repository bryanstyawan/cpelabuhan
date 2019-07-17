<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zchat extends CI_Controller {

	public function __construct () {
		parent::__construct();
		$this->load->model ('Muser', '', TRUE);
	}

	public function send_message()
	{
		# code...
		$data_sender = $this->input->post('data_sender');
		$data_store  = $this->Globalrules->trigger_insert_update($data_sender['crud']);
		if ($data_sender['crud'] == 'insert') {
			# code...
			$res_data    = $this->Allcrud->editData('tr_chat',array('status_read' => 1),array('id_user_sender'=>$data_sender['oid']));			
			$data_store['id_user_sender'] = $this->session->userdata('session_user');
			$data_store['name']           = $data_sender['f_name'];
			$data_store['id_materi']      = $data_sender['oid'];
			$data_store['status_read']    = 0;
			$res_data    = $this->Allcrud->addData('tr_chat',$data_store);
			$text_status = $this->Globalrules->check_status_res($res_data,'');
		}

		$res = array
					(
						'status' => $res_data,
						'text'   => $text_status
					);
		echo json_encode($res);			
	}

	public function send_message_f_admin()
	{
		# code...
		$data_sender = $this->input->post('data_sender');
		$data_store  = $this->Globalrules->trigger_insert_update($data_sender['crud']);
		if ($data_sender['crud'] == 'insert') {
			# code...
			$res_data    = $this->Allcrud->editData('tr_chat',array('status_read' => 1),array('id_user_sender'=>$data_sender['oid']));						
			$data_store['id_admin_sender'] = $this->session->userdata('session_user');
			$data_store['id_user_sender']  = $data_sender['oid'];
			$data_store['id_materi']       = $data_sender['oid_materi'];
			$data_store['name']            = $data_sender['f_name'];
			$data_store['status_read']     = 0;
			$res_data    = $this->Allcrud->addData('tr_chat',$data_store);
			$text_status = $this->Globalrules->check_status_res($res_data,'');
		}

		$res = array
					(
						'status' => $res_data,
						'text'   => $text_status
					);
		echo json_encode($res);			
	}	

	public function get_chat_user()
	{
		# code...
		$data_sender = $this->input->post('data_sender');
		$data['chat']   = $this->Allcrud->getData('tr_chat',array('id_user_sender'=>$data_sender['oid_user'],'id_materi'=>$data_sender['oid_materi']))->result_array();
		$data['video']  = $this->Allcrud->getData('mr_video',array('id_materi'=>$data_sender['oid_materi']))->result_array();
		$data['materi'] = $this->Allcrud->getData('mr_materi',array('id'=>$data_sender['oid_materi']))->result_array();
		echo json_encode($data);
	}
}
