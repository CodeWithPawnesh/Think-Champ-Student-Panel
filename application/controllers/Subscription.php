<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscription extends CI_Controller {
    function __construct()
	{
		parent::__construct();
		$this->load->model('Student_model','SM');
        $this->load->model('Subscription_model','SBM');
    }
	public function index()
	{
		if(isset($_POST['submit'])){
			$flag = 1;
			$course_id = $_POST['course_id'];
			$data['course_detail'] = $this->SM->get_course_detail($course_id);
			$data['course_detail'] = $data['course_detail'][0];
			$data['batch_detail'] = $this->SM->get_batch_data($course_id);
			$name = $_POST['name'];
			$email = $_POST['email'];
			$number = $_POST['number'];
			$pass = $_POST['pass'];
			if(isset($_POST['batch_id'])){
			$batch_id = $_POST['batch_id'];
			}else{
				$batch_id = "";
			}
			$student_ty = $_POST['student_ty'];
			$student_ab = $_POST['student_ab'];
			if(isset($_POST['gender'])){
			$gender = $_POST['gender'];
			}else{
				$gender="";
			}
			$c_pass = $_POST['c_pass'];
			$row = $this->SM->get_student_row($email);
			if($row>0){
			$data["error_mess"][] = "E-mail Is Already Registered!";
			$flag = 0;
			}
			if(!isset($_POST['batch_id'])){
				$data["error_mess"][]="Please Select A Batch";
				$flag=0;
			}
			if($pass != $c_pass){
				$data["error_mess"][]=" Confirmation Password Is Not Matching";
				$flag=0;
			}
			if($flag == 1){
                $pass_o = md5($pass);
                $date = date("Y-m-d h:i:sa");
                $created_ts = strtotime($date);
				$user_data = array(
                    "email"=>$email,
                    "password"=>$pass,
                    "password_o"=>$pass_o,
                    "access_level"=>'3',
                    "created_ts"=>$created_ts
                );
                $student_data = array(
                    "student_name"=>$name,
                    "email"=>$email,
                    "phone"=>$number,
                    "collage"=>$student_ab,
                    "course_id"=>$course_id,
                    "batch_id"=>$batch_id,
                    "created_at"=>$created_ts,
                    "status"=>'1'
                );
                $this->SBM->insert_student($user_data,$student_data);
			}
		    if($flag==0){
                $this->load->web_temp('course_detail',$data);
            }
		}
	}
}