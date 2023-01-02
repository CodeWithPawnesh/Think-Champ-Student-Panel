<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quiz extends CI_Controller {
	function __construct()
    {
	parent::__construct();
		$this->load->helper('form', 'url');
		$this->load->model('Student_model', 'SPM');
		$this->load->model('Auth_model', 'AM');
		$this->load->model('Quiz_model','QM');

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
		$data['sub_quiz'] = $this->SPM->get_sub_quiz($student_id);
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
	public function enter(){
		if(isset($_POST)){
			$quiz_id = $_POST['quiz_id'];
			$student_id = $_POST['student_id'];
			$data = array(
				"quiz_id"=>$quiz_id,
				"student_id"=>$student_id
			);
			$result = $this->QM->startQuiz($data);
			if($result == true){
				echo "1";
			}else{
				echo "0";
			}
		}
	}
	public function quiz_start(){
		$data['page'] = "quiz_start";
		if(isset($_GET['id'])){
			$quiz_id = base64_decode($_GET['id']);
		$data['quiz_data'] = $this->QM->get_quiz($quiz_id);
		$data['quiz_data'] = $data['quiz_data'][0];
		$data['quiz_questions'] = $this->QM->get_quiz_qus($quiz_id);
		$mSum = 0;
		foreach($data['quiz_questions'] as $q){
			$mSum = $mSum + $q['marks'];
		}
		$data['msum'] = $mSum;
		}
		$this->load->student_panel('quiz_start',$data);
	}
	public function submit(){
		$user_info = $this->session->userdata('user_data');
		$user_id = $user_info['user_id'];
		$student_id = $user_info['student_id'];
			$currDate = date("y-m-d h:i");
			$obtainedMarks = 0;
			$quiz_id = $_POST['quiz_id'];
			$quiz_questions = $this->QM->get_quiz_qus($quiz_id);
			foreach($quiz_questions as $qq){
				if(isset($_POST['qst'.$qq['question_id']])){
					$answers[] =  $_POST['qst'.$qq['question_id']];
					$ansData = $_POST['qst'.$qq['question_id']];
					$ansArr = explode(",",$ansData);
					$subOpt = $ansArr[0];
					$subQId = $ansArr[1];
					if($subOpt == $qq['correct_options']){
						$obtainedMarks = $obtainedMarks + $qq['marks'];
					}

				}
			}
			$answers = json_encode($answers);
			$data = array(
				"question_answers"=>$answers,
				"marks_obtained"=>$obtainedMarks,
				"submited_at"=>$currDate
			);
			$where = array(
				"student_id"=>$student_id,
				"quiz_id"=>$quiz_id
			);
			$this->QM->submitQuiz($data,$where);
	}
	public function analytics(){
		$user_info = $this->session->userdata('user_data');
		$user_id = $user_info['user_id'];
		$student_id = $user_info['student_id'];
		if(isset($_GET['quiz_id'])){
			$quiz_id = $_GET['quiz_id'];
			$quiz_id = base64_decode($quiz_id);
		$data['quiz_result']= $this->QM->quiz_result($quiz_id,$student_id);
		$data['quiz_result'] = $data['quiz_result'][0];
		$data['quiz_questions'] = $this->QM->get_quiz_qus($quiz_id);
		$mSum = 0;
		foreach($data['quiz_questions'] as $q){
			$mSum = $mSum + $q['marks'];
		}
		$data['msum'] = $mSum;
		}
		$this->load->view("web/student_panel/quiz_analytics",$data);
	}
}