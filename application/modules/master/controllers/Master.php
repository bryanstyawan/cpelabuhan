<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank_data extends CI_Controller {

	public function __construct () {
		parent::__construct();
		$this->load->model ('Mbank_data', '', TRUE);
	}

	public function index()
	{
		if(!$this->session->userdata('session_login')){
			redirect('admin/Admin');
		}
		$this->load->view('templateAdmin');
	}

	public function jetty()
	{
		# code...
		redirect('master/jetty');
	}

	public function video()
	{
		# code...
		redirect('bank_data/video');
	}	

	public function buku()
	{
		# code...
		redirect('bank_data/buku');
	}		

	public function user()
	{
		# code...
		redirect('bank_data/user');
	}
}
