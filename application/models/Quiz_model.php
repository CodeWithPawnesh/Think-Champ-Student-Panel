<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Quiz_model extends CI_Model
{
function get_quiz($quiz_id){
    $this->db->where("quiz_id",$quiz_id);
    $query = $this->db->get("tc_quiz");
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
}
function get_quiz_qus($quiz_id){
    $my_sql = "SELECT q.* FROM tc_quiz_question AS q, tc_q_q_map AS qq WHERE q.question_id = qq.question_id AND qq.quiz_id = $quiz_id ";
    $query = $this->db->query($my_sql);
    if ($query->num_rows() > 0) {
        return $query->result_array();
    }else{
        return false;
    }
}
function startQuiz($data){
    $query = $this->db->insert("tc_quiz_submition", $data);
        if($query)
        {
            return true;
        }else{
            return false;
        }
}
function submitQuiz($data,$where){
        $quiz_id = $where['quiz_id'];
        $this->db->where($where);
        $query = $this->db->update("tc_quiz_submition",$data);
        if($query){
            redirect("Quiz/analytics?quiz_id=".base64_encode($quiz_id));
        }
}
function quiz_result($quiz_id,$student_id){
    $sql = "SELECT qz.quiz_title, s.student_name, qs.question_answers, qs.marks_obtained FROM tc_quiz AS qz, 
            tc_quiz_submition AS qs, tc_student AS s WHERE qz.quiz_id = $quiz_id AND s.student_id = $student_id AND qz.quiz_id = qs.quiz_id";
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0) {
        return $query->result_array();
    }else{
        return false;
    }
}
}