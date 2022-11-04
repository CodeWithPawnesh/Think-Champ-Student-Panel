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
        $data['course_data'] = $this->SM->get_course();
		$this->load->web_temp_2('home',$data);
	}
    public function AboutUs(){
        $this->load->web_temp('about_us');
    }
    public function Contact(){
        $this->load->web_temp('contact');
    }
    public function Faq(){
        $this->load->web_temp('faq');
    }
    public function PrivacyPolicy(){
        $this->load->web_temp('privacy_policy');
    }
    public function TermsAndService(){
        $this->load->web_temp('terms_and_service');
    }
}
