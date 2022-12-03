<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz extends CI_Controller {
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
		$user_info = $this->session->userdata('user_data');
		$user_id = $user_info['user_id'];
		$student_id = $user_info['student_id'];
		$batch_id = $user_info['batch_id'];
		$group_id = $user_info['group_id'];
		$batch_quiz = $this->SPM->get_batch_quiz($batch_id);
		$group_quiz = $this->SPM->get_group_quiz($group_id);
		$quiz_data = "";
		if(!empty($batch_quiz) && !empty($group_quiz)){
		$quiz_data = array_merge($batch_quiz,$group_quiz);
		}
		if(empty($batch_quiz) && !empty($group_quiz)){
			$quiz_data = $group_quiz;
		}
		if(!empty($batch_quiz) && empty($group_quiz)){
			$quiz_data = $batch_quiz;
		}
		if(!empty($quiz_data)){
		function date_compare($element1, $element2) {
			$datetime1 = $element1['quiz_start_date'];
			$datetime2 = $element2['quiz_start_date'];
			   return $datetime1 - $datetime2;
			   } 
	  
			// Sort the array 
		   usort($quiz_data, 'date_compare');
			}

		   $data['quiz_data'] = $quiz_data;
		$this->load->student_panel('quiz',$data);
	}
}