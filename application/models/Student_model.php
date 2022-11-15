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
 public function get_student_data($student_id){
 $my_sql = "SELECT s.*, c.course_name, b.batch_name,e.emp_name FROM tc_student as s, tc_batch as b,
 tc_course as c, tc_employee as e WHERE s.student_id = $student_id AND s.batch_id = b.batch_id AND b.emp_id = e.emp_id AND 
 s.course_id = c.course_id ";
        $query = $this->db->query($my_sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }else{
            return false;
        }
    }
    public function get_group_data($group_id){
        $my_sql = "SELECT g.group_name,e.emp_name as instructor FROM tc_batch_group as g, tc_employee as e WHERE g.group_id = $group_id AND e.emp_id = g.emp_id";
        $query = $this->db->query($my_sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }else{
            return false;
        }
    }
    public function update_profile($data,$student_id){
        $this->db->where("student_id",$student_id);
        $query = $this->db->update("tc_student", $data);
        if($query){
            return true;
        }else{
            return false;
        }
    }
    public function get_coure_data($course_id){
        $this->db->select("course_name, course_title");
        $this->db->where("course_id",$course_id);
        $query = $this->db->get("tc_course");
        if($query->num_rows()==1){
            return $query->result_array();
        }else{
            return false;
        }
    }
    public function get_live_class_data($student_id){
        $sql = "SELECT c.class_name,c.class_ts, b.batch_name, b.batch_number, e.emp_name, e.phone , e.live_link FROM tc_classes AS c, tc_batch AS b,
        tc_employee AS e, tc_student AS s WHERE c.batch_id = b.batch_id AND s.batch_id = b.batch_id AND e.emp_id = c.teacher_id AND 
         s.student_id = $student_id AND c.group_id ='0' AND c.status = '1'  ";
          $query = $this->db->query($sql);
          if ($query->num_rows() > 0) {
              return $query->result_array();
          }else{
              return false;
          }
    }
    public function get_p_live_class_data($student_id){
        $sql = "SELECT c.class_name, c.class_ts, b.batch_name, b.batch_number, e.emp_name, e.phone , e.live_link,g.group_name FROM tc_classes AS c, tc_batch AS b,
        tc_employee AS e, tc_student AS s, tc_batch_group AS g WHERE c.batch_id = b.batch_id AND s.batch_id = b.batch_id AND e.emp_id = c.teacher_id AND 
         s.student_id = $student_id AND c.group_id = g.group_id AND c.status = '1'  ";
          $query = $this->db->query($sql);
          if ($query->num_rows() > 0) {
              return $query->result_array();
          }else{
              return false;
          }
    }
    public function get_student_leave($user_id){
        $this->db->where("user_id",$user_id);
        $query = $this->db->get("tc_leave");
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return false;
        }
    }
    public function add_leave($data){
        $query = $this->db->insert("tc_leave", $data);
        if($query)
        {
            redirect("Leave");
        }
    }
    public function get_batch_assignment($batch_id){
        $date = date('y-m-d');
        $date_ts = strtotime($date);
        $sql = "SELECT a.*, e.emp_name FROM tc_assignment AS a, tc_employee AS e
        WHERE a.batch_id = $batch_id AND a.created_by = e.emp_id  AND a.group_id ='0' AND a.start_date <= $date_ts AND a.end_date >= $date_ts ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }else{
            return false;
        }
    }
    public function get_group_assignment($batch_id,$group_id){
        $date = date('y-m-d');
        $date_ts = strtotime($date);
        $sql = "SELECT a.*,e.emp_name FROM tc_assignment AS a, tc_employee AS e
        WHERE a.batch_id = $batch_id AND a.created_by = e.emp_id AND a.group_id =$group_id AND a.start_date <= $date_ts AND a.end_date >= $date_ts ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }else{
            return false;
        }
    }
    public function get_submited_assignment($student_id){
        $this->db->where("student_id",$student_id);
        $query = $this->db->get("tc_as_submit");
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return false;
        }
    }
    public function submit_assignmet($data){
        $query = $this->db->insert("tc_as_submit",$data);
        if($query){
            redirect("Assignment");
        }
    }
    public function get_batch_quiz($batch_id){
        $where = array(
            "quiz_batch_id"=>$batch_id,
            "quiz_group_id"=>0
        );
        $this->db->where($where);
        $query = $this->db->get("tc_quiz");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }else{
            return false;
        }
    }
    public function get_group_quiz($group_id){
        $this->db->where("quiz_group_id",$group_id);
        $query = $this->db->get("tc_quiz");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }else{
            return false;
        }
    }
}
?>