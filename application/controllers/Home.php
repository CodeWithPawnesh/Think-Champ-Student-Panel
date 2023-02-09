<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    function __construct()
	{
		parent::__construct();
		$this->load->model('Student_model','SM');
        $this->load->model('Mail_model','MAM');
    }
	public function index()
	{
        $hdata['title']="Learn Programming Skills Online with Think-Champ Live Classes";
        $hdata['description']="Get structured courses for Software development, Compititive Coding, Front-End Skills, Back-End Skills, Website Development.";
        $hdata['keywords']="Coding Challenges, Workshops, Development, Software, Back-End, Front-End";
        $data['placed_at'] = $this->SM->get_student_placed_at();
        $data['blog_list'] = $this->SM->get_all_blogs();
        $data['course_data'] = $this->SM->get_course();
        if(isset($_POST['submit'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];
            $data = array(
                "name"=>$name,
                "email"=>$email,
                "phone"=>$phone,
                "subject"=>$subject,
                "message"=>"$message",
            );
            $result = $this->SM->insert_lead($data);
            if($result == true){
                $this->MAM->send_mail_contact($email,$name);
				redirect("Home/touch_success");
            }
        }
        if(isset($_POST['subscribe'])){
            $email = $_POST['email'];
            $data = array(
                "email"=>$email
            );
            $result = $this->SM->insert_community($data);
            if($result == true){
                $this->MAM->send_mail_community($email);
				redirect("Home/community_success");
            }
        }
		$this->load->web_temp_2('home',$data,$hdata);
	}
    public function AboutUs(){
        $hdata['title']="Learn Programming Skills Online with Think-Champ Live Classes";
        $hdata['description']="Get structured courses for Software development, Compititive Coding, Front-End Skills, Back-End Skills, Website Development.";
        $hdata['keywords']="Coding Challenges, Workshops, Development, Software, Back-End, Front-End";
        $data['page']="";
        $this->load->web_temp('about_us',$data,$hdata);
    }
    public function Contact(){
        $hdata['title']="Learn Programming Skills Online with Think-Champ Live Classes";
        $hdata['description']="Get structured courses for Software development, Compititive Coding, Front-End Skills, Back-End Skills, Website Development.";
        $hdata['keywords']="Coding Challenges, Workshops, Development, Software, Back-End, Front-End";
        $data['page']="";
        $this->load->web_temp('contact',$data,$hdata);
    }
    public function Faq(){
        $hdata['title']="Learn Programming Skills Online with Think-Champ Live Classes";
        $hdata['description']="Get structured courses for Software development, Compititive Coding, Front-End Skills, Back-End Skills, Website Development.";
        $hdata['keywords']="Coding Challenges, Workshops, Development, Software, Back-End, Front-End";
        $data['page']="";
        $this->load->web_temp('faq',$data,$hdata);
    }
    public function PrivacyPolicy(){
        $hdata['title']="Learn Programming Skills Online with Think-Champ Live Classes";
        $hdata['description']="Get structured courses for Software development, Compititive Coding, Front-End Skills, Back-End Skills, Website Development.";
        $hdata['keywords']="Coding Challenges, Workshops, Development, Software, Back-End, Front-End";
        $data['page']="";
        $this->load->web_temp('privacy_policy',$data,$hdata);
    }
    public function TermsAndService(){
        $hdata['title']="Learn Programming Skills Online with Think-Champ Live Classes";
        $hdata['description']="Get structured courses for Software development, Compititive Coding, Front-End Skills, Back-End Skills, Website Development.";
        $hdata['keywords']="Coding Challenges, Workshops, Development, Software, Back-End, Front-End";
        $data['page']="";
        $this->load->web_temp('terms_and_service',$data,$hdata);
    }
    public function touch_success(){
		$this->load->view("web/touch_success");
	}
    public function community_success(){
		$this->load->view("web/community_success");
	}
}
