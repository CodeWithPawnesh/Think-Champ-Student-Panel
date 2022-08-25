<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends CI_Controller {

	public function index()
	{
		$this->load->web_temp('courses');
	}
	public function CourseDetail(){

		$this->load->web_temp('course_detail');

	}
}
