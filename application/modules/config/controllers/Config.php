<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once APPPATH."/third_party/PHPExcel.php";
class Config extends CI_Controller {

	public function __construct () {
		parent::__construct();
		$this->load->model ('mconfig', '', TRUE);
		$this->load->library('Excel');
		$this->load->library('image_lib');
		$this->load->library('upload');
		date_default_timezone_set('Asia/Jakarta');
		$this->Globalrules->session_rule();		
	}

	public function management_menu_submenu($id=NULL)
	{
		if($id==NULL)$id=1;
		$this->root_menu(0,$id);
	}

	public function submenu($id=NULL)
	{
		$this->root_menu($id);
	}	

	public function root_menu($id=NULL,$arg=NULL)
	{
		# code...
		
		$data['title']    = 'Management Menu '.$this->get_header($id);
		$data['subtitle'] = '';
		$data['list']     = $this->mconfig->get_menu($id,$arg);
		$data['parent']   = $this->mconfig->get_menu(0);
		$data['flag']     = $this->Allcrud->listData('config_menu_flag')->result_array();
		$data['role']     = $this->Allcrud->listData('user_role')->result_array();
		$data['content']  = 'config/management_menu/home';
		$this->load->view('templateAdmin',$data);		
	}

	public function get_header($id)
	{
		# code...
		$name = "";
		if ($id == 0) {
			# code...
			$name = "";
		}
		else {
			# code...
			$header = $this->Allcrud->getData('config_menu',array('id_menu'=>$id))->result_array();
			if ($header != array()) {
				# code...
				$name = "<i class='fa fa-angle-double-right'></i> ".$header[0]['nama_menu'];
			}
		}

		return $name;
	}

	public function add_menu($id=NULL)
	{
		# code...
		if ($id == NULL) {
			# code...
			$id = 0;
		}
		$data_sender = $this->input->post('data_sender');
		$data        = array
						(
							'nama_menu' => $data_sender['nama_menu'],
							'url_pages' => $data_sender['url_pages'],
							'icon'      => $data_sender['icon'],
							'flag'      => $data_sender['flag'],
							'prioritas' => $data_sender['prioritas'],
							'user_role' => $data_sender['role_user'],
							'id_parent' => $id
						);
		$res_data    = $this->Allcrud->addData('config_menu',$data);
		$text_status = $this->Globalrules->check_status_res($res_data,'Menu telah ditambahkan');
		$res         = array
						(
							'status' => $res_data,
							'text'   => $text_status
						);
		echo json_encode($res);
	}

	public function get_active($arg,$param)
	{
		# code...
		$data        = array
						(
							'flag'      => $param
						);
		$res_data    = $this->Allcrud->editData('config_menu',$data,array('id_menu' => $arg));
		$text_status = $this->Globalrules->check_status_res($res_data,'Status menu telah dirubah');
		$res         = array
						(
							'status' => $res_data,
							'text'   => $text_status
						);
		echo json_encode($res);		
	}

	public function delete_menu($id)
	{
		# code...
		$res_data    = $this->Allcrud->delData('config_menu',array('id_menu' => $id));
		$text_status = $this->Globalrules->check_status_res($res_data,'Menu telah dihapus');
		$res         = array
						(
							'status' => $res_data,
							'text'   => $text_status
						);
		echo json_encode($res);				
	}

	public function get_menu($id)
	{
		# code...
		$flag = array('id_menu'=>$id);
		$q    = $this->Allcrud->getData('config_menu',$flag)->result_array();
		echo json_encode($q);		
	}

	public function edit_menu($oid)
	{
		# code...
		$data_sender = $this->input->post('data_sender');
		$data        = array
						(
							'nama_menu' => $data_sender['nama_menu'],
							'url_pages' => $data_sender['url_pages'],
							'icon'      => $data_sender['icon'],
							'prioritas' => $data_sender['prioritas'],
							'user_role' => $data_sender['role_user'],
							'flag'      => $data_sender['flag'],
							'id_parent' => $data_sender['id_parent']
						);
		$res_data    = $this->Allcrud->editData('config_menu',$data,array('id_menu' => $oid));						
		$text_status = $this->Globalrules->check_status_res($res_data,'Menu telah diubah');
		$res         = array
						(
							'status' => $res_data,
							'text'   => $text_status
						);
		echo json_encode($res);		
	}

	/**************************************************************/

	public function akses($id_role)
	{
		$data['id_role']  = $id_role;
		$data['title']    = 'Hak akses';
		$data['content']  = 'auth/akses/data_akses';
		$data['role']     = $this->Allcrud->listData('user_role');
		$sub              = $this->Allcrud->getData('user_role',array('id_role'=>$id_role))->row();

		if ($sub != "") {
			# code...
			$data['subtitle'] = $sub->nama_role;
		}
		else
		{
			$data['subtitle'] = "";			
		}
		$this->load->view('templateAdmin',$data);
	}
	
	/**************************************************************/
	
	public function role()
	{					
		$data['title']   = 'Generate Menu';
		$data['content'] = 'auth/role/data_role';
		$data['role']    = $this->Allcrud->listData('user_role');
		$this->load->view('templateAdmin',$data);
	}

	public function addrole()
	{				
		$role = $this->input->post('role');
		$ket  = $this->input->post('ket');
		$add  = array('nama_role' => modif_kata($role),'keterangan'=>$ket);
		$this->Allcrud->addData('user_role',$add);
	}
	
	public function ajaxrole()
	{					
		$data['content'] = 'auth/role/data_role';
		$data['role']    = $this->Allcrud->listData('user_role');
		$this->load->view('auth/role/ajaxrole',$data);
	}
	
	public function delrole($id)
	{					
		$flag = array('id_role' => $id);
		$this->Allcrud->delData('user_role',$flag);
	}
	
	public function editrole($id)
	{					
		$flag = array('id_role'=>$id);
		$q    = $this->Allcrud->getData('user_role',$flag)->row();
		echo json_encode($q);
	}
	
	public function peditrole()
	{					
		$flag = array('id_role'=>$this->input->post('oid'));
		$edit = array(
			'nama_role'  => $this->input->post('nrole'),
			'keterangan' => $this->input->post('nket')
		);
		$this->Allcrud->editData('user_role',$edit,$flag);
	}


	public function generate($id)
	{					
		$flag = array('flag' => 1);
		$menu = $this->Allcrud->getData('config_menu',$flag);
		foreach ($menu->result() as $row)
		{
			$cari = $this->Allcrud->getData(
												'config_menu_akses',
												array(
														'id_menu'=>$row->id_menu,
														'id_role'=>$id
													)
											)->num_rows();
			if ($cari == 0)
			{
				$add = array ('id_menu' => $row->id_menu,'id_role' => $id);
				$this->Allcrud->addData('config_menu_akses',$add);
			}
		}
	}
	
	public function create()
	{
						
		$flag = array ('id_akses' => $this->input->post('id_akses'));
		
		if($this->input->post('nilai') == 0)
		{
			$this->Allcrud->editData(
										'config_menu_akses',
										array('buat'=>1),
										$flag
									);
		}
		else
		{
			$this->Allcrud->editData(
										'config_menu_akses',
										array('buat'=>0),
										$flag
									);
		}
		$data['id_role'] = $this->input->post('role');
		$this->load->view('auth/akses/ajaxAkses',$data);
	}
	
	public function read(){
						
		$flag = array ('id_akses' => $this->input->post('id_akses'));
		$q    = $this->Allcrud->listData('user_role');

		if($this->input->post('nilai') == 0)
		{
			$this->Allcrud->editData(
										'config_menu_akses',
										array('baca'=>1),
										$flag
									);
		}
		else
		{
			$this->Allcrud->editData('config_menu_akses',array('baca'=>0),$flag);
		}
		$data['id_role'] = $this->input->post('role');
		$this->load->view('auth/akses/ajaxAkses',$data);
		
	}

	public function update()
	{
						
		$flag = array (
						'id_akses' => $this->input->post('id_akses')
					);

		if($this->input->post('nilai') == 0)
		{
			$this->Allcrud->editData(
										'config_menu_akses',
										array('ubah'=>1),
										$flag	
									);
		}
		else
		{
			$this->Allcrud->editData(
										'config_menu_akses',
										array('ubah'=>0),
										$flag
									);
		}
		$data['id_role'] = $this->input->post('role');
		$this->load->view('auth/akses/ajaxAkses',$data);
	}
	
	public function delet()
	{
						
		$flag = array (
						'id_akses' => $this->input->post('id_akses')
					);
		
		if($this->input->post('nilai') == 0)
		{
			$this->Allcrud->editData(
										'config_menu_akses',
										array('hapus'=>1),
										$flag
									);
		}
		else
		{
			$this->Allcrud->editData(
										'config_menu_akses',
										array('hapus'=>0),
										$flag
									);
		}
		$data['id_role'] = $this->input->post('role');
		$this->load->view('auth/akses/ajaxAkses',$data);
	}	
	
}
