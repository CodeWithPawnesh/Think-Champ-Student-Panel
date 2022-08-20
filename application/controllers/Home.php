<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$this->load->web_temp('home');
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
    public function Login(){
        $this->load->web_temp('login');
    }
    public function PrivacyPolicy(){
        $this->load->web_temp('privacy_policy');
    }
    public function TermsAndService(){
        $this->load->web_temp('terms_and_service');
    }
}
