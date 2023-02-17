<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Leaderboard_model extends CI_Model
{
    function get_quiz_marks(){
        $sql = "SELECT DISTINCT s.student_id, s.student_name, SUM(qs.marks_obtained) AS qm_sum
                FROM tc_student AS s
                LEFT JOIN tc_quiz_submition AS qs ON s.student_id = qs.student_id 
                GROUP BY s.student_id";
                 $query = $this->db->query($sql);
                if ($query->num_rows() > 0) {
                    return $query->result_array();
                }else{
                    return false;
                }
    }
    function get_assignment_marks(){
        $sql = "SELECT DISTINCT s.student_id, s.student_name, SUM(aas.marks) AS am_sum
                FROM tc_student AS s
                LEFT JOIN tc_as_submit AS aas ON s.student_id = aas.student_id 
                GROUP BY s.student_id";
                 $query = $this->db->query($sql);
                if ($query->num_rows() > 0) {
                    return $query->result_array();
                }else{
                    return false;
                }
    }
    function get_pq_marks(){
        $sql = "SELECT DISTINCT s.student_id, s.student_name, SUM(cs.marks_obtained) AS pqm_sum
                FROM tc_student AS s
                LEFT JOIN tc_challenge_submition AS cs ON s.student_id = cs.student_id 
                GROUP BY s.student_id";
                 $query = $this->db->query($sql);
                if ($query->num_rows() > 0) {
                    return $query->result_array();
                }else{
                    return false;
                }
    }
    function get_pc_marks(){
        $sql = "SELECT DISTINCT s.student_id, s.student_name, SUM(pc.marks_obtained) AS pcm_sum
                FROM tc_student AS s
                LEFT JOIN tc_programming_class_marks AS pc ON s.student_id = pc.student_id 
                GROUP BY s.student_id";
                 $query = $this->db->query($sql);
                if ($query->num_rows() > 0) {
                    return $query->result_array();
                }else{
                    return false;
                }
    }
    function marks(){
        $sql = "SELECT DISTINCT s.student_id, s.student_name,
                SUM(qs.marks_obtained) AS quiz_sum,
                SUM(pc.marks_obtained) AS pro_clss_sum,
                SUM(cs.marks_obtained) AS pro_quz_sum,
                SUM(aas.marks) AS ass_sum
        FROM tc_student AS s
        LEFT JOIN tc_quiz_submition AS qs ON s.student_id = qs.student_id 
        LEFT JOIN tc_programming_class_marks AS pc ON s.student_id = pc.student_id 
        -- LEFT JOIN tc_challenge_submition AS cs ON s.student_id = cs.student_id
        LEFT JOIN tc_as_submit AS aas ON s.student_id = aas.student_id 

        GROUP BY s.student_id";
         $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }else{
            return false;
        }
    }
}