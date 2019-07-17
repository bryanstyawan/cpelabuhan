<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Zbimbingan_belajar extends CI_Controller {

	public function __construct () {
		parent::__construct();
		$this->load->model ('Muser', '', TRUE);
	}

	public function pre_test($type=NULL,$materi=NULL)
	{
		# code...
		$this->Globalrules->session_rule();
		$data['title']   = 'Bimbingan Belajar - Pre Test';
		$data['type']    = $type;
		$data['materi']  = $materi;
		$data['list']    = $this->Allcrud->getData('mr_soal',array('id_materi'=>$materi,'id_tipe_soal'=>$type))->result_array();
		$data['track']   = $this->Allcrud->getData('tr_track_bimbingan_belajar',array('id_user'=>$this->session->userdata('session_user'),'id_tipe_bimbel'=>$type,'id_materi'=>$materi))->result_array();		
		$data['content'] = 'user/bimbingan_belajar/pre_test/index';
		$this->load->view('templateAdmin',$data);		
	}	

	public function video_materi($type=NULL,$materi=NULL)
	{
		# code...
		$this->Globalrules->session_rule();
		$data['title']   = 'Bimbingan Belajar - Video Belajar';
		$data['type']    = $type;
		$data['materi']  = $materi;
		$data['list']    = $this->Allcrud->getData('mr_video',array('id_materi'=>$materi))->result_array();
		$data['chat']    = $this->Allcrud->getData('tr_chat',array('id_user_sender'=>$this->session->userdata('session_user'),'id_materi'=>$materi))->result_array();
		$data['content'] = 'user/bimbingan_belajar/video/index';
		$this->load->view('templateAdmin',$data);				
	}

	public function quiz($type=NULL,$materi=NULL)
	{
		# code...
		$this->Globalrules->session_rule();
		$data['title']   = 'Bimbingan Belajar - Quiz';
		$data['type']    = $type;
		$data['materi']  = $materi;
		$data['list']    = $this->Allcrud->getData('mr_soal',array('id_materi'=>$materi,'id_tipe_soal'=>$type))->result_array();
		$data['track']   = $this->Allcrud->getData('tr_track_bimbingan_belajar',array('id_user'=>$this->session->userdata('session_user'),'id_tipe_bimbel'=>$type,'id_materi'=>$materi))->result_array();
		$data['content'] = 'user/bimbingan_belajar/pre_test/index';
		$this->load->view('templateAdmin',$data);				
	}

	public function analisis($type=NULL,$materi=NULL)
	{
		# code...
		$this->Globalrules->session_rule();
		$data['title']    = 'Bimbingan Belajar - Hasil Analisis';
		$data['type']     = $type;
		$data['materi']   = $materi;
		$data['pre_test'] = $this->Allcrud->getData('mr_soal',array('id_materi'=>$materi,'id_tipe_soal'=>1))->result_array();
		$data['quiz']     = $this->Allcrud->getData('mr_soal',array('id_materi'=>$materi,'id_tipe_soal'=>3))->result_array();
		$data['content']  = 'user/bimbingan_belajar/analisis/index';
		$this->load->view('templateAdmin',$data);				
	}	

	public function store_choice()
	{
		# code...
		$crud        = '';
		$res_data    = "";
		$text_status = "";
		$data_sender = $this->input->post('data_sender');
		$user        = $this->session->userdata('session_user');
		$check_data  = $this->Allcrud->getData('tr_jawaban_bimbingan_belajar',array('id_user'=>$user,'id_type'=>$data_sender['type'],'id_materi'=>$data_sender['materi'],'id_soal'=>$data_sender['soal']))->result_array();
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
		$data_store['id_type']    = $data_sender['type'];
		$data_store['id_materi']  = $data_sender['materi'];
		$data_store['id_soal']    = $data_sender['soal'];
		$data_store['id_jawaban'] = $data_sender['choice'];
		$data_store['status']     = 0;
		if ($crud == 'insert') 
		{
			# code...
			$res_data    = $this->Allcrud->addData('tr_jawaban_bimbingan_belajar',$data_store);			
		}
		elseif($crud == 'update') 
		{
			# code...
			$res_data  = $this->Allcrud->editData('tr_jawaban_bimbingan_belajar',$data_store,array('id_user'=>$user,'id_type'=>$data_sender['type'],'id_materi'=>$data_sender['materi'],'id_soal'=>$data_sender['soal']));			
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
		$flag_res    = 0;
		$data_sender = $this->input->post('data_sender');
		$user        = $this->session->userdata('session_user');
		if ($data_sender['type'] == 4) {
			# code...
			$res_data    = $this->track_bimbingan($user,$data_sender,0,1);						
		}
		else {
			# code...
			if ($data_sender['type'] != 2) {
				# code...
				$list_soal   = count($this->Allcrud->getData('mr_soal',array('id_materi'=>$data_sender['materi'],'id_tipe_soal'=>$data_sender['type']))->result_array());
				$list_choice = count($this->Allcrud->getData('tr_jawaban_bimbingan_belajar',array('id_user'=>$user,'id_type'=>$data_sender['type'],'id_materi'=>$data_sender['materi']))->result_array());
				if ($list_choice > 20) {
					# code...
					$list_choice = $list_soal;
				}	

				if ($list_soal == $list_choice) {
					# code...
					$flag_res = 1;
				}
				else {
					# code...
					$flag_res = 0;
					$text_status = "Harap selesaikan terlebih dahulu";					
				}
			}
			else {
				# code...
				$flag_res = 1;
			}

			if ($flag_res == 1) {
				# code...
				$res_data = $this->track_bimbingan($user,$data_sender,0,1);
				$res_data = $this->track_bimbingan($user,$data_sender,1,0);
			}
			else {
				# code...
				$res_data = 2;
			}
		}		

		if ($flag_res == 1) {
			# code...
			$text_status = $this->Globalrules->check_status_res($res_data,'Anda telah menyelesaikan tahap ini.');			
		}

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
}
