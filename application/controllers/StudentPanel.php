<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentPanel extends CI_Controller {
	public function index()
	{
		$this->load->view('web/student_panel/dashboard');
	}
}
