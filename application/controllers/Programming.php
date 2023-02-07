<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Programming extends CI_Controller {
	function __construct()
    {
	parent::__construct();
		$this->load->helper('form', 'url');
		$this->load->model('Student_model', 'SPM');
        $this->load->model('Programming_model', 'PM');
		$this->load->model('Auth_model', 'AM');

		$user_info = $this->session->userdata('user_data');
		if (!$this->session->userdata('login_status')) {
			redirect('auth');
		}
	}
    public function challenges(){
        $user_info = $this->session->userdata('user_data');
		$user_id = $user_info['user_id'];
		$student_id = $user_info['student_id'];
        $data['page'] = "page";
		$data['programming_challenges'] = $this->PM->get_challenges();
       
        for($i=0;$i<sizeof($data['programming_challenges']); $i++){
           $pq_id =  $data['programming_challenges'][$i]['pq_id'];
           $cc = $this->PM->get_challenge_count($pq_id);
            $data['programming_challenges'][$i]['cc'] = $cc;

        }
        for($i=0;$i<sizeof($data['programming_challenges']); $i++){
            $pq_id =  $data['programming_challenges'][$i]['pq_id'];
            $ac = $this->PM->get_challenge_att_count($pq_id,$student_id);
            $data['programming_challenges'][$i]['ac'] = $ac;
         }
        $this->load->student_panel('challenges',$data);
    }
    public function programming_challenges(){
        $user_info = $this->session->userdata('user_data');
		$user_id = $user_info['user_id'];
		$student_id = $user_info['student_id'];
        if(isset($_GET['pc'])){
            $pc_id = base64_decode($_GET['pc']); 
		$data['programming_quiz'] = $this->PM->get_programing_challenges($pc_id);
        for($i=0;$i<sizeof($data['programming_quiz']); $i++){
          $pq_map_id =  $data['programming_quiz'][$i]['pc_map_id'];
          $result = $this->PM->get_solved_challenge($pq_map_id,$student_id);
          if($result == true){
          $data['programming_quiz'][$i]['check'] = 1;
          }
          if($result == false){
            $data['programming_quiz'][$i]['check'] = 0;
            }
        }
        }
        $this->load->student_panel('programming_challenges',$data);
    }
 
    public function quiz_panel(){
        $id = base64_decode($_GET['id']);
        $pqc_m = base64_decode($_GET['pqc_m']);
        $pq = base64_decode($_GET['pq']);
        $data['code_data'] = $this->PM->get_code_question($id);
        $data['code_data'] = $data['code_data'][0];
        $data['pq'] = $pq;
        $data['pqc_m'] = $pqc_m;
        $data['ch_id'] = $id;
        $this->load->view("web/student_panel/qrogramming_quiz_panel",$data);
    }
    public function compiler(){
        $language = strtolower($_POST['language']);
        $code = $_POST['code'];
        $random = substr(md5(mt_rand()),0,7);
        $filePath = "assets/program/".$random.".".$language;
        $programFile = fopen($filePath,"w");
        
        fwrite($programFile,$code);
        fclose($programFile);
        if($language == "php"){
            $output = shell_exec("php $filePath 2>&1");
            echo $output;
        }
        if($language == "node"){
            rename($filePath,$filePath.".js");
            $filePath = $filePath.".js";
            $output = shell_exec("C:\Program Files\nodejs\node.exe $filePath 2>&1");
            echo $output;
        }
        if($language == "python"){
            $output = shell_exec("C:\Users\pawne\AppData\Local\Programs\Python\Python311\python.exe $filePath 2>&1");
            echo $output;
        }
        if($language == "c"){
            $outputExe = $random . ".exe";
            shell_exec("gcc $filePath -o $outputExe");
            $output = shell_exec(__DIR__ . "//outputExe");
            echo $output;
        }
        if($language == "cpp"){
            $outputExe = $random . ".exe";
            shell_exec("g++ $filePath -o $outputExe");
            $output = shell_exec(__DIR__ . "//outputExe");
            echo $output;
        }
    }
    function save(){
        $user_info = $this->session->userdata('user_data');
		$user_id = $user_info['user_id'];
		$student_id = $user_info['student_id'];
        if(isset($_POST)){
        $ch_id = $_POST['ch_id'];
        $pq = $_POST['pq'];
        $pqc_m = $_POST['pqc_m'];
        $result = $_POST['result'];
        $result = str_replace("xampp\htdocs\Think-Champ\assets\program","solution",$result);
        $c_in = $_POST['c_in'];
        $marks = $_POST['marks'];
        $data = array(
            "pq_id"=>$pq,
            "pqc_m"=>$pqc_m,
            "ch_id"=>$ch_id,
            "corr_incc"=>$c_in,
            "marks_obtained"=>$marks,
            "result"=>"$result",
            "submited_by"=>$student_id
        );
        $output = $this->PM->submit_challenge($data);
        if($output==true){
            echo $result;
        }
    }else{
        echo "failed";
    }
    }
    public function submissions(){
        $user_info = $this->session->userdata('user_data');
		$user_id = $user_info['user_id'];
		$student_id = $user_info['student_id'];
        $id = base64_decode($_GET['id']);
        $pqc_m = base64_decode($_GET['pqc_m']);
        $pq = base64_decode($_GET['pq']);
        $data['pq'] = $pq;
        $data['pqc_m'] = $pqc_m;
        $data['ch_id'] = $id;
        $data['submitssions'] = $this->PM->get_all_submited_challenges($pqc_m,$student_id);
        $this->load->view("web/student_panel/pq_submission",$data);
    }
}