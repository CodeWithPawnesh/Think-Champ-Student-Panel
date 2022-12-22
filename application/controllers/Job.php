<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Job extends CI_Controller {
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
        $data['page']="";
        $user_info = $this->session->userdata('user_data');
		$user_id = $user_info['user_id'];
		$student_id = $user_info['student_id'];
		$batch_id = $user_info['batch_id'];
		if($user_info['group_id']!=0){
		$group_id = $user_info['group_id'];
		}else{
			$group_id = "null";
		}
        $data['job_data'] = $this->SPM->get_job_data($batch_id);
        $this->load->student_panel('job',$data);
    }
}
?>