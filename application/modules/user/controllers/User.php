<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct () {
		parent::__construct();
		$this->load->model ('Muser', '', TRUE);
	}

	public function index()
	{
		$this->home();
	}

	public function home()
	{
		# code...
		$this->Globalrules->session_rule();
		$data['title']              = '';
		$data['content']            = 'dashboard/index';
		$this->load->view('templateAdmin',$data);
	}

	public function services()
	{
		# code...
		$this->Globalrules->session_rule();
		$data['title']              = '';
		$data['content']            = 'services/index';
		$this->load->view('templateAdmin',$data);		
	}	

	public function try_out($type=NULL,$parent=NULL,$id=NULL,$detail=NULL,$arg=NULL)
	{
		# code...
		$this->Globalrules->session_rule();		
		if ($type == 'mulai') {
			# code...	
			$data['title']            = '';
			$data['content']          = 'user/try_out/root/mulai';
			$data['verify_user_paid'] = $this->Allcrud->getData('tr_layanan',array('id_user'=>$this->session->userdata('session_user'),'type'=>'bimbel'))->result_array();
			$data['list_soal']        = $this->Allcrud->getData('mr_try_out_soal',array('id_parent'=>$parent,'id_paket'=>$id))->result_array();
			$data['parent_name']      = $this->Allcrud->getData('lt_paket_try_out',array('id'=>$parent))->result_array();
			$data['paket_name']       = $this->Allcrud->getData('mr_try_out_list',array('id'=>$id))->result_array();
			

			if ($arg == 1) {
				# code...
				if ($detail != NULL) {
					# code...
					if ($detail != 0) {
						# code...
						$get_data_jawaban = $this->Allcrud->getData('tr_jawaban_try_out',array('id_user'=>$this->session->userdata('session_user'),'id_parent'=>$parent,'id_paket'=>$id,'id_soal'=>$data['list_soal'][$detail-1]['id']))->result_array();				
						$_data_store_['status'] = 1;
						if($get_data_jawaban != array()){$res_data = $this->Allcrud->editData('tr_jawaban_try_out',$_data_store_,array('id'=>$get_data_jawaban[0]['id']));}						
					}									
				}
			}
			elseif($arg == 0) {
				# code...
				if ($detail != NULL) {
					# code...
					if ($detail != 0) {
						# code...
						$get_data_jawaban = $this->Allcrud->getData('tr_jawaban_try_out',array('id_user'=>$this->session->userdata('session_user'),'id_parent'=>$parent,'id_paket'=>$id,'id_soal'=>$data['list_soal'][$detail-1]['id']))->result_array();				
						$_data_store_['status'] = 0;
						if($get_data_jawaban != array()){$res_data = $this->Allcrud->editData('tr_jawaban_try_out',$_data_store_,array('id'=>$get_data_jawaban[0]['id']));}															
					}
				}
			}


			$get_durasi = $this->Allcrud->getData('lt_paket_try_out',array('id'=>$parent))->result_array();
			if ($detail == NULL) {
				# code...
				$data['counter_soal'] = 0;
			}
			else {
				# code...
				$data['counter_soal'] = $detail;
			}

			$time_minute = "";
			if ($get_durasi != array()) {
				# code...
				$data['durasi'] = $get_durasi[0]['durasi']; 
				$time_minute = $get_durasi[0]['durasi'] * 60;
			}
			else {
				# code...
				$data['durasi'] = 0;					
				$time_minute = 0;
			}			

			$get_time = $this->Allcrud->getData('tr_track_time_try_out',array('id_user'=>$this->session->userdata('session_user'),'id_paket'=>$id,'id_parent'=>$parent))->result_array();						
			if ($get_time == array()) {
				# code...					
				$data_store['audit_time_insert'] = date('Y-m-d H:i:s a', time() + $time_minute);
				$data_store['id_user']           = $this->session->userdata('session_user');
				$data_store['id_paket']          = $id;
				$data_store['id_parent']         = $parent;

				$res_data = $this->Allcrud->addData('tr_track_time_try_out',$data_store);
				$get_time = $this->Allcrud->getData('tr_track_time_try_out',array('id_user'=>$this->session->userdata('session_user'),'id_paket'=>$id,'id_parent'=>$parent))->result_array();
				if ($get_time != array()) {
					# code...
					$timeout = $get_time[0]['audit_time_insert'];
					$timeout = strtotime($timeout) - strtotime(date('Y-m-d H:i:s'));
					if($timeout < 0)
					{
						$timeout = 0;
					}				
					else {
						# code...
						if ($get_time[0]['status'] == 1) {
							# code...
							$timeout = 0;						
						}
					}
					$data['timeout'] = $timeout ;
				}
			}
			else {
				# code...
				$timeout = $get_time[0]['audit_time_insert'];
				$timeout = strtotime($timeout) - strtotime(date('Y-m-d H:i:s'));
				if($timeout < 0)
				{
					$timeout = 0;
				}				
				else {
					# code...
					if ($get_time[0]['status'] == 1) {
						# code...
						$timeout = 0;						
					}
				}
				$data['timeout'] = $timeout ;
			}

			$this->load->view('templateAdmin',$data);					
					
		}
		elseif ($type == 'selesai') {
			# code...
			$data['title']            = '';
			$data['content']          = 'user/try_out/root/end';
			$data['verify_user_paid'] = $this->Allcrud->getData('tr_layanan',array('id_user'=>$this->session->userdata('session_user'),'type'=>'bimbel'))->result_array();
			$this->load->view('templateAdmin',$data);								
		}
		elseif ($type == 'analisis') {
			# code...
			$parent_name = $this->Allcrud->getData('lt_paket_try_out',array('id'=>$parent))->result_array();
			$paket_name  = $this->Allcrud->getData('mr_try_out_list',array('id'=>$id,'id_parent'=>$parent))->result_array();
			$res_parent  = ($parent_name != array()) ? $parent_name[0]['text'] : '' ;
			$res_paket   = ($paket_name != array()) ? "(".$paket_name[0]['name'].")" : '' ;			
			$data['list_soal']        = $this->Allcrud->getData('mr_try_out_soal',array('id_parent'=>$parent,'id_paket'=>$id))->result_array();
			$data['content']          = 'user/try_out/root/analisis';
			$data['parent']           = $parent;
			$data['paket']            = $id;
			$data['verify_user_paid'] = $this->Allcrud->getData('tr_layanan',array('id_user'=>$this->session->userdata('session_user'),'type'=>'bimbel'))->result_array();
			$data['title']            = 'Analisis Try Out '.$res_parent." ".$res_paket;
			$data['tipe']             = $this->Allcrud->listData('lt_paket_try_out')->result_array();			
			$this->load->view('templateAdmin',$data);											
		}
		elseif ($type == 'rangking') {
			# code...
			$parent_name = $this->Allcrud->getData('lt_paket_try_out',array('id'=>$parent))->result_array();
			$paket_name  = $this->Allcrud->getData('mr_try_out_list',array('id'=>$id,'id_parent'=>$parent))->result_array();
			$res_parent  = ($parent_name != array()) ? $parent_name[0]['text'] : '' ;
			$res_paket   = ($paket_name != array()) ? "(".$paket_name[0]['name'].")" : '' ;
			$data['content']          = 'user/try_out/root/rangking';
			$data['verify_user_paid'] = $this->Allcrud->getData('tr_layanan',array('id_user'=>$this->session->userdata('session_user'),'type'=>'bimbel'))->result_array();
			$data['list_rangking']    = $this->Muser->get_rangking_try_out($parent,$id);
			$data['parent']           = $parent;
			$data['paket']            = $id;
			$data['title']            = 'Rangking Try Out '.$res_parent." ".$res_paket;
			$data['tipe']             = $this->Allcrud->listData('lt_paket_try_out')->result_array();
			// print_r($data['tipe']);die();
			$this->load->view('templateAdmin',$data);			
		}
		elseif ($type == NULL) {
			# code...
			$get_tryout_id     = 0;
			$get_tryout_gratis = $this->Allcrud->getData('tr_layanan',array('id_user'=>$this->session->userdata('session_user'),'type'=>'gratis_tryout'))->result_array();
			$get_tryout        = $this->Allcrud->getData('tr_layanan',array('id_user'=>$this->session->userdata('session_user'),'type'=>'tryout'))->result_array();
			if ($get_tryout != array()) {
				# code...
				if ($get_tryout[0]['id_layanan'] == 3) {
					# code...
					$get_tryout_id = 1;
				}
				elseif ($get_tryout[0]['id_layanan'] == 4) {
					# code...
					$get_tryout_id = 2;
				}
				
			}
			else {
				# code...
				$get_tryout_id = 0;
			}
			$data['title']                           = 'Try Out';
			$data['content']                         = 'user/try_out/root/index';
			$data['verify_user_paid_bimbel']         = $this->Allcrud->getData('tr_layanan',array('id_user'=>$this->session->userdata('session_user'),'type'=>'bimbel'))->result_array();
			$data['verify_user_paid_try_out']        = $get_tryout_id;
			$data['verify_user_paid_try_out_count']  = count($get_tryout);
			$data['verify_user_paid_try_out_gratis'] = ($get_tryout_gratis != array()) ? ((count($get_tryout_gratis) == 2) ? '7' : $get_tryout_gratis[0]['id_layanan'] ) : '0' ;
			$data['tipe']                            = $this->Allcrud->listData('lt_paket_try_out')->result_array();
			// print_r($data['verify_user_paid_bimbel']);
			$this->load->view('templateAdmin',$data);					
		}
	}

	public function store()
	{
		# code...
		$data_sender = $this->input->post('data_sender');

		$data_store = $this->Globalrules->trigger_insert_update($data_sender['crud']);
		if ($data_sender['crud'] == 'insert') {
			# code...
			$data_store['name']         = $data_sender['name'];
			$data_store['username']     = $data_sender['username'];
			$data_store['alamat']       = $data_sender['alamat'];
			$data_store['asal_sekolah'] = $data_sender['asal_sekolah'];
			$data_store['no_hp']        = $data_sender['no_hp'];
			$data_store['no_wa']        = $data_sender['no_wa'];
			$data_store['id_line']      = $data_sender['id_line'];
			$data_store['password']     = md5($data_sender['password']);
			$data_store['id_role']      = 3;
			$data_store['status']       = 1;
			            $res_data       = $this->Allcrud->addData('mr_user',$data_store);
			            $text_status    = $this->Globalrules->check_status_res($res_data,'Anda telah berhasil mendaftar.');
		}

		$res = array
					(
						'status' => $res_data,
						'text'   => $text_status
					);
		echo json_encode($res);		
	}

	public function bimbingan_belajar($arg=NULL,$type=NULL,$materi=NULL)
	{
		# code...
		if ($arg == NULL) {
			# code...
			$this->Globalrules->session_rule();
			$data['title']            = 'Bimbingan Belajar';
			$data['verify_user_paid'] = $this->Allcrud->getData('tr_layanan',array('id_user'=>$this->session->userdata('session_user'),'type'=>'bimbel'));
			$data['list']             = $this->Allcrud->getData('mr_materi',array('id_parent'=>NULL))->result_array();
			$data['content']          = 'user/bimbingan_belajar/root/index';
			$this->load->view('templateAdmin',$data);		
		}
		else
		{
			redirect('user/zbimbingan_belajar/'.$arg.'/'.$type.'/'.$materi);			
		}		
	}

	public function raport()
	{
		# code...
		$this->Globalrules->session_rule();
		$data['title']            = 'Bimbingan Belajar';
		$data['verify_user_paid'] = $this->Allcrud->getData('tr_layanan',array('id_user'=>$this->session->userdata('session_user'),'type'=>'bimbel'));
		$data['list']             = $this->Allcrud->getData('mr_materi',array('id_parent'=>NULL))->result_array();
		$data['content']          = 'user/bimbingan_belajar/analisis/raport';
		$this->load->view('templateAdmin',$data);
	}	

	public function bimbingan_belajar1($arg=NULL,$type=NULL,$materi=NULL)
	{
		# code...
		if ($arg == NULL) {
			# code...
			$this->Globalrules->session_rule();
			$data['title']            = 'Bimbingan Belajar';
			$data['verify_user_paid'] = $this->Allcrud->getData('tr_layanan',array('id_user'=>$this->session->userdata('session_user'),'type'=>'bimbel'));
			$data['list']             = $this->Allcrud->getData('mr_materi',array('id_parent'=>NULL))->result_array();
			$data['content']          = 'user/bimbingan_belajar/root/index1';
			$this->load->view('templateAdmin',$data);		
		}
		else
		{
			redirect('user/zbimbingan_belajar/'.$arg.'/'.$type.'/'.$materi);			
		}		
	}	

	public function bimbingan_belajar_trial()
	{
		# code...
		$this->Globalrules->session_rule();
		$data['title']            = 'Bimbingan Belajar';
		$data['verify_user_paid'] = $this->Allcrud->getData('tr_layanan',array('id_user'=>$this->session->userdata('session_user'),'type'=>'bimbel'));
		$data['list']             = $this->Allcrud->getData('mr_materi',array('id_parent'=>NULL))->result_array();
		$data['content']          = 'user/bimbingan_belajar/root/trial';
		if ($data['verify_user_paid']->result_array() != array()) {
			# code...
			redirect('user/bimbingan_belajar');
		}
		$this->load->view('templateAdmin',$data);		
	}

	public function verify_token()
	{
		# code...
		$text_status = "";
		$data_sender = $this->input->post('data_sender');
		$check_token = $this->Allcrud->getData('mr_token',array('name'=>$data_sender['token'],'id_layanan'=>$data_sender['oid']));
		if ($check_token->result_array() == array()) {
			# code...
			$res_data    = 0 ;
			$text_status = "Token Tidak Ditemukan.";
		}
		else {
			# code...
			if ($data_sender['oid'] == 5 || $data_sender['oid'] == 6) {
				# code...
				$data_store = $this->Globalrules->trigger_insert_update('insert');				
				$data_store['id_user']    = $this->session->userdata('session_user');
				$data_store['id_layanan'] = $data_sender['oid'];
				$data_store['type']       = 'gratis_tryout';
				$data_store['token']      = $data_sender['token'];
				$data_store['status']     = 1;
				$res_data    = $this->Allcrud->addData('tr_layanan',$data_store);
				$text_status = $this->Globalrules->check_status_res($res_data,'Anda mendapat gratis paket try out .');				
			}
			else {
				# code...
				$check_token = $this->Allcrud->getData('mr_token',array('name'=>$data_sender['token'],'id_layanan'=>$data_sender['oid'],'status'=>1));
				if ($check_token->result_array() == array()) {
					# code...
					$res_data = 0;
					$text_status = "Token Telah terpakai.";				
				}
				else {
					# code...
					$data_store = $this->Globalrules->trigger_insert_update('insert');
					$data_store1 = $this->Globalrules->trigger_insert_update('update');
					$data_store['id_user']    = $this->session->userdata('session_user');
					$data_store['id_layanan'] = $data_sender['oid'];
					$data_store['type']       = $data_sender['type'];
					$data_store['token']      = $data_sender['token'];
					$data_store['status']     = 1;
					$data_store1['status']      = 0;
					$res_data    = $this->Allcrud->editData('mr_token',$data_store1,array('name'=>$data_sender['token']));				
					$res_data    = $this->Allcrud->addData('tr_layanan',$data_store);
					$text_status = $this->Globalrules->check_status_res($res_data,'Pembelian Telah berhasil.');
				}				
			}

		}
		$res = array
					(
						'status' => $res_data,
						'text'   => $text_status
					);
		echo json_encode($res);		
	}

	public function video_materi()
	{
		# code...
		$this->Globalrules->session_rule();
		$data['title']   = 'Video Materi';
		$data['list']    = $this->Allcrud->getData('mr_materi',array('id_parent'=>NULL))->result_array();		
		$data['verify_user_paid'] = $this->Allcrud->getData('tr_layanan',array('id_user'=>$this->session->userdata('session_user'),'type'=>'bimbel'))->result_array();		
		$data['content'] = 'user/video_materi/index';
		$this->load->view('templateAdmin',$data);		
	}

	public function mini_try_out()
	{
		# code...
		$this->Globalrules->session_rule();
		$data['title']   = 'Mini Try Out';
		$data['list'] = $this->Allcrud->getData('mr_try_out_list',array('id_parent'=>3,'publish'=>1))->result_array();
		$data['verify_user_paid'] = $this->Allcrud->getData('tr_layanan',array('id_user'=>$this->session->userdata('session_user'),'type'=>'bimbel'))->result_array();		
		$data['content'] = 'user/try_out/mini_try_out/index';
		$this->load->view('templateAdmin',$data);				
	}

	public function mini_try_out_start($id,$detail=NULL,$arg=NULL)
	{
		# code...
		$this->Globalrules->session_rule();
		$data['title']      = 'Mini Try Out';
		$data['paket_name'] = $this->Allcrud->getData('mr_try_out_list',array('id'=>$id,'publish'=>1))->result_array();		
		if ($data['paket_name'] != array()) {
			# code...
			$data['list']    = $this->Allcrud->getData('mr_try_out_soal',array('id_paket'=>$data['paket_name'][0]['id']))->result_array();			
			$data['track']   = $this->Allcrud->getData('tr_track_time_try_out',array('id_user'=>$this->session->userdata('session_user'),'id_paket'=>$data['paket_name'][0]['id']))->result_array();			


			if ($arg == 1) {
				# code...
				if ($detail != NULL) {
					# code...
					if ($detail != 0) {
						# code...
						$get_data_jawaban = $this->Allcrud->getData('tr_jawaban_try_out',array('id_user'=>$this->session->userdata('session_user'),'id_paket'=>$data['paket_name'][0]['id'],'id_soal'=>$data['list'][$detail-1]['id']))->result_array();				
						$_data_store_['status'] = 1;
						if($get_data_jawaban != array()){$res_data = $this->Allcrud->editData('tr_jawaban_try_out',$_data_store_,array('id'=>$get_data_jawaban[0]['id']));}						
					}									
				}
			}
			elseif($arg == 0) {
				# code...
				if ($detail != NULL) {
					# code...
					if ($detail != 0) {
						# code...
						$get_data_jawaban = $this->Allcrud->getData('tr_jawaban_try_out',array('id_user'=>$this->session->userdata('session_user'),'id_paket'=>$data['paket_name'][0]['id'],'id_soal'=>$data['list'][$detail-1]['id']))->result_array();				
						$_data_store_['status'] = 0;
						if($get_data_jawaban != array()){$res_data = $this->Allcrud->editData('tr_jawaban_try_out',$_data_store_,array('id'=>$get_data_jawaban[0]['id']));}															
					}
				}
			}

			if ($detail == NULL) {
				# code...
				$data['counter_soal'] = 0;
			}
			else {
				# code...
				$data['counter_soal'] = $detail;
			}			

			$time_server  = date('Y-m-d H:i:s');
			$time_minute     = $data['paket_name'][0]['durasi'] * 60;
			$time_expire     = date('Y-m-d H:i:s',strtotime('+'.$data['paket_name'][0]['durasi'].' minutes',strtotime($data['paket_name'][0]['time_publish'])));
			$timeout_expired = strtotime($time_expire) - strtotime($time_server);        
			$data['timeout'] = $timeout_expired; 
		}
		else
		{
			redirect('user/mini_try_out');
		}
		
		
		$data['verify_user_paid'] = $this->Allcrud->getData('tr_layanan',array('id_user'=>$this->session->userdata('session_user'),'type'=>'bimbel'))->result_array();		
		$data['content'] = 'user/try_out/mini_try_out/start';
		$this->load->view('templateAdmin',$data);		
	}

	public function store_choice_mini_try_out()
	{
		# code...
		# code...
		$crud        = '';
		$res_data    = "";
		$text_status = "";
		$data_sender = $this->input->post('data_sender');
		$user        = $this->session->userdata('session_user');
		$check_data  = $this->Allcrud->getData('tr_jawaban_try_out',array('id_user'=>$user,'id_paket'=>$data_sender['paket'],'id_soal'=>$data_sender['soal']))->result_array();
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
			$res_data  = $this->Allcrud->editData('tr_jawaban_try_out',$data_store,array('id_user'=>$user,'id_paket'=>$data_sender['paket'],'id_soal'=>$data_sender['soal']));			
		}

		$text_status       = $this->Globalrules->check_status_res($res_data,'Jawaban anda telah disimpan.');
		$res = array
					(
						'status' => $res_data,
						'text'   => $text_status
					);
		echo json_encode($res);		
	}

	public function end_mini_try_out($paket=NULL)
	{
		# code...
		$user                    = $this->session->userdata('session_user');		
		$data_store1['status']   = 1;
		$data_store1['id_user']  = $user;
		$data_store1['id_paket'] = $paket;		

		$res_data    			 = $this->Allcrud->editData('tr_track_time_try_out',$data_store1,array('id_user'=>$user,'id_paket' => $paket));		
		$text_status             = $this->Globalrules->check_status_res($res_data,'Anda telah menyelesaikan try out ini.');
		$res                     = array
									(
										'status' => $res_data,
										'text'   => $text_status
									);
		echo json_encode($res);				
	}

	public function mini_try_out_analisis($id=NULL)
	{
		# code...
		$this->Globalrules->session_rule();
		if ($id != NULL) {
			# code...
			$data['title']      = 'Mini Try Out - Analisis';
			$data['paket']      = $id;
			$data['data_paket'] = $this->Allcrud->getData('mr_try_out_list',array('id'=>$id))->result_array();		 
			$data['list']       = $this->Allcrud->getData('mr_try_out_soal',array('id_paket'=>$id))->result_array();		
			$data['content']    = 'user/try_out/mini_try_out/analisis';
			$this->load->view('templateAdmin',$data);					
		}
		else
		{
			redirect('user/mini_try_out');
		}

	}

	public function secondsToTime($seconds) {
		$dtF = new \DateTime('@0');
		$dtT = new \DateTime("@$seconds");
		return $dtF->diff($dtT)->format('%a Hari, %h Jam, %i Menit dan %s Detik');
	}	
}
