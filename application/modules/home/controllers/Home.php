<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function __construct ()
	{
		parent::__construct();
		$this->load->model ('Mhome', '', TRUE);
		$this->load->model ('mlogin', '', TRUE);
		date_default_timezone_set('Asia/Jakarta');
	}

	public function index()
	{
		redirect('home/main');
	}

	public function main()
	{
		// print_r($this->session->userdata('session_role'));die();	
		ini_set('date.timezone', 'Asia/Jakarta');
		date_default_timezone_set('Asia/Jakarta');
		if($this->session->userdata('session_login') == "")
		{
			//get user data
			$this->load->view('home',NULL);			
		}		
		else {
			# code...
			if ($this->session->userdata('session_role') == 1 ||  $this->session->userdata('session_role') == 2) {
				# code...
				redirect('dashboard/home');								

			}
			else {
				# code...
				redirect('auth');							
			}

		}

	}
}
