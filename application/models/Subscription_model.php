<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Subscription_model extends CI_Model
{
public function insert_student($user_data,$student_data){
$this->db->trans_start();
$this->db->insert('tc_login', $user_data);
   $insert_id = $this->db->insert_id();
   $student_data['user_id'] = $insert_id;
$this->db->insert('tc_student',$student_data);
if($this->db->trans_complete()){
    redirect("http://localhost/Think-Champ/");
}
}
}
