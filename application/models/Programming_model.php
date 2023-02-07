<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Programming_model extends CI_Model
{
    function get_challenges(){
        $user_info = $this->session->userdata('user_data');
		$user_id = $user_info['user_id'];
		$student_id = $user_info['student_id'];
        $sql = "SELECT  p.*,c.course_name,c.course_id FROM tc_programing_quiz AS p 
                LEFT JOIN tc_course AS c ON  c.course_id = p.course_id
                LEFT JOIN tc_enrollment AS e ON e.batch_id = p.batch_id AND e.group_id = p.group_id || p.group_id = 0
                LEFT JOIN tc_pc_map AS m ON p.pq_id = m.pq_id
                WHERE e.student_id = $student_id  ";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                return $query->result_array();
            }else{
                return false;
            }
    }
    function get_programing_challenges($pc_id){
        $sql ="SELECT c.ch_id, c.challenge_name, c.level, cc.course_name, c.marks, m.pc_map_id FROM tc_challenge_bank AS c, tc_pc_map AS m, tc_course AS cc
               WHERE c.ch_id = m.ch_id AND m.pq_id = $pc_id AND c.course_id = cc.course_id";
                $query = $this->db->query($sql);
                if ($query->num_rows() > 0) {
                return $query->result_array();
                }else{
                return false;
                }
    }
    function get_code_question($id){
        $sql = "SELECT b.*, c.course_name FROM tc_challenge_bank AS b, tc_course AS c WHERE b.ch_id = $id";
        $query = $this->db->query($sql);
                if ($query->num_rows() > 0) {
                return $query->result_array();
                }else{
                return false;
                }

    }
    function submit_challenge($data){
        $query = $this->db->insert("tc_challenge_submition", $data);
        if($query)
        {
            return true;
        }else{
            return false;
        }
    }
    function get_challenge_count($pq_id){
        $sql = "SELECT pq_id FROM tc_pc_map WHERE pq_id = $pq_id";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }else{
            return 0;
        }
    }
   function get_challenge_att_count($pq_id,$student_id){
    $sql = "SELECT DISTINCT pqc_m FROM tc_challenge_submition WHERE corr_incc =1 AND  pq_id = $pq_id AND submited_by = $student_id";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        }else{
            return 0;
        }
   }
   function get_solved_challenge($pq_map_id,$student_id){
    $sql = "SELECT DISTINCT pqc_m FROM tc_challenge_submition WHERE corr_incc =1 AND  pqc_m = $pq_map_id AND submited_by = $student_id";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return true;
        }else{
            return false;
        }
   }
   function get_all_submited_challenges($pqc_m,$student_id){
    $sql = "SELECT s.*, b.challenge_name,b.marks,c.course_name FROM tc_challenge_submition AS s, tc_challenge_bank AS b, tc_course AS c
           WHERE s.pqc_m = $pqc_m AND s.ch_id = b.ch_id AND b.course_id = c.course_id AND s.submited_by = $student_id ORDER BY s.cs_id DESC ";
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0) {
        return $query->result_array();
    }else{
        return false;
    }
   }
}