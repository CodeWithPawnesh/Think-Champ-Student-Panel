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
		if(isset($_GET['id']) && isset($_GET['cl_l'])){
            $class_id=$_GET['id'];
            $class_link = $_GET['cl_l'];
            $this->CM->insert_class_history($class_id,$class_link,$student_id);
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
	public function class()
	{
		$user_info = $this->session->userdata('user_data');
		$student_id = $user_info['student_id'];
		$data['page'] = "class";
		$data['class_data'] = $this->SPM->get_classes($student_id);
		$this->load->student_panel('class',$data);
	}
}
