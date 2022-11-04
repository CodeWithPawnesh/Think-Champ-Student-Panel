<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Auth_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function login($data)
    {
        //$condition = "username =" . "'" . $data['username'] . "' AND " . "password =" . "'" . $data['password'] . "' AND access_level=3 AND status=1";
        $this->db->select('*');
        $this->db->from('tc_login');
        //$this->db->where($condition);
        $this->db->where('email', $data['email']);
        $this->db->where('password_o', $data['password']);
        $this->db->where('access_level', 3);
        $this->db->where('status', 1);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            return $this->read_user_information($data['email']);
        } else {
            return FALSE;
        }
    }
    function read_user_information($email)
    {
        $this->db->select('*');
        $this->db->from('tc_student');
        $this->db->where('email', $email);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return FALSE;
        }
    }
    public function update_session_id($user_session_id,$user_id){
        $data = array(
            "session_id"=>$user_session_id
        );
        $this->db->where("id",$user_id);
        $query = $this->db->update("tc_login",$data);
    }
    public function get_session_id($user_id){
        $this->db->select("session_id");
        $this->db->from('tc_login');
        $this->db->where('id',$user_id);
        $query = $this->db->get();
        if($query->num_rows()==1){
            return $query->result_array();
        }
    }
}