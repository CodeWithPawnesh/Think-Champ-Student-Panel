<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Student_model extends CI_Model
{
 public function insert_lead($data){
    $query = $this->db->insert("tc_leads", $data);
    if($query)
        {
       return true;
        }
    }
    public function insert_community($data){
        $query = $this->db->insert("tc_community", $data);
        if($query)
        {
           return true;
        }
    }
 public function get_course(){
    $my_sql = "SELECT COUNT(er.course_id) as cc, c.*, e.emp_name FROM tc_course as c LEFT JOIN tc_employee as e ON c.course_id = e.course_id 
    AND e.emp_id =1 LEFT JOIN tc_enrollment as er ON er.course_id = c.course_id ";
    $query = $this->db->query($my_sql);
    if ($query->num_rows() > 0) {
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
    $curr_date = date('y-m-d');
    $curr_ts = strtotime($curr_date);
    $my_sql = "SELECT b.*,c.class_ts,e.emp_name FROM tc_batch AS b, tc_classes AS c, tc_employee AS e WHERE c.batch_id = b.batch_id AND
     c.type ='1' AND c.group_id = '0' AND b.course_id = $id AND e.emp_id = b.emp_id AND b.batch_end_date >= $curr_ts ";
    $query = $this->db->query($my_sql);
    if ($query->num_rows() > 0) {
        return $query->result_array();
    }else{
        return false;
    }
 }
 public function enroll_count($id){
    $curr_date = date('y-m-d');
    $curr_ts = strtotime($curr_date);
    $my_sql = "SELECT COUNT(e.en_id) AS cc FROM tc_enrollment AS e, tc_batch AS b WHERE e.course_id = $id AND e.batch_id = b.batch_id AND b.batch_end_date >= $curr_ts ";
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
 tc_course as c, tc_employee as e, tc_enrollment as er WHERE s.student_id = $student_id AND er.batch_id = b.batch_id AND b.emp_id = e.emp_id AND 
 er.course_id = c.course_id ";
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
        $sql = "SELECT c.class_id, c.class_name,c.class_ts, b.batch_name, b.batch_number, e.emp_name, e.phone , e.live_link FROM
         tc_classes AS c, tc_batch AS b, tc_employee AS e, tc_student AS s, tc_enrollment as er WHERE er.student_id = $student_id 
         AND c.batch_id = b.batch_id AND  c.teacher_id = e.emp_id AND  c.type= 1 AND c.group_id = 0 AND  er.batch_id = b.batch_id AND s.student_id = $student_id ";
          $query = $this->db->query($sql);
          if ($query->num_rows() > 0) {
              return $query->result_array();
          }else{
              return false;
          }
    }
    public function get_p_live_class_data($student_id){
        $sql = "SELECT DISTINCT c.class_id, c.class_name, c.class_ts, b.batch_name, b.batch_number, e.emp_name, e.phone , e.live_link,g.group_name 
        FROM tc_classes AS c, tc_batch AS b, tc_employee AS e, tc_student AS s, tc_batch_group AS g, tc_enrollment as er WHERE
        er.student_id = $student_id AND er.group_id= g.group_id AND er.batch_id = b.batch_id AND g.emp_id = e.emp_id AND c.status= 1 AND
        c.teacher_id = e.emp_id AND c.batch_id = b.batch_id AND c.group_id = g.group_id AND s.student_id = $student_id";
          $query = $this->db->query($sql);
          if ($query->num_rows() > 0) {
              return $query->result_array();
          }else{
              return false;
          }
    }
    public function today_class($class_id){
        $date = date('y-m-d');
        $sql = "SELECT class_id FROM tc_live_classes WHERE class_date = '$date' AND class_id = $class_id";
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
    public function get_assignments($student_id){
        $sql = "SELECT a.*,aas.status,aas.marks FROM tc_assignment AS a
                LEFT JOIN tc_as_submit AS aas ON a.assignment_id = aas.assignment_id AND aas.student_id = $student_id
                LEFT JOIN tc_enrollment AS e ON e.student_id = $student_id
                WHERE e.batch_id = a.batch_id AND a.group_id = 0 OR a.group_id = e.group_id ORDER BY a.assignment_id DESC
               ";
                   $query = $this->db->query($sql);
                   if ($query->num_rows() > 0) {
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
        $date = date('y-m-d');
        $date_ts = strtotime($date);
        $where = array(
            "quiz_batch_id"=>$batch_id,
            "quiz_group_id"=>0,
            "quiz_end_date">=$date_ts,
            "status"=>1
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
        $date = date('y-m-d');
        $date_ts = strtotime($date);
        $where = array(
            "quiz_group_id"=>$group_id,
            "quiz_end_date">=$date_ts,
            "status"=>1
        );
        $this->db->where($where);
        $query = $this->db->get("tc_quiz");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }else{
            return false;
        }
    }
    public function get_classes($student_id,$course_id){
        $sql = "SELECT ch.*, c.class_name, em.emp_name,c.batch_id FROM tc_live_classes as ch, tc_classes as c, tc_employee as em, tc_enrollment as e
         WHERE e.student_id = $student_id AND e.course_id = $course_id AND c.batch_id = e.batch_id AND c.teacher_id = em.emp_id AND
          ch.class_id = c.class_id AND c.group_id = 0 ";
         $query = $this->db->query($sql);
         if ($query->num_rows() > 0) {
             return $query->result_array();
         }else{
             return false;
         }
    }
    public function get_p_classes($student_id,$course_id){
        $sql = "SELECT ch.*, c.class_name, em.emp_name,c.batch_id,c.group_id FROM tc_live_classes as ch, tc_classes as c, tc_employee as em, tc_enrollment as e
         WHERE e.student_id = $student_id AND e.course_id = $course_id AND c.batch_id = e.batch_id AND c.teacher_id = em.emp_id AND
          ch.class_id = c.class_id AND c.group_id = e.group_id ";
         $query = $this->db->query($sql);
         if ($query->num_rows() > 0) {
             return $query->result_array();
         }else{
             return false;
         }
    }
    public function get_course_name($course_id){
        $this->db->where("course_id",$course_id);
        $query = $this->db->get("tc_course");
        if($query->num_rows()>0){
            return $query->result_array();
        }
    }
    public function get_all_blogs(){
        $this->db->where("status","1");
        $query = $this->db->get("tc_blog");
        if($query->num_rows()>0){
            return $query->result_array();
        }
	}
    public function get_blog_detail($blog_id){
        $this->db->where("blog_id",$blog_id);
        $query = $this->db->get("tc_blog");
        if($query->num_rows()==1){
            return $query->result_array();
        }
    }
    public function get_all_workshop(){
        $this->db->where("workshop_status","1");
        $query = $this->db->get("tc_workshop");
        if($query->num_rows()>0){
            return $query->result_array();
        }
	}
    public function get_workshop_detail($workshop_id){
        $this->db->where("workshop_id",$workshop_id);
        $query = $this->db->get("tc_workshop");
        if($query->num_rows()==1){
            return $query->result_array();
        }
    }
    public function get_all_news(){
        $this->db->where("status","1");
        $query = $this->db->get("tc_news");
        if($query->num_rows()>0){
            return $query->result_array();
        }
	}
    public function get_news_detail($news_id){
        $this->db->where("news_id",$news_id);
        $query = $this->db->get("tc_news");
        if($query->num_rows()==1){
            return $query->result_array();
        }
    }
    public function enroll_in_workshop($data){
        $query = $this->db->insert("tc_workshop_enroll", $data);
        if($query)
        {
            return true;
        }else{
            return false;
        }
    }
    public function get_job_data($batch_id){
        $this->db->where("batch_id",$batch_id);
        $query = $this->db->get("tc_job_updates");
        if($query->num_rows()>0){
            return $query->result_array();
        }
    }
    public function get_internship_data($student_id){
        $this->db->where("student_id",$student_id);
        $query = $this->db->get("tc_internship");
        if($query->num_rows()>0){
            return $query->result_array();
        }
    }
    public function update_int_status($status,$int_id){
        $this->db->where("internship_id",$int_id);
        $query = $this->db->update("tc_internship", $status);
        if($query){
            redirect("Internship");
        }
    }
    public function get_sub_quiz($student_id){
		$this->db->where("student_id",$student_id);
        $query = $this->db->get("tc_quiz_submition");
        if($query->num_rows()>0){
            return $query->result_array();
        }
	}
    public function get_student_attened($class_id){
        $date = date('y-m-d');
        $sql = "SELECT class_id, student_ids, live_id FROM tc_live_classes WHERE class_date = '$date' AND class_id = $class_id";
          $query = $this->db->query($sql);
          if ($query->num_rows() > 0) {
              return $query->result_array();
          }else{
              return false;
          }
    }
    public function insert_class_history($data,$where,$redirect,$pg_class_data){
        $this->db->trans_start();
        $this->db->where($where);
        $this->db->update("tc_live_classes", $data);
        if(!empty($pg_class_data)){
            $this->db->insert('tc_programming_class_marks',$pg_class_data);
        }
        if($this->db->trans_complete()){
            redirect($redirect);
        }
    }
    public function get_std_course_data($student_id){
        $sql = "SELECT c.course_id,c.course_name, c.course_title,c.sec_1_img FROM tc_course AS c, tc_enrollment AS e WHERE e.student_id = $student_id AND 
                 c.course_id = e.course_id";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }else{
            return false;
        }
    }
    public function get_liveClass_history($where){
        $this->db->where($where);
        $query = $this->db->get("tc_class_video");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }else{
            return false;
        }
    }
    public function insert_video_request($data){
        $query = $this->db->insert("tc_class_video", $data);
        if($query)
        {
            return true;
        }else{
            return false;
        }
    }
    public function update_video_request($data,$where){
        $this->db->where("class_video_id",$where);
        $query = $this->db->update("tc_class_video", $data);
        if($query){
            return true;
        }else{
            return false;
        }
    }
    public function get_requested_live_class_id($student_id){
        $sql = "SELECT v.live_id, v.requested_by,v.status,v.type FROM tc_class_video AS v, tc_enrollment AS en WHERE en.student_id = $student_id AND v.batch_id = en.batch_id ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }else{
            return false;
        }
    }
    public function get_b_class_video($student_id){
        $sql = "SELECT v.*,l.class_no FROM tc_class_video AS v, tc_enrollment AS e, tc_live_classes AS l WHERE e.student_id = $student_id AND 
                e.batch_id = v.batch_id AND v.group_id = 0 AND v.live_id = l.live_id";
                $query = $this->db->query($sql);
                if ($query->num_rows() > 0) {
                    return $query->result_array();
                }else{
                    return false;
                }
    }
    public function get_g_class_video($student_id){
        $sql = "SELECT v.*,l.class_no FROM tc_class_video AS v, tc_enrollment AS e, tc_live_classes AS l WHERE e.student_id = $student_id AND 
                e.batch_id = v.batch_id AND v.group_id = e.group_id AND v.live_id = l.live_id";
                $query = $this->db->query($sql);
                if ($query->num_rows() > 0) {
                    return $query->result_array();
                }else{
                    return false;
                }
    }
    public function get_notification_data(){
        $sql = "SELECT * FROM tc_notification  WHERE type IN (0,2)";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }else{
            return false;
        }
    }
    public function get_batch_notification_data(){
        $user_info = $this->session->userdata('user_data');
		$student_id = $user_info['student_id'];
        $sql = "SELECT * FROM tc_notification AS n,tc_enrollment AS e  WHERE n.type=4 AND n.group_id = 0 AND e.batch_id = n.batch_id AND e.student_id = $student_id";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }else{
            return false;
        }
    }
    public function get_group_notification_data(){
        $user_info = $this->session->userdata('user_data');
		$student_id = $user_info['student_id'];
        $sql = "SELECT * FROM tc_notification AS n,tc_enrollment AS e  WHERE n.type=5 AND e.group_id = n.group_id AND e.student_id = $student_id  ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }else{
            return false;
        }
    }
    public function get_certificate(){
        $user_info = $this->session->userdata('user_data');
		$student_id = $user_info['student_id'];
        $sql = "SELECT ce.certificate_id,ce.type,ce.status,c.course_name,b.batch_name FROM tc_certificate AS ce 
                LEFT JOIN tc_batch AS b ON ce.batch_id = b.batch_id
                LEFT JOIN tc_course AS c ON ce.course_id = c.course_id
                WHERE ce.student_id = $student_id ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }else{
            return false;
        }
    }
    public function get_one_certificate($id){
        $sql = "SELECT ct.*,s.student_name,ce.certificate_id,ce.certificate_number,ce.created_at,ce.type,ce.status,c.course_name,b.batch_name ,b.batch_start_date,b.batch_end_date
               FROM tc_certificate AS ce 
               LEFT JOIN tc_student AS s ON ce.student_id = s.student_id
               LEFT JOIN tc_certificate_template AS ct ON ce.cer_temp_id =ct.cer_temp_id
               LEFT JOIN tc_batch AS b ON ce.batch_id = b.batch_id
               LEFT JOIN tc_course AS c ON ce.course_id = c.course_id
               WHERE ce.certificate_id = $id ";
       $query = $this->db->query($sql);
         if ($query->num_rows() > 0) {
         return $query->result_array();
         }else{
             return false;
              }
          }
    public function verify_certificate($stdId,$batchId){
        $sql ="SELECT ce.*,ct.*,s.student_name,b.batch_name,b.batch_start_date,b.batch_end_date,c.course_name FROM tc_certificate AS ce,
             tc_certificate_template AS ct,tc_student AS s, tc_batch AS b, tc_course AS c
             WHERE ce.batch_id = $batchId AND ce.student_id = $stdId AND ce.cer_temp_id = ct.cer_temp_id AND 
             ce.batch_id = b.batch_id AND ce.course_id = c.course_id AND s.student_id = ce.student_id";
        $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
            return $query->result_array();
            }else{
                 return false;
                 }
          }
    public function get_student_placed_at(){
        $this->db->order_by('id', 'DESC');
        $query = $this->db->get("tc_student_placed");
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return false;
        }
    }
    public function get_trainer_data($id){
        $sql = "SELECT * FROM tc_employee WHERE course_id LIKE '%$id%' AND role = 1 ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
        return $query->result_array();
        }else{
             return false;
             }
    }
    public function get_orders($student_id){
        $sql = "SELECT o.*,c.course_name FROM tc_order AS o, tc_course AS c WHERE o.student_id = $student_id AND c.course_id = o.course_id ORDER BY o.order_id DESC";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
        return $query->result_array();
        }else
        {
        return false;
        }
    }
    public function get_paid_order_detail($order_id){
        $sql = "SELECT o.*,c.course_name FROM tc_order AS o, tc_course AS c WHERE order_id = $order_id AND c.course_id = o.course_id ";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
        return $query->result_array();
        }else
        {
        return false;
        }
    }
}
?>