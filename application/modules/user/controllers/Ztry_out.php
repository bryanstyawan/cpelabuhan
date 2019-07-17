<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ztry_out extends CI_Controller {

	public function __construct () {
		parent::__construct();
		$this->load->model ('Muser', '', TRUE);
	}

	public function store_choice()
	{
		# code...
		$crud        = '';
		$res_data    = "";
		$text_status = "";
		$data_sender = $this->input->post('data_sender');
		$user        = $this->session->userdata('session_user');
		$check_data  = $this->Allcrud->getData('tr_jawaban_try_out',array('id_user'=>$user,'id_parent'=>$data_sender['parent'],'id_paket'=>$data_sender['paket'],'id_soal'=>$data_sender['soal']))->result_array();
		if ($check_data == array()) {
			# code...
			$crud = 'insert';
		}
		else {
			# code...
			$crud = 'update';			
		}

		$data_store = $this->Globalrules->trigger_insert_update($crud);
		$data_store['id_user']    = $user;
		$data_store['id_parent']  = $data_sender['parent'];
		$data_store['id_paket']   = $data_sender['paket'];
		$data_store['id_soal']    = $data_sender['soal'];
		$data_store['id_jawaban'] = $data_sender['choice'];
		$data_store['status']     = 0;
		if ($crud == 'insert') 
		{
			# code...
			$res_data    = $this->Allcrud->addData('tr_jawaban_try_out',$data_store);			
		}
		elseif($crud == 'update') 
		{
			# code...
			$res_data  = $this->Allcrud->editData('tr_jawaban_try_out',$data_store,array('id_user'=>$user,'id_parent'=>$data_sender['parent'],'id_paket'=>$data_sender['paket'],'id_soal'=>$data_sender['soal']));			
		}

		$text_status       = $this->Globalrules->check_status_res($res_data,'Jawaban anda telah disimpan.');
		$res = array
					(
						'status' => $res_data,
						'text'   => $text_status
					);
		echo json_encode($res);		
	}
	
	public function finish_step()
	{
		# code...
		$crud        = '';
		$res_data    = "";
		$text_status = "";
		$data_sender = $this->input->post('data_sender');
		$user        = $this->session->userdata('session_user');
		if ($data_sender['type'] == 4) {
			# code...
			$res_data    = $this->track_bimbingan($user,$data_sender,0,1);			
		}
		else {
			# code...
			$res_data    = $this->track_bimbingan($user,$data_sender,0,1);
			$res_data    = $this->track_bimbingan($user,$data_sender,1,0);
		}		
		$text_status = $this->Globalrules->check_status_res($res_data,'Anda telah menyelesaikan tahap ini.');
		$res = array
					(
						'status' => $res_data,
						'text'   => $text_status
					);
		echo json_encode($res);		
	}

	public function track_bimbingan($user,$data_sender,$counter,$status)
	{
		# code...
		if ($data_sender['type'] == 4) {
			# code...
			
		}
		else {
			# code...
			$data_sender['type'] = $data_sender['type'] + $counter;			
		}
		$check_data  = $this->Allcrud->getData('tr_track_bimbingan_belajar',array('id_user'=>$user,'id_tipe_bimbel'=>$data_sender['type'],'id_materi'=>$data_sender['materi']))->result_array();
		if ($check_data == array()) $crud = 'insert';
		else $crud = 'update';		

		$data_store1 = $this->Globalrules->trigger_insert_update($crud);
		$data_store1 ['id_user']       = $user;
		$data_store1['id_tipe_bimbel'] = $data_sender['type'];
		$data_store1['id_materi']      = $data_sender['materi'];
		$data_store1['status']         = $status;
		if ($crud == 'insert') 
		{
			# code...
			$res_data    = $this->Allcrud->addData('tr_track_bimbingan_belajar',$data_store1);
		}
		elseif($crud == 'update') 
		{	
			# code...
			$data_store1['status'] = 1;
			$res_data  = $this->Allcrud->editData('tr_track_bimbingan_belajar',$data_store1,array('id_user'=>$user,'id_tipe_bimbel'=>$data_sender['type'],'id_materi'=>$data_sender['materi']));			
		}
		
		return $res_data;
	}

	public function end_test($parent,$paket)
	{
		# code...
		$data_store1['status'] = 1;
		$user     = $this->session->userdata('session_user');
		$res_data = $this->Allcrud->editData('tr_track_time_try_out',$data_store1,array('id_user'=>$user,'id_parent'=>$parent,'id_paket'=>$paket));
		$text_status = $this->Globalrules->check_status_res($res_data,'Anda telah menyelesaikan try out ini.');
		$res = array
					(
						'status' => $res_data,
						'text'   => $text_status
					);
		echo json_encode($res);		
	}
}
