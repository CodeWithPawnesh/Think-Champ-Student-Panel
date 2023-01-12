<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Student_model','SM');
    }
	public function index()
	{
		$data['course_data'] = $this->SM->get_course();
		$this->load->web_temp('courses',$data);
	}
	public function CourseDetail(){
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$id = base64_decode($id);
			$data['course_detail'] = $this->SM->get_course_detail($id);
			$data['course_detail'] = $data['course_detail'][0];
			$data['batch_detail'] = $this->SM->get_batch_data($id);
			$slots = 0;
			foreach($data['batch_detail'] as $b_d){
				$slots = $slots + $b_d['slots'];
			}
			$enroll_count = $this->SM->enroll_count($id);
			$data['remmaning_slot'] = $slots - $enroll_count[0]['cc'];
		}
		
		$this->load->web_temp('course_detail',$data);
	}
	public function courseEnrollment(){
		$data['page']="page";
		if(isset($_GET['id'])){
			$id = $_GET['id'];
			$id = base64_decode($id);
			$data['course_detail'] = $this->SM->get_course_detail($id);
			$data['course_detail'] = $data['course_detail'][0];
			$data['batch_detail'] = $this->SM->get_batch_data($id);
		}
		$this->load->web_temp('course_enrollment_form',$data);
	}
}
