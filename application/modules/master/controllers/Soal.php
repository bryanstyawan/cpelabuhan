<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Soal extends CI_Controller {

	public function __construct () {
		parent::__construct();
		$this->load->model ('Mbank_data', '', TRUE);
	}
	
	public function index($arg=NULL,$id=NULL,$parent=NULL,$param=NULL)
	{
		$this->Globalrules->session_rule();						

		$arg       = $this->Allcrud->getData('lt_tipe_bimbingan_belajar',array('id'=>$param))->result_array()[0]['text'];
		$data['title']   = 'Bank Soal '.$arg;
		$data['content'] = 'bank_data/soal/index';
		$data['list']    = $this->Allcrud->getdata('mr_soal',array('id_materi'=>$id,'id_parent'=>$parent,'id_tipe_soal'=>$param));
		$data['materi']  = $this->Allcrud->getData('mr_materi',array('id'=>$id));
		$data['parent']  = $this->Allcrud->getData('mr_materi',array('id'=>$parent));
		$data['param']   = $param;
		$this->load->view('templateAdmin',$data);
	}

	public function upload_data_soal($arg,$oid=NULL)
	{
		# code...
		$config['upload_path']   = FCPATH.'/public/soal/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size']      = '5000';
		$this->load->library('upload', $config);
		$id_pekerjaan = "";
		$f_file       = "";
		$res_data     = 0;
		$res_data_id  = "";
		$text_status  = "";
		$data         = "";
		$msg          = "";

		$data_store  = $this->Globalrules->trigger_insert_update($arg);
		
		if ($arg == 'insert') {
			# code...
			// if ( ! $this->upload->do_upload('file')){
			// 	$res_data = 0;
			// 	$msg      = $this->upload->display_errors();
			// 	$f_file   = "";
			// }
			// else
			// {
			// 	$dataupload = $this->upload->data();
			// 	$res_data   = 1;				
			// 	$msg        = $dataupload['file_name']." berhasil diupload";
			// 	$f_file     = $this->upload->data('file_name');
			// }

			// if ($res_data == 1) {
			// 	if ($f_file != '')$data_store['image'] = $f_file;
	
			// 	$data_store['image']      = $f_file;
			// 	            $process     = $this->Allcrud->addData_with_return_id('mr_buku',$data_store);
			// 	            $res_data    = $process['status'];
			// 	            $res_data_id = $process['id'];
			// 	            $text_status = $this->Globalrules->check_status_res($res_data,$msg);
			// }
			// else {
			// 	# code...
			// 	$text_status = $msg;								
			// }
		}
		elseif ($arg == 'update') {
			# code...
			$get_data     = $this->get_data($oid,'result_array','mr_soal');
			$path_to_file = $config['upload_path'].$get_data[0]['image'];
			if ($get_data[0]['image'] != '' || $get_data[0]['image'] != NULL) {
				# code...
				$param_file_exists = 0;
				if (file_exists($path_to_file)) {
					# code...
					$param_file_exists = 1;
					if(unlink($path_to_file)) {
						// echo 'deleted successfully';
					}
					else {
						echo 'errors occured';
					}							
				}
				else {
					# code...
					$param_file_exists = 0;				
				}				
			}				

			if ( ! $this->upload->do_upload('file')){
				$res_data = 0;
				$msg      = $this->upload->display_errors();
				$f_file   = "";
			}
			else
			{
				$dataupload = $this->upload->data();
				$res_data   = 1;				
				$msg        = $dataupload['file_name']." berhasil diupload";
				$f_file     = $this->upload->data('file_name');
			}
			if ($res_data == 1) {
				# code...
				if ($f_file != '')$data_store['image'] = $f_file;
	
				$data_store['image']      = $f_file;
								$process     = $this->Allcrud->editData('mr_soal',$data_store,array('id'=>$oid));
								$res_data    = $process;
								$res_data_id = $oid;
								$text_status = $this->Globalrules->check_status_res($res_data,$msg);
			}
			elseif($res_data == 0) {
				# code...
				$text_status = $msg;				
			}
		}

		$res = array
		(
			'status' => $res_data,
			'text'   => $text_status,
			'id'     => $res_data_id
		);
		echo json_encode($res);						
	}
	
	public function upload_data_pembahasan($arg,$oid=NULL)
	{
		# code...
		$config['upload_path']   = FCPATH.'/public/pembahasan/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size']      = '5000';
		$this->load->library('upload', $config);
		$id_pekerjaan = "";
		$f_file       = "";
		$res_data     = 0;
		$res_data_id  = "";	
		$text_status  = "";
		$data         = "";
		$msg          = "";

		$data_store  = $this->Globalrules->trigger_insert_update($arg);
		
		if ($arg == 'insert') {
			# code...
			// if ( ! $this->upload->do_upload('file')){
			// 	$res_data = 0;
			// 	$msg      = $this->upload->display_errors();
			// 	$f_file   = "";
			// }
			// else
			// {
			// 	$dataupload = $this->upload->data();
			// 	$res_data   = 1;				
			// 	$msg        = $dataupload['file_name']." berhasil diupload";
			// 	$f_file     = $this->upload->data('file_name');
			// }

			// if ($res_data == 1) {
			// 	if ($f_file != '')$data_store['image'] = $f_file;
	
			// 	$data_store['image']      = $f_file;
			// 	            $process     = $this->Allcrud->addData_with_return_id('mr_buku',$data_store);
			// 	            $res_data    = $process['status'];
			// 	            $res_data_id = $process['id'];
			// 	            $text_status = $this->Globalrules->check_status_res($res_data,$msg);
			// }
			// else {
			// 	# code...
			// 	$text_status = $msg;								
			// }
		}
		elseif ($arg == 'update') {
			# code...
			$get_data     = $this->get_data($oid,'result_array','mr_soal');
			$path_to_file = $config['upload_path'].$get_data[0]['image_desc'];
			if ($get_data[0]['image_desc'] != '' || $get_data[0]['image_desc'] != NULL) {
				# code...
				$param_file_exists = 0;
				if (file_exists($path_to_file)) {
					# code...
					$param_file_exists = 1;
					if(unlink($path_to_file)) {
						// echo 'deleted successfully';
					}
					else {
						echo 'errors occured';
					}							
				}
				else {
					# code...
					$param_file_exists = 0;				
				}				
			}				

			if ( ! $this->upload->do_upload('file')){
				$res_data = 0;
				$msg      = $this->upload->display_errors();
				$f_file   = "";
			}
			else
			{
				$dataupload = $this->upload->data();
				$res_data   = 1;				
				$msg        = $dataupload['file_name']." berhasil diupload";
				$f_file     = $this->upload->data('file_name');
			}
			if ($res_data == 1) {
				# code...
				if ($f_file != '')$data_store1['image_desc'] = $f_file;
	
				$data_store1['image_desc']      = $f_file;
								$process     = $this->Allcrud->editData('mr_soal',$data_store1,array('id'=>$oid));
								$res_data    = $process;
								$res_data_id = $oid;
								$text_status = $this->Globalrules->check_status_res($res_data,$msg);
			}
			elseif($res_data == 0) {
				# code...
				$text_status = $msg;				
			}
		}

		$res = array
		(
			'status' => $res_data,
			'text'   => $text_status,
			'id'     => $res_data_id
		);
		echo json_encode($res);						
	}	

	public function upload_data_jawaban($arg,$oid=NULL)
	{
		# code...
		$config['upload_path']   = FCPATH.'/public/jawaban/';
		$config['allowed_types'] = 'jpg|jpeg|png';
		$config['max_size']      = '5000';
		$this->load->library('upload', $config);
		$id_pekerjaan = "";
		$f_file       = "";
		$res_data     = 0;
		$res_data_id  = "";
		$text_status  = "";
		$data         = "";
		$msg          = "";

		$data_store  = $this->Globalrules->trigger_insert_update($arg);
		
		if ($arg == 'insert') {
			# code...
		}
		elseif ($arg == 'update') {
			# code...
			$get_data     = $this->get_data($oid,'result_array','mr_soal_detail');
			$path_to_file = $config['upload_path'].$get_data[0]['image'];
			if ($get_data[0]['image'] != '' || $get_data[0]['image'] != NULL) {
				# code...
				$param_file_exists = 0;
				if (file_exists($path_to_file)) {
					# code...
					$param_file_exists = 1;
					if(unlink($path_to_file)) {
						// echo 'deleted successfully';
					}
					else {
						echo 'errors occured';
					}							
				}
				else {
					# code...
					$param_file_exists = 0;				
				}				
			}				

			if ( ! $this->upload->do_upload('file')){
				$res_data = 0;
				$msg      = $this->upload->display_errors();
				$f_file   = "";
			}
			else
			{
				$dataupload = $this->upload->data();
				$res_data   = 1;				
				$msg        = $dataupload['file_name']." berhasil diupload";
				$f_file     = $this->upload->data('file_name');
			}
			if ($res_data == 1) {
				# code...
				if ($f_file != '')$data_store['image'] = $f_file;
	
				$data_store['image']     = $f_file;
				$process     = $this->Allcrud->editData('mr_soal_detail',$data_store,array('id'=>$oid));
				$res_data    = $process;
				$res_data_id = $oid;
				$text_status = $this->Globalrules->check_status_res($res_data,$msg);
			}
			elseif($res_data == 0) {
				# code...
				$text_status = $msg;				
			}
		}

		$res = array
		(
			'status' => $res_data,
			'text'   => $text_status,
			'id'     => $res_data_id
		);
		echo json_encode($res);						
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
		$data_store        = $this->Globalrules->trigger_insert_update($data_sender['crud']);

		if ($data_sender['crud'] == 'insert') {
			# code...
			$data_store['name']            = $data_sender['f_name'];
			$data_store['desc_pembahasan'] = $data_sender['f_desc_pembahasan'];
			$data_store['id_materi']       = $data_sender['id_table'];
			$data_store['id_parent']       = $data_sender['id_parent'];
			$data_store['id_tipe_soal']    = $data_sender['id_tipe'];
			            $res_data          = $this->Allcrud->addData('mr_soal',$data_store);
			            $text_status       = $this->Globalrules->check_status_res($res_data,'Data Soal telah berhasil ditambahkan.');
		} elseif ($data_sender['crud'] == 'update') {
			# code...			
			$data_store['name']            = $data_sender['f_name'];
			$data_store['desc_pembahasan'] = $data_sender['f_desc_pembahasan'];
			$data_store['id_materi']       = $data_sender['id_table'];
			$data_store['id_parent']       = $data_sender['id_parent'];
			$data_store['id_tipe_soal']    = $data_sender['id_tipe'];
			            $res_data          = $this->Allcrud->editData('mr_soal',$data_store,array('id'=>$data_sender['oid']));
			            $text_status       = $this->Globalrules->check_status_res($res_data,'Data Soal telah berhasil diubah.');
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
				// if($table == 'mr_soal')
				// {
				// 	if ($res_data[0]['jawaban'] == true) {
				// 		# code...
				// 		$res_data[0]['jawaban'] = 1;
				// 	}
				// 	else {
				// 		# code...
				// 		$res_data[0]['jawaban'] = 0;
				// 	}
				// }

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

	public function detail($id=NULL,$materi=NULL,$parent=NULL,$tipe=NULL)
	{
		# code...
		$this->Globalrules->session_rule();						
		$data['title']     = 'Pilihan Ganda';
		$data['content']   = 'bank_data/soal/detail';
		$data['list']      = $this->get_data($id,'result_array','mr_soal');
		$data['detail']    = $this->Allcrud->getData('mr_soal_detail',array('id_soal'=>$id));
		$data['list_soal'] = $this->Allcrud->getdata('mr_soal',array('id_materi'=>$materi,'id_parent'=>$parent,'id_tipe_soal'=>$tipe))->result_array();
		$data['id']        = $id;
		$data['parent']    = $parent;
		$this->load->view('templateAdmin',$data);
	}

	public function store_detail_multi()
	{
		# code...
		$res_data    = 0;
		$text_status = '';
		$data_sender = $this->input->post('data_sender');		

		for ($i=0; $i < count($data_sender); $i++) { 
			# code...
			$data_store = $this->Globalrules->trigger_insert_update($data_sender[$i]['crud']);
			$count_data = $this->Allcrud->getData('mr_soal_detail',array('id_soal'=>$data_sender[$i]['oid_header']));
			$data_alp   = $this->Globalrules->data_alphabet(count($count_data->result_array()));			

			if ($data_sender[$i]['f_jawaban'] == 'true') {
				# code...
				$data_store1['jawaban'] = $data_alp;
				$data_store ['jawaban'] = 'false';
				$res_data  = $this->Allcrud->editData('mr_soal',$data_store1,array('id'=>$data_sender[$i]['oid_header']));
				// $res_data  = $this->Allcrud->editData('mr_soal_detail',$data_store,array('id_soal'=>$data_sender[$i]['oid_header']));
			}
			$data_store['choice']    = $data_alp;			
			$data_store['id_soal']   = $data_sender[$i]['oid_header'];
			$data_store['name']      = $data_sender[$i]['f_name'];
			$data_store['jawaban']   = $data_sender[$i]['f_jawaban'];
			$res_data    = $this->Allcrud->addData('mr_soal_detail',$data_store);
			$text_status = $this->Globalrules->check_status_res($res_data,'Data Jawaban telah berhasil ditambahkan.');			
		}

		$res = array
					(
						'status' => $res_data,
						'text'   => $text_status
					);
		echo json_encode($res);		
		
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

		$data_store = $this->Globalrules->trigger_insert_update($data_sender['crud']);
		$count_data = $this->Allcrud->getData('mr_soal_detail',array('id_soal'=>$data_sender['oid_header']));
		$data_alp   = $this->Globalrules->data_alphabet(count($count_data->result_array()));
		if ($data_sender['crud'] == 'insert') {
			# code...			
			if ($data_sender['f_jawaban'] == 'true') {
				# code...
				$data_store1['jawaban'] = $data_alp;
				$data_store ['jawaban'] = 'false';
				$res_data  = $this->Allcrud->editData('mr_soal',$data_store1,array('id'=>$data_sender['oid_header']));
				$res_data  = $this->Allcrud->editData('mr_soal_detail',$data_store,array('id_soal'=>$data_sender['oid_header']));
			}
			$data_store['choice']    = $data_alp;			
			$data_store['id_soal']   = $data_sender['oid_header'];
			$data_store['name']      = $data_sender['f_name'];
			$data_store['jawaban']   = $data_sender['f_jawaban'];
			$res_data    = $this->Allcrud->addData('mr_soal_detail',$data_store);
			$text_status = $this->Globalrules->check_status_res($res_data,'Data Jawaban telah berhasil ditambahkan.');
		} elseif ($data_sender['crud'] == 'update') {
			# code...
			if ($data_sender['f_jawaban'] == 'true') {
				# code...
				$data_store1['jawaban'] = $data_sender['f_key'];
				$data_store ['jawaban'] = 'false';
				$res_data  = $this->Allcrud->editData('mr_soal',$data_store1,array('id'=>$data_sender['oid_header']));
				$res_data  = $this->Allcrud->editData('mr_soal_detail',$data_store,array('id_soal'=>$data_sender['oid_header']));
			}			
			$data_store['name']      = $data_sender['f_name'];
			$data_store['jawaban']   = $data_sender['f_jawaban'];
			$res_data    = $this->Allcrud->editData('mr_soal_detail',$data_store,array('id'=>$data_sender['oid']));
			$text_status = $this->Globalrules->check_status_res($res_data,'Data Jawaban telah berhasil diubah.');
		} elseif ($data_sender['crud'] == 'delete') {
			# code...
			$res_data          = $this->Allcrud->delData('mr_soal_detail',array('id'=>$data_sender['oid']));
			$text_status       = $this->Globalrules->check_status_res($res_data,'Data Soal telah berhasil dihapus.');			
		}

		$res = array
					(
						'status' => $res_data,
						'text'   => $text_status
					);
		echo json_encode($res);		
	}
	
	public function materi()
	{
		$this->Globalrules->session_rule();						
		$data['title']   = 'Data Materi Bimbingan Belajar';
		$data['content'] = 'bank_data/materi/index';
		$data['list']    = $this->Allcrud->getData('mr_materi',array('id_parent'=>NULL));
		$data['tipe']   = $this->Allcrud->listData('lt_tipe_bimbingan_belajar');		
		$this->load->view('templateAdmin',$data);
	}
	
	public function store_materi($arg=NULL,$oid=NULL)
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
			$data_store['name']      = $data_sender['f_name'];
			$data_store['id_parent'] = $data_sender['f_parent'];
			            $res_data    = $this->Allcrud->addData('mr_materi',$data_store);
			            $text_status = $this->Globalrules->check_status_res($res_data,'Data Materi telah berhasil ditambahkan.');
		} elseif ($data_sender['crud'] == 'update') {
			# code...
			$data_store['name']      = $data_sender['f_name'];
			$data_store['id_parent'] = $data_sender['f_parent'];
			            $res_data          = $this->Allcrud->editData('mr_materi',$data_store,array('id'=>$data_sender['oid']));
			            $text_status       = $this->Globalrules->check_status_res($res_data,'Data Materi telah berhasil diubah.');			
		} elseif ($data_sender['crud'] == 'delete') {
			# code...
			$res_data          = $this->Allcrud->delData('mr_materi',array('id'=>$data_sender['oid']));
			$text_status       = $this->Globalrules->check_status_res($res_data,'Data Materi telah berhasil dihapus.');			
		}

		$res = array
					(
						'status' => $res_data,
						'text'   => $text_status
					);
		echo json_encode($res);		
	}
	
	public function pre_test_and_quiz($id=NULL,$parent=NULL)
	{
		$this->Globalrules->session_rule();						
		$data['title']   = 'Data Materi';
		$data['content'] = 'bank_data/materi/detail';
		$data['materi'] = $this->Allcrud->getData('mr_materi',array('id'=>$id));
		$data['parent'] = $this->Allcrud->getData('mr_materi',array('id'=>$parent));
		$data['tipe']   = $this->Allcrud->listData('lt_tipe_bimbingan_belajar');
		$this->load->view('templateAdmin',$data);
	}
}