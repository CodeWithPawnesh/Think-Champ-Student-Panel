<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {
	function __construct()
    {
	parent::__construct();
		$this->load->helper('form', 'url');
		$this->load->model('Student_model', 'SPM');
		$this->load->model('Auth_model', 'AM');
	}
	public function index()
	{
		$hdata['title']="Learn Programming Skills Online with Think-Champ Live Classes";
        $hdata['description']="Get structured courses for Software development, Compititive Coding, Front-End Skills, Back-End Skills, Website Development.";
        $hdata['keywords']="Coding Challenges, Workshops, Development, Software, Back-End, Front-End";
        $data['page'] = "";
		$data['blog_list'] = $this->SPM->get_all_blogs();
		$this->load->web_temp('blog',$data,$hdata);
	}
	public function article($url){
		$hdata['title']="Learn Programming Skills Online with Think-Champ Live Classes";
        $hdata['description']="Get structured courses for Software development, Compititive Coding, Front-End Skills, Back-End Skills, Website Development.";
        $hdata['keywords']="Coding Challenges, Workshops, Development, Software, Back-End, Front-End";
		$urlArray = explode("-",$url);
		$arrSize = sizeof($urlArray);
		$keyId = $arrSize-1;
		$blog_id = $urlArray[$keyId];
		$data['blog_list'] = $this->SPM->get_all_blogs();
		$data['blog_detail'] = $this->SPM->get_blog_detail($blog_id);
		$data['blog_detail'] = $data['blog_detail'][0];
		$this->load->web_temp('blog_detail',$data,$hdata);
	}
}
