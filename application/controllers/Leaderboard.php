<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leaderboard extends CI_Controller {
	function __construct()
    {
	parent::__construct();
		$this->load->helper('form', 'url');
		$this->load->model('Student_model', 'SPM');
		$this->load->model('Auth_model', 'AM');
        $this->load->model('Leaderboard_model', 'LM');

		$user_info = $this->session->userdata('user_data');
		if (!$this->session->userdata('login_status')) {
			redirect('auth');
		}
	}
    public function index(){
        $get_quiz_marks = $this->LM->get_quiz_marks();
        $get_assignment_marks = $this->LM->get_assignment_marks();
        $get_pq_marks = $this->LM->get_pq_marks();
        $get_pc_marks = $this->LM->get_pc_marks();
        $marks = $this->LM->marks();
        print_r($marks);
    }
}