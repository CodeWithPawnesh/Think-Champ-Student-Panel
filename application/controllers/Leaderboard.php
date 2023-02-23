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
        $user_info = $this->session->userdata('user_data');
		$user_id = $user_info['user_id'];
		$student_id = $user_info['student_id'];
        $batch_id = base64_decode($_GET['bid']);
        $group_id = base64_decode($_GET['gid']);
		echo $batch_id;
		// $marks = $this->LM->marks($batch_id,$group_id);
		// for($i=0;$i<sizeof($marks);$i++){
        //     $marks[$i]['total']= $total =$marks[$i]['quiz_sum']+ $marks[$i]['ass_sum']+$marks[$i]['pro_quz_sum']+$marks[$i]['pro_clss_sum'];
        //    }
		$get_all_student = $this->LM->get_all_student($batch_id);
        $get_quiz_marks = $this->LM->get_quiz_marks($batch_id,$group_id);
        $get_assignment_marks = $this->LM->get_assignment_marks($batch_id,$group_id);
        $get_pq_marks = $this->LM->get_pq_marks($batch_id,$group_id);
        $get_pc_marks = $this->LM->get_pc_marks($batch_id,$group_id);
		for($i=0;$i<sizeof($get_all_student);$i++)
		{
			$marks[$i]['student_id']=$get_all_student[$i]["student_id"];
			$marks[$i]['student_name']=$get_all_student[$i]["student_name"];
			if(!empty($get_quiz_marks))
			{
				foreach($get_quiz_marks AS $qm)
				{
					if($qm["student_id"]==$get_all_student[$i]["student_id"]){
						$marks[$i]['qm_sum'] = $qm["qm_sum"];
					}
				}
			}
			if(!empty($get_assignment_marks))
			{
				foreach($get_assignment_marks as $am){
					if($am["student_id"]==$get_all_student[$i]["student_id"]){
						$marks[$i]['am_sum'] = $am["am_sum"];
					}
				}
			}
			if(!empty($get_pc_marks))
			{
				foreach($get_pc_marks as $pc){
					if($pc["student_id"]==$get_all_student[$i]["student_id"]){
						$marks[$i]['pcm_sum'] = $pc["pcm_sum"];
					}
				}
			}
			if(!empty($get_pq_marks))
			{
				foreach($get_pq_marks as $pq){
					if($pq["student_id"]==$get_all_student[$i]["student_id"]){
						$marks[$i]['pqm_sum'] = $pq["pqm_sum"];
					}
				}
			}
				
		}
		for($i=0;$i<sizeof($marks);$i++){
			if(array_key_exists("qm_sum",$marks[$i])){
				$marks[$i]["total"]=  $marks[$i]["qm_sum"];
			}else{
				$marks[$i]["qm_sum"] = 0;
				$marks[$i]["total"]= $marks[$i]["qm_sum"];
			}
			if(array_key_exists("am_sum",$marks[$i])){
				$marks[$i]["total"]= $marks[$i]["total"] + $marks[$i]["am_sum"];
			}else{
				$marks[$i]["am_sum"] = 0;
				$marks[$i]["total"]= $marks[$i]["total"] + $marks[$i]["am_sum"];
			}
			if(array_key_exists("pcm_sum",$marks[$i])){
				$marks[$i]["total"]= $marks[$i]["total"] + $marks[$i]["pcm_sum"];
			}else{
				$marks[$i]["pcm_sum"] = 0;
				$marks[$i]["total"]= $marks[$i]["total"] + $marks[$i]["pcm_sum"];
			}
			if(array_key_exists("pqm_sum",$marks[$i])){
				$marks[$i]["total"]= $marks[$i]["total"] + $marks[$i]["pqm_sum"];
			}else{
				$marks[$i]["pqm_sum"] = 0;
				$marks[$i]["total"]= $marks[$i]["total"] + $marks[$i]["pqm_sum"];
			}
		}
        // $final_array = array_merge($get_quiz_marks,$get_assignment_marks,$get_pq_marks,$get_pc_marks);
        // 		if(!empty($final_array)){
		// function date_compare($element1, $element2) {
		// 	$datetime1 = $element1['student_id'];
		// 	$datetime2 = $element2['student_id'];
		// 	   return $datetime1 - $datetime2;
		// 	   } 
	  
		// 	// Sort the array 

		//    usort($final_array, 'date_compare');
		// 	}
        //    $arryChunk = array_chunk($final_array,4);
        //    print_r($arryChunk);
        //    for($i=0;$i<sizeof($arryChunk);$i++){
        //     $leadboardArray[$i]['student_id'] = $arryChunk[$i][0]['student_id'];
        //     $leadboardArray[$i]['student_name']= $arryChunk[$i][0]['student_name'];
        //     $leadboardArray[$i]['qm_sum']= $arryChunk[$i][0]['qm_sum'];
        //     $leadboardArray[$i]['am_sum']=$arryChunk[$i][1]['am_sum'];
        //     $leadboardArray[$i]['pqm_sum']= $arryChunk[$i][2]['pqm_sum'];
        //     $leadboardArray[$i]['pcm_sum']= $arryChunk[$i][3]['pcm_sum'];
        //     $leadboardArray[$i]['total']= $total =$arryChunk[$i][0]['qm_sum']+ $arryChunk[$i][1]['am_sum']+$arryChunk[$i][2]['pqm_sum']+$arryChunk[$i][3]['pcm_sum'];
        //    }
           function total_compare($element1, $element2) {
			$total1 = $element1['total'];
			$total2 = $element2['total'];
			   return $total2 - $total1;
			   } 
	  
			// Sort the array 

		//    usort($leadboardArray, 'total_compare');
        //   $data['leaderboard_data'] = $leadboardArray;
		  usort($marks, 'total_compare');
          $data['leaderboard_data'] = $marks;
          $this->load->student_panel('leaderboard',$data);
			}
    }    