<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Subscription_model extends CI_Model
{
public function sub_student($student_data,$login_data,$order_data){
$this->db->trans_start();
$this->db->insert('tc_login', $login_data);
   $insert_id = $this->db->insert_id();
   $student_data['user_id'] = $insert_id;
$this->db->insert('tc_student',$student_data);
$insert_id = $this->db->insert_id();
$order_data['student_id'] = $insert_id;
$this->db->insert('tc_order',$order_data);
if($this->db->trans_complete()){
    redirect("Subscription/payment_success");
}
}
}
