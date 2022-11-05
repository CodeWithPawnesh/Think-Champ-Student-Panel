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
		$data['page'] = "page";
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
			if($_FILES['profile_picture']['size']>0)
			{
				$config['upload_path'] = './assets/images/user_profile/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['encrypt_name'] = true;
				$config['max_size'] = 5000;
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
		$this->load->student_panel('leave');
	}
	public function class()
	{
		$this->load->student_panel('class');
	}
}
