<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Component extends CI_Controller {

	public function __construct () {
		parent::__construct();

	}
	
	public function index()
	{
		$this->Globalrules->session_rule();						
		$data['title']   = 'Component';
		$data['content'] = 'config/component/index';
		$data['list']    = $this->Allcrud->listData('config_component');
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
			$data_store['name']            = $data_sender['f_name'];
			            $res_data          = $this->Allcrud->addData('config_component',$data_store);
			            $text_status       = $this->Globalrules->check_status_res($res_data,'Data Component telah berhasil ditambahkan.');
		} elseif ($data_sender['crud'] == 'update') {
			# code...
			$data_store['name']            = $data_sender['f_name'];
			            $res_data          = $this->Allcrud->editData('config_component',$data_store,array('id'=>$data_sender['oid']));
			            $text_status       = $this->Globalrules->check_status_res($res_data,'Data Component telah berhasil diubah.');			
		} elseif ($data_sender['crud'] == 'delete') {
			# code...
			$res_data    = $this->Allcrud->delData('config_component',array('id'=>$data_sender['oid']));
			$text_status = $this->Globalrules->check_status_res($res_data,'Data Component telah berhasil dihapus.');
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
				if ($res_data[0]['jawaban'] == true) {
					# code...
					$res_data[0]['jawaban'] = 1;
				}
				else {
					# code...
					$res_data[0]['jawaban'] = 0;
				}
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

	public function detail($id=NULL)
	{
		# code...
		$this->Globalrules->session_rule();						
		$data['title']   = 'Detail Soal';
		$data['content'] = 'bank_data/soal/detail';
		$data['list']    = $this->get_data($id,'result_array','mr_soal');
		$data['detail']    = $this->Allcrud->getData('mr_soal_detail',array('id_soal'=>$id));		
		$this->load->view('templateAdmin',$data);
	}

	public function store_detail($arg=NULL,$oid=NULL)
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
			if ($data_sender['f_jawaban'] == 'true') {
				# code...
				$data_store['jawaban'] = 'false';
				$res_data          = $this->Allcrud->editData('mr_soal_detail',$data_store,array('id_soal'=>$data_sender['oid_header']));
			}
			$data_store['id_soal']   = $data_sender['oid_header'];
			$data_store['name']      = $data_sender['f_name'];
			$data_store['jawaban']   = $data_sender['f_jawaban'];
			            $res_data    = $this->Allcrud->addData('mr_soal_detail',$data_store);
			            $text_status = $this->Globalrules->check_status_res($res_data,'Data Jawaban telah berhasil ditambahkan.');
		} elseif ($data_sender['crud'] == 'update') {
			# code...
			if ($data_sender['f_jawaban'] == 'true') {
				# code...
				$data_store['jawaban'] = 'false';
				$res_data          = $this->Allcrud->editData('mr_soal_detail',$data_store,array('id_soal'=>$data_sender['oid_header']));
			}			
			$data_store['name']      = $data_sender['f_name'];
			$data_store['jawaban']   = $data_sender['f_jawaban'];
			            $res_data    = $this->Allcrud->editData('mr_soal_detail',$data_store,array('id'=>$data_sender['oid']));
			            $text_status = $this->Globalrules->check_status_res($res_data,'Data Jawaban telah berhasil diubah.');
		} elseif ($data_sender['crud'] == 'delete') {
			# code...
			$res_data          = $this->Allcrud->delData('mr_soal',array('id'=>$data_sender['oid']));
			$text_status       = $this->Globalrules->check_status_res($res_data,'Data Soal telah berhasil dihapus.');			
		}

		$res = array
					(
						'status' => $res_data,
						'text'   => $text_status
					);
		echo json_encode($res);		
	}	
}