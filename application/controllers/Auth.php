<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('cookie');
        $this->load->model('Auth_model', 'AM');
    }
    public function index()
    {
        $data['page']="page";
        if(isset($_GET['error'])){
            if($_GET['error']=='1'){
                $data['error']="E-mail OR Password Is Incorrect!";
            }
        }
        $this->load->web_temp('login', $data);
    }
    public function student(){
        $data['page']="login";
        if(get_cookie('_hnp') != null){
            $temp = explode("######", base64_decode(get_cookie('_hnp')));
            $data['hn'] = $temp[0];
            $data['hp'] = $temp[1];
        }
        if ($this->session->userdata('login_status')) {
            redirect('StudentPanel');
        }
        if (isset($_POST['submit'])) {
            
            $data = array(
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password'))
            );
            
            $result = $this->AM->login($data);
            
            if ($result !== false) {
                $all_data = (array) $result[0];
                set_cookie('_hnp', base64_encode($data['email'] .'######' . $this->input->post('password')), time()+24*3600*30);
                $this->session->set_userdata('user_data', $all_data);
                $this->session->set_userdata('login_status', 1);
                $user_session_id = $this->session->session_id;
                $this->AM->update_session_id($user_session_id,$all_data['user_id']);
                $this->session->set_userdata('sess_id',$user_session_id);
                redirect('StudentPanel');
            } else {
                redirect('auth?error=1');
            }
        } else {
            $this->session->set_userdata('login_status', 0);
            redirect('auth');
        }

    }
    public function logout()
    {
        $this->session->unset_userdata('user_data');
        $this->session->unset_userdata('login_status');
        redirect('auth');
    }
    public function check_login(){
        $user_info = $this->session->userdata('user_data');
        $user_id = $user_info['user_id'];
        $session_id = $this->AM->get_session_id($user_id); 
        $session_id = $session_id[0]['session_id'];
        if($this->session->userdata('sess_id') != $session_id){
            $data['output'] = "logout";
        }else{
            $data['output'] = "login";
        }
        echo json_encode($data);
    }
}