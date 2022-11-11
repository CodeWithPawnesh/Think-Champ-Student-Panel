<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assignment extends CI_Controller {
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
		$batch_assignment = $this->SPM->get_batch_assignment($batch_id);
		$group_assignment = $this->SPM->get_group_assignment($batch_id,$group_id);
		$data['submited_assignment'] = $this->SPM->get_submited_assignment($student_id);
		if(!empty($batch_assignment) && !empty($group_assignment)){
			$assignment_data = array_merge($batch_assignment,$group_assignment);
		}
		if(empty($batch_assignment)){
			$assignment_data = $group_assignment;
		}
		if(empty($group_assignment)){
			$assignment_data = $batch_assignment;
		}
		function date_compare($element1, $element2) {
			$datetime1 = $element1['start_date'];
			$datetime2 = $element2['start_date'];
			   return $datetime1 - $datetime2;
			   } 
	  
			// Sort the array 
		   usort($assignment_data, 'date_compare');
		   $data['assignment_data'] = $assignment_data;
		$this->load->student_panel('assignment',$data);
	}
	public function submit_assignment(){
		$user_info = $this->session->userdata('user_data');
		$user_id = $user_info['user_id'];
		$student_id = $user_info['student_id'];
		$date = date('y-m-d');
		$submited_at = strtotime($date);
		if(isset($_POST['submit'])){
			if($_FILES['assignment']['size']>0)
			{
				$config['upload_path'] = './assets/assignment_data/';
				$config['allowed_types'] = 'zip';
				$config['encrypt_name'] = true;
				$this->load->library('upload',$config);
				if($this->upload->do_upload('assignment'))
				{
				$uploaddata=$this->upload->data();
				$assignment =  $uploaddata['file_name'];
				}
		    }
			$ass_id = $_POST['assisment_id'];
			$data = array(
				"assignment_id"=>$ass_id,
				"student_id"=>$student_id,
				"file"=>$assignment,
				"submited_at"=>$submited_at,
				"status"=>"1"
			);
			$this->SPM->submit_assignmet($data);
		}
	}
}