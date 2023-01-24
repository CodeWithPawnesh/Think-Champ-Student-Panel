<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Subscription_model extends CI_Model
{
public function sub_student($student_data,$login_data,$order_data,$course_data,$order_data_inst_2,$order_data_inst_3){
$this->db->trans_start();
$this->db->insert('tc_login', $login_data);
   $insert_id = $this->db->insert_id();
   $student_data['user_id'] = $insert_id;
$this->db->insert('tc_student',$student_data);
$insert_id = $this->db->insert_id();
$order_data['student_id'] = $insert_id;
$course_data['student_id'] = $insert_id;
if($order_data_inst_2!=0){
    $order_data_inst_2['student_id'] = $order_data['student_id'];
    $this->db->insert('tc_order',$order_data_inst_2);
}
if($order_data_inst_3!=0){
    $order_data_inst_3['student_id'] = $order_data['student_id'];
    $this->db->insert('tc_order',$order_data_inst_3);
}
$this->db->insert('tc_order',$order_data);
$this->db->insert('tc_enrollment',$course_data);
if($this->db->trans_complete()){
    return true;
}
}
}
