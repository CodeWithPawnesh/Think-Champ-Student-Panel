<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Internship extends CI_Controller {
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
    public function index(){
        $user_info = $this->session->userdata('user_data');
		$user_id = $user_info['user_id'];
		$student_id = $user_info['student_id'];
		$batch_id = $user_info['batch_id'];
		if($user_info['group_id']!=0){
		$group_id = $user_info['group_id'];
		}else{
			$group_id = "null";
		}
        $data['internship_data'] = $this->SPM->get_internship_data($student_id);
        if(isset($_POST['accept'])){
            $int_id = $_POST['int_id'];
            $status = array("status"=>"2");
            $this->SPM->update_int_status($status,$int_id);
        }
        if(isset($_POST['reject'])){

        }
        $this->load->student_panel('internship',$data);
    }
}