<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	public function __construct () {
		parent::__construct();
		$this->load->model('Mreport', '', TRUE);
	}

	public function report_1()
	{
		$this->Globalrules->session_rule();						
		$data['title']       = 'Report 1';
		$data['content']     = 'report/report_1/index';
		$this->load->view('templateAdmin',$data);		
	}

	public function filter_report_1()
	{
		# code...
		$data_sender  = $this->input->post('data_sender');
		$month        = ($data_sender['month'] < 10) ? '0'.$data_sender['month'] : $data_sender['month'];
		$date         = $data_sender['year'].'-'.$month; 		
		$data['list'] = $this->Mreport->get_report_1($date);
		$this->load->view('report/report_1/filter',$data);		
	}

	public function report_2()
	{
		$this->Globalrules->session_rule();						
		$data['title']       = 'Report 2';
		$data['content']     = 'report/report_2/index';				
		$this->load->view('templateAdmin',$data);		
	}
	
	public function filter_report_2()
	{
		# code...
		$data_sender  = $this->input->post('data_sender');
		$month        = ($data_sender['month'] < 10) ? '0'.$data_sender['month'] : $data_sender['month'];
		$date         = $data_sender['year'].'-'.$month; 		
		$data['list'] = $this->Mreport->get_report_2_main($date);
		$this->load->view('report/report_2/filter',$data);		
	}	
}
