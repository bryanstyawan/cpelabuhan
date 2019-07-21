<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller {

	public function __construct () {
		parent::__construct();
		$this->load->model('Mtransaction', '', TRUE);
	}

	public function index()
	{
		$this->Globalrules->session_rule();						
		$data['title']       = 'Transaction';
		$data['content']     = 'transaction/main/index';
		$data['jetty']       = $this->Allcrud->listData('mr_jetty')->result_array();
		$data['vessel']      = $this->Allcrud->listData('mr_vessel')->result_array();				
		$data['list']        = $this->Mtransaction->get_vessel_jetty();	
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
			$data_store['id_jetty']   = $data_sender['f_id_jetty'];
			$data_store['id_vessel']  = $data_sender['f_id_vessel'];
			$data_store['date']       = date('Y-m-d');
			            $res_data          = $this->Allcrud->addData('tr_vessel_jetty',$data_store);
			            $text_status       = $this->Globalrules->check_status_res($res_data,'Data berhasil ditambah.');						
		} elseif ($data_sender['crud'] == 'update') {
			# code...
			$data_store['id_jetty']  = $data_sender['f_id_jetty'];									
			$data_store['id_vessel']  = $data_sender['f_id_vessel'];
			            $res_data          = $this->Allcrud->editData('tr_vessel_jetty',$data_store,array('id'=>$data_sender['oid']));
			            $text_status       = $this->Globalrules->check_status_res($res_data,'Data berhasil diupdate.');			
		} elseif ($data_sender['crud'] == 'delete') {
			# code...
			$res_data          = $this->Allcrud->delData('tr_vessel_jetty',array('id'=>$data_sender['oid']));
			$text_status       = $this->Globalrules->check_status_res($res_data,'Data telah berhasil dihapus.');			
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
				$res_data   			= $data->result_array();	
				$res_status             = 1;
				$res_text               = '';
				if ($table == 'tr_vessel_activity') {
					# code...
					$res_data['pipeline_master'] = $this->Allcrud->getData('mr_pipeline',array('id'=>$res_data[0]['id_pipeline']))->result_array();
					$res_data['pump_data']  = $this->Allcrud->listData('mr_pump_number')->result_array();
					$res_data['tank_data']  = $this->Allcrud->listData('mr_tank_number')->result_array();										
					$res_data['pipeline'] = $this->Allcrud->getData('mr_pipeline',array('id_tank_number'=>$res_data['pipeline_master'][0]['id_tank_number'],'id_pump_number'=>$res_data['pipeline_master'][0]['id_pump_number']))->result_array();					
				}
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

	public function vessel_activity($id)
	{
		# code...
		$data['vessel_jetty']    = $this->Mtransaction->get_vessel_jetty($id);
		$data['vessel_activity'] = $this->Mtransaction->get_vessel_activity($id,NULL,'ASC');					
		$data['tank_number']     = $this->Allcrud->listData('mr_tank_number')->result_array();
		$data['activity']        = $this->Allcrud->listData('mr_activity')->result_array();
		$data['product']         = $this->Allcrud->listData('mr_product')->result_array();				
		$this->load->view('transaction/activity/index',$data);		
	}

	public function store_activity($arg=NULL,$oid=NULL)
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
			$data_store['id_vessel_jetty']    = $data_sender['oid'];			
			$data_store['id_pipeline']        = $data_sender['f_id_pipeline'];
			$data_store['id_activity']        = $data_sender['f_id_activity'];
			$data_store['id_product']         = $data_sender['f_id_product'];
			$data_store['nominasi']           = $data_sender['f_nominasi'];
			$data_store['destination']        = $data_sender['f_destination'];
			$data_store['rate']               = $data_sender['f_rate'];						
			$res_data                         = $this->Allcrud->addData('tr_vessel_activity',$data_store);
			$text_status                      = $this->Globalrules->check_status_res($res_data,'Data berhasil ditambah.');						
			$data_store_edit['last_activity'] = $data_sender['f_id_activity'];
			$res_data                         = $this->Allcrud->editData('tr_vessel_jetty',$data_store_edit,array('id'=>$data_sender['oid']));						
		} elseif ($data_sender['crud'] == 'update') {
			# code...
			$data_store['id_pipeline']        = $data_sender['f_id_pipeline'];
			$data_store['id_activity']        = $data_sender['f_id_activity'];
			$data_store['id_product']         = $data_sender['f_id_product'];
			$data_store['nominasi']           = $data_sender['f_nominasi'];
			$data_store['destination']        = $data_sender['f_destination'];
			$data_store['rate']               = $data_sender['f_rate'];
			$res_data                         = $this->Allcrud->editData('tr_vessel_activity',$data_store,array('id'=>$data_sender['oid_activity']));			
			$text_status                      = $this->Globalrules->check_status_res($res_data,'Data berhasil diupdate.');			
			$get_data_vessel_activity         = $this->Mtransaction->get_vessel_activity($data_sender['oid'],NULL,'DESC');
			if ($get_data_vessel_activity != 0) {
				# code...
				$data_store_edit['last_activity'] = $get_data_vessel_activity[0]->id_activity;
				$res_data                         = $this->Allcrud->editData('tr_vessel_jetty',$data_store_edit,array('id'=>$data_sender['oid']));										

			}			
			else
			{
				$data_store_edit['last_activity'] = NULL;
				$res_data                         = $this->Allcrud->editData('tr_vessel_jetty',$data_store_edit,array('id'=>$data_sender['oid']));														
			}
		} elseif ($data_sender['crud'] == 'delete') {
			# code...
			$res_data                         = $this->Allcrud->delData('tr_vessel_activity',array('id'=>$data_sender['oid']));
			$text_status                      = $this->Globalrules->check_status_res($res_data,'Data telah berhasil dihapus.');			
			$data_sender                      = $this->input->post('data_sender');
			$get_data_vessel_activity         = $this->Mtransaction->get_vessel_activity($data_sender['oid'],NULL,'DESC');
			if ($get_data_vessel_activity != 0) {
				# code...
				$data_store_edit['last_activity'] = $get_data_vessel_activity[0]->id_activity;
				$res_data                         = $this->Allcrud->editData('tr_vessel_jetty',$data_store_edit,array('id'=>$data_sender['oid']));										

			}			
			else
			{
				$data_store_edit['last_activity'] = NULL;
				$res_data                         = $this->Allcrud->editData('tr_vessel_jetty',$data_store_edit,array('id'=>$data_sender['oid']));														
			}						
		}

		$res = array
					(
						'status' => $res_data,
						'text'   => $text_status
					);
		echo json_encode($res);		
	}	
	
}
