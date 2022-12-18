<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    function __construct()
	{
		parent::__construct();
		$this->load->model('Student_model','SM');
    }
	public function index()
	{
        $data['blog_list'] = $this->SM->get_all_blogs();
        $data['course_data'] = $this->SM->get_course();
		$this->load->web_temp_2('home',$data);
	}
    public function AboutUs(){
        $data['page']="";
        $this->load->web_temp('about_us',$data);
    }
    public function Contact(){
        $data['page']="";
        $this->load->web_temp('contact',$data);
    }
    public function Faq(){
        $data['page']="";
        $this->load->web_temp('faq',$data);
    }
    public function PrivacyPolicy(){
        $data['page']="";
        $this->load->web_temp('privacy_policy',$data);
    }
    public function TermsAndService(){
        $data['page']="";
        $this->load->web_temp('terms_and_service',$data);
    }
}
