<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct () {
		parent::__construct();
		$this->load->model ('mdashboard', '', TRUE);
		date_default_timezone_set('Asia/Jakarta');
	}

	public function home()
	{
		$this->Globalrules->session_rule();
		$data['title']     = '';
		$data['user_chat'] = 0;		
		// $data['user_chat'] = $this->mdashboard->get_chat_user('all');
		// if ($data['user_chat'] != 0) {
		// 	# code...
		// 	for($i=0;$i<count($data['user_chat']);$i++)
		// 	{
		// 		$data_get = $this->mdashboard->get_chat_user('0',$data['user_chat'][$i]->id_user_sender,$data['user_chat'][$i]->id_materi);
		// 		// print_r($data_get);die();
		// 		if ($data_get != 0) {
		// 			# code...
		// 			$data['user_chat'][$i]->counter = $data_get[0]->counter; 
		// 		}
		// 		else {
		// 			# code...
		// 			$data['user_chat'][$i]->counter = 0;					
		// 		}
		// 	}				
		// }	
		$data['content']           = 'vdashboard';
		$this->load->view('templateAdmin',$data);
	}

	public function delete_common_notify($param=NULL)
	{
		# code...
		$data_notify = $this->mdashboard->get_data_notify_user($param,$this->session->userdata('sesUser'));
		if (count($data_notify) != 0) {
			# code...
			for ($i=0; $i < count($data_notify); $i++) {
				# code...
				$data_change = array(
					'status_read' => 1
				);
				$flag        = array('id'=>$data_notify[$i]->id);
				$res_data    = $this->Allcrud->editData('log_notifikasi',$data_change,$flag);
			}
		}
	}


	public function soon()
	{
		# code...
		$this->Globalrules->session_rule();
		$data['title']   = '';
		$data['content'] = 'dashboard/soon/index';
		$this->load->view('templateAdmin',$data);		
	}
}
