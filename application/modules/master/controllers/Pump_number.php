<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pump_number extends CI_Controller {

	public function __construct () {
		parent::__construct();
		$this->load->model ('Mmaster', '', TRUE);
	}
	
	public function index()
	{
		$this->Globalrules->session_rule();						
		$data['title']       = 'Pump Number';
		$data['content']     = 'master/pump_number/index';
		$data['tank_number'] = $this->Allcrud->listData('mr_tank_number')->result_array();		
		$data['list']        = $this->Mmaster->get_pump_number();	
		$this->load->view('templateAdmin',$data);
	}

	public function get_pump_number()
	{
		# code...
		$this->Globalrules->session_rule();								
		$data_sender = $this->input->post('data_sender');
		$data['list'] = $this->Allcrud->getData('mr_pump_number',array('id_tank_number'=>$data_sender['id_tank_number'],'id_pipeline'=>$data_sender['id_pipeline']));
		$this->load->view('master/pipeline/combo_pump_number',$data);		
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
			$data_store['name']            = $data_sender['f_name'];
			$data_store['id_pipeline']     = $data_sender['f_pipeline'];
			$data_store['id_tank_number']  = $data_sender['f_id_tank_number'];			
			            $res_data          = $this->Allcrud->addData('mr_pump_number',$data_store);
			            $text_status       = $this->Globalrules->check_status_res($res_data,'Data tank number berhasil ditambah.');						
		} elseif ($data_sender['crud'] == 'update') {
			# code...
			$data_store['name']            = $data_sender['f_name'];
			$data_store['id_pipeline']     = $data_sender['f_pipeline'];			
			$data_store['id_tank_number']  = $data_sender['f_id_tank_number'];			
			            $res_data          = $this->Allcrud->editData('mr_pump_number',$data_store,array('id'=>$data_sender['oid']));
			            $text_status       = $this->Globalrules->check_status_res($res_data,'Data tank number berhasil diupdate.');			
		} elseif ($data_sender['crud'] == 'delete') {
			# code...
			$res_data          = $this->Allcrud->delData('mr_pump_number',array('id'=>$data_sender['oid']));
			$text_status       = $this->Globalrules->check_status_res($res_data,'Data tank number telah berhasil dihapus.');			
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