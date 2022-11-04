<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Student_model extends CI_Model
{
 public function get_course(){
    $query = $this->db->get("tc_course");
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
 }
 public function get_course_detail($id){
    $this->db->where("course_id",$id);
    $query = $this->db->get("tc_course");
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
 }
 public function get_batch_data($id){
    $my_sql = "SELECT b.*,c.class_ts,e.emp_name FROM tc_batch AS b, tc_classes AS c, tc_employee AS e WHERE c.batch_id = b.batch_id AND c.type ='1' AND c.group_id = '0' AND b.course_id = $id AND e.emp_id = b.emp_id";
    $query = $this->db->query($my_sql);
    if ($query->num_rows() > 0) {
        return $query->result_array();
    }else{
        return false;
    }
 }
 public function get_student_row($email){
    $this->db->where("email",$email);
    $query = $this->db->get("tc_student");
    if($query->num_rows()>0){
        return $query->num_rows();
    }else{
        return false;
    }
 }

}
?>