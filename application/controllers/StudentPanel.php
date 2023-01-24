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
		$user_info = $this->session->userdata('user_data');
		$student_id = $user_info['student_id'];
		$tdDate = date("y-m-d");
		if(isset($_GET['id']) && isset($_GET['cl_l'])){
            $class_id=$_GET['id'];
            $class_link = $_GET['cl_l'];
			$class_data = $this->SPM->get_student_attened($class_id);
			$studentIds = $class_data[0]['student_ids'];
			$live_id = $class_data[0]['live_id'];
			$redirect = $class_link;
			if(!empty($studentIds)){
				$studentIdsArr = explode(",",$studentIds);
				if(!in_array($student_id,$studentIdsArr)){
				$newStudentIds = $studentIds.",".$student_id;
				$data = array("student_ids"=>$newStudentIds);
				$where = array(
					"class_id"=>$class_id,
					"class_date"=>$tdDate
				);
				$pg_class_data ="";
				if($_GET['type']==2){
					$pg_class_data = array(
						"student_id"=>$student_id,
						"marks_obtained"=>0,
						"status"=>0,
						"live_class_id"=>$live_id
					);
				}
				$this->SPM->insert_class_history($data,$where,$redirect,$pg_class_data);
				}else{
					redirect($redirect);
				}
			}else{
				$newStudentIds = $student_id;
				$data = array("student_ids"=>$newStudentIds);
				$where = array(
					"class_id"=>$class_id,
					"class_date"=>$tdDate
				);
				$pg_class_data ="";
				if($_GET['type']==2){
					$pg_class_data = array(
						"student_id"=>$student_id,
						"marks_obtained"=>0,
						"status"=>0,
						"live_class_id"=>$live_id
					);
				}
				$this->SPM->insert_class_history($data,$where,$redirect,$pg_class_data);
			}
			
            
        }
		//Get All Course Classes And Details
		// $data['course_data'] = $this->SPM->get_coure_data($course_id);
		// $data['course_data'] = $data['course_data'][0];
		$data['t_live_class_data'] = $this->SPM->get_live_class_data($student_id);
		$data['p_live_class_data'] = $this->SPM->get_p_live_class_data($student_id);
		$this->load->student_panel('dashboard',$data);
	}
	public function profile()
	{
		$user_info = $this->session->userdata('user_data');
		$student_id = $user_info['student_id'];
		if(isset($_POST['submit'])){
			$name = $_POST['name'];
			$email = $_POST['email'];
			$number = $_POST['phone'];
			$address = $_POST['address'];
			$collage = $_POST['collage'];
			$c_year = $_POST['c_year'];
			$profile_picture ="";
			if($_FILES['profile_picture']['size']>0)
			{
				$config['upload_path'] = './assets/images/user_profile/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['encrypt_name'] = true;
				$this->load->library('upload',$config);
				if($this->upload->do_upload('profile_picture'))
				{
				$uploaddata=$this->upload->data();
				$profile_picture =  $uploaddata['file_name'];
				}
		    }else{
				$profile_picture = $_POST['profile'];
			}
			$data = array(
				"student_name"=>$name,
				"email"=>$email,
				"phone"=>$number,
				"address"=>$address,
				"collage"=>$collage,
				"year"=>$c_year,
				"profile"=>$profile_picture
			);
			$update_profile = $this->SPM->update_profile($data,$student_id);
			if($update_profile == true){
				$data['message']="Profile Updated successfully !";
			}else{
				$data['err'] = "Somthing Went Wrong !";
			}
		}
		$group_id = $user_info['group_id'];
		$data['profile'] = $this->SPM->get_student_data($student_id);
		$data['profile'] = $data['profile'][0];
		$data['group_data'] = $this->SPM->get_group_data($group_id);
		$this->load->student_panel('profile',$data);
	}
	public function leave()
	{
		$user_info = $this->session->userdata('user_data');
		$student_id = $user_info['student_id'];
		$user_id = $user_info['user_id'];
		$data['leave_data'] = $this->SPM->get_student_leave($user_id);
		$this->load->student_panel('leave',$data);
	}
	public function add_leave(){
		$data['page']="page";
		$user_info = $this->session->userdata('user_data');
        $user_id = $user_info['user_id'];
        $data['page']="leave";
        if(isset($_POST['submit'])){
            $start_date = $_POST['start_date'];
            $start_date = strtotime($start_date);
            $reason = $_POST['reason'];
            if(isset($_POST['end_date'])){
                $end_date = $_POST['end_date'];
                $end_date = strtotime($_POST['end_date']);
            }
            else{
                $end_date="";
            }
            $data = array(
                "leave_start_date"=>$start_date,
                "leave_end_date"=>$end_date,
                "reason"=>$reason,
                "status"=>'0',
                "user_id"=>$user_id,
                "user"=>'2'
            );
			$this->SPM->add_leave($data);
		}

		$this->load->student_panel('add_leave',$data);
	}
	public function my_course(){
		$user_info = $this->session->userdata('user_data');
		$student_id = $user_info['student_id'];
		$data['course_data'] = $this->SPM->get_std_course_data($student_id);
		$this->load->student_panel('my_course',$data);
	}
	public function class()
	{
		$user_info = $this->session->userdata('user_data');
		$student_id = $user_info['student_id'];
		$data['page'] = "class";
		$data['requested_live_class_id'] = $this->SPM->get_requested_live_class_id($student_id);
		if(isset($_GET['id']) && $_GET['mode']=="Theory"){
			$course_id =base64_decode($_GET['id']);
		$data['class_data'] = $this->SPM->get_classes($student_id,$course_id );
		}
		if(isset($_GET['id']) && $_GET['mode']=="Programming"){
			$course_id =base64_decode($_GET['id']);
		$data['class_data'] = $this->SPM->get_p_classes($student_id,$course_id);
		}
		$this->load->student_panel('class',$data);
	}
	public function today_classes(){
		$user_info = $this->session->userdata('user_data');
		$student_id = $user_info['student_id'];
		if($_POST['class_id']){
			$class_id = $_POST['class_id'];
		$class_data = $this->SPM->today_class($class_id);
		if(!empty($class_data)){
		echo $class_data[0]['class_id'];
		}else{
			echo "0";
		}
		}
	}
	public function class_video(){
		$user_info = $this->session->userdata('user_data');
		$student_id = $user_info['student_id'];
		$data['page'] = "class";
		$b_class_video = $this->SPM->get_b_class_video($student_id);
		$g_class_video = $this->SPM->get_g_class_video($student_id);
		$class_video ="";
		if(!empty($b_class_video) && !empty($g_class_video)){
			$class_video = array_merge($b_class_video,$g_class_video);
		}
		if(empty($b_class_video)){
			$class_video = $g_class_video;
		}
		if(empty($g_class_video)){
			$class_video = $b_class_video;
		}
		if(!empty($class_video)){
		function date_compare($element1, $element2) {
			$datetime1 = strtotime($element1['given_at']);
			$datetime2 = strtotime($element2['given_at']);
			   return $datetime1 - $datetime2;
			   } 
			// Sort the array 
		   usort($class_video, 'date_compare');
		}
		$data['class_video']= $class_video;
		$this->load->student_panel('class_video',$data);
	}
	public function request_video(){
		$user_info = $this->session->userdata('user_data');
		$student_id = $user_info['student_id'];
		if(isset($_POST['submit'])){
			$class_id = base64_decode($_POST['id']);
			$mode = $_POST['mode'];
			$live_id = $_POST['live_id'];
			$batch_id = $_POST['batch_id'];
			$type=1;
			if(isset($_POST['group_id'])){
				$group_id = $_POST['group_id'];
				$type = 2;
			}else{
				$group_id="";
			}
			$where = array("live_id"=>$live_id);
			$liveClassData = $this->SPM->get_liveClass_history($where);
			if(!empty($liveClassData)){
				$requestedByIds =  $liveClassData[0]['requested_by'];
				$newRequestedByIds = $requestedByIds.",".$student_id;
				$data = array("requested_by"=>$newRequestedByIds);
				$where = $liveClassData[0]['class_video_id'];
				$result = $this->SPM->update_video_request($data,$where);
				if($result==true){
					redirect("Live-Class?id=".base64_encode($class_id)."&mode=".$mode);
				}
			}else{
				$data = array(
					"live_id"=>$live_id,
					"batch_id"=>$batch_id,
					"group_id"=>$group_id,
					"type"=>$type,
					"requested_by"=>$student_id,
					"status"=>0
				);
				$result = $this->SPM->insert_video_request($data);
				if($result==true){
					redirect("Live-Class?id=".base64_encode($class_id)."&mode=".$mode);
				}
			}
		}
	}
}