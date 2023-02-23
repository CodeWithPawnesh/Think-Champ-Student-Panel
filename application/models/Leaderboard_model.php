<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Leaderboard_model extends CI_Model
{
    function get_all_student($batch_id){
        $sql = "SELECT DISTINCT s.student_name,s.student_id FROM tc_student AS s
                LEFT JOIN tc_enrollment AS e ON s.student_id = e.student_id 
                WHERE e.batch_id = $batch_id";
                $query = $this->db->query($sql);
                if ($query->num_rows() > 0) {
                    return $query->result_array();
                }else{
                    return false;
                }
    }
    function get_quiz_marks($batch_id,$group_id){
        $sql = "SELECT DISTINCT s.student_id, s.student_name, SUM( qs.marks_obtained) AS qm_sum
                FROM tc_student AS s
                LEFT JOIN tc_quiz_submition AS qs ON s.student_id = qs.student_id 
                LEFT JOIN tc_quiz AS q ON qs.quiz_id = q.quiz_id
                WHERE q.quiz_batch_id = $batch_id
                GROUP BY s.student_id ORDER BY SUM(qs.marks_obtained) DESC";
                 $query = $this->db->query($sql);
                if ($query->num_rows() > 0) {
                    return $query->result_array();
                }else{
                    return false;
                }
    }
    function get_assignment_marks($batch_id,$group_id){
        $sql = "SELECT DISTINCT s.student_id, s.student_name, SUM( aas.marks) AS am_sum
                FROM tc_student AS s
                LEFT JOIN tc_as_submit AS aas ON s.student_id = aas.student_id 
                LEFT JOIN tc_assignment AS a ON a.assignment_id = aas.assignment_id
                WHERE a.batch_id = $batch_id
                GROUP BY s.student_id ORDER BY SUM(aas.marks) DESC";
                 $query = $this->db->query($sql);
                if ($query->num_rows() > 0) {
                    return $query->result_array();
                }else{
                    return false;
                }
    }
    function get_pq_marks($batch_id,$group_id){
        $sql = "SELECT DISTINCT s.student_id, s.student_name, SUM( cs.marks_obtained) AS pqm_sum
                FROM tc_student AS s
                LEFT JOIN tc_challenge_submition AS cs ON s.student_id = cs.student_id 
                LEFT JOIN tc_programing_quiz AS pq ON pq.batch_id = $batch_id 
                WHERE pq.pq_id = cs.pq_id
                GROUP BY s.student_id ORDER BY SUM(cs.marks_obtained) DESC";
                 $query = $this->db->query($sql);
                if ($query->num_rows() > 0) {
                    return $query->result_array();
                }else{
                    return false;
                }
    }
    function get_pc_marks($batch_id,$group_id){
        $sql = "SELECT DISTINCT s.student_id, s.student_name, SUM( pc.marks_obtained) AS pcm_sum
                FROM tc_student AS s
                LEFT JOIN tc_programming_class_marks AS pc ON s.student_id = pc.student_id
                LEFT JOIN tc_classes AS c ON c.batch_id = $batch_id
                LEFT JOIN tc_live_classes lc ON c.class_id = lc.class_id
                WHERE lc.live_id = pc.live_class_id
                GROUP BY s.student_id ORDER BY SUM(pc.marks_obtained) DESC ";
                 $query = $this->db->query($sql);
                if ($query->num_rows() > 0) {
                    return $query->result_array();
                }else{
                    return false;
                }
    }
    function marks($batch_id,$group_id){
        $sql = "SELECT DISTINCT s.student_id, s.student_name,
                SUM(qs.marks_obtained) AS quiz_sum,
                SUM(pc.marks_obtained) AS pro_clss_sum,
                SUM(cs.marks_obtained) AS pro_quz_sum,
                SUM(aas.marks) AS ass_sum
        FROM tc_student AS s
        LEFT JOIN tc_quiz AS q ON q.quiz_batch_id = $batch_id AND q.quiz_group_id = $group_id OR q.quiz_group_id = 0
        LEFT JOIN tc_quiz_submition AS qs ON s.student_id = qs.student_id AND qs.quiz_id = q.quiz_id
        LEFT JOIN tc_classes AS c ON c.batch_id = $batch_id AND c.group_id = $group_id OR c.group_id = 0
        LEFT JOIN tc_live_classes lc ON c.class_id = lc.class_id
        LEFT JOIN tc_programming_class_marks AS pc ON s.student_id = pc.student_id AND lc.live_id = pc.live_class_id
        LEFT JOIN tc_programing_quiz AS pq ON pq.batch_id = $batch_id AND pq.group_id = $group_id  OR pq.group_id = 0
        LEFT JOIN tc_challenge_submition AS cs ON s.student_id = cs.student_id AND  pq.pq_id = cs.pq_id
        LEFT JOIN tc_assignment AS a ON a.batch_id = $batch_id AND a.group_id = $group_id OR a.group_id = 0
        LEFT JOIN tc_as_submit AS aas ON s.student_id = aas.student_id AND  a.assignment_id = aas.assignment_id
        GROUP BY s.student_id
        ";
         $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }else{
            return false;
        }
    }
    // function marks_detail(){
    //     $sql = "SELECT DISTINCT s.student_id, s.student_name,
    //             qs.submit_id AS qs_id,
    //             pc.id AS pc_id,
    //             cs.cs_id,
    //             aas.id AS aas_id,         
    //             qs.marks_obtained AS quiz_sum,
    //             pc.marks_obtained AS pro_clss_sum,
    //             cs.marks_obtained AS pro_quz_sum,
    //             aas.marks AS ass_sum
    //     FROM tc_student AS s
    //     LEFT JOIN tc_quiz_submition AS qs ON s.student_id = qs.student_id 
    //     LEFT JOIN tc_programming_class_marks AS pc ON s.student_id = pc.student_id 
    //     LEFT JOIN tc_challenge_submition AS cs ON s.student_id = cs.student_id
    //     LEFT JOIN tc_as_submit AS aas ON s.student_id = aas.student_id
    //     ";
    //      $query = $this->db->query($sql);
    //     if ($query->num_rows() > 0) {
    //         return $query->result_array();
    //     }else{
    //         return false;
    //     }
    // }
}