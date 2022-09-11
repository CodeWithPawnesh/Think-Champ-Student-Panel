<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StudentPanel extends CI_Controller {
	public function index()
	{
		$this->load->student_panel('dashboard');
	}
}
