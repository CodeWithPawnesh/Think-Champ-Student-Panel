<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentPanel extends CI_Controller {
	function __construct()
    {
	parent::__construct();
		$this->load->helper('form', 'url');
		$this->load->model('Student_model', 'SPM');
		$this->load->model('Auth_model', 'AM');

		$user_info = $this->session->userdata('user_data');
		if (!$this->session->userdata('login_status')) {
			redirect('auth');
		}
	}
	public function index()
	{
		$this->load->student_panel('dashboard');
	}
	public function profile()
	{
		$this->load->student_panel('profile');
	}
	public function leave()
	{
		$this->load->student_panel('leave');
	}
	public function class()
	{
		$this->load->student_panel('class');
	}
}
