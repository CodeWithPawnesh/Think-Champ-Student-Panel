<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {
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
		$data['news_list'] = $this->SPM->get_all_news();
		$this->load->web_temp('news',$data,$hdata);
	}
	public function article($url){
		$hdata['title']="Learn Programming Skills Online with Think-Champ Live Classes";
        $hdata['description']="Get structured courses for Software development, Compititive Coding, Front-End Skills, Back-End Skills, Website Development.";
        $hdata['keywords']="Coding Challenges, Workshops, Development, Software, Back-End, Front-End";
        $urlArray = explode("-",$url);
		$arrSize = sizeof($urlArray);
		$keyId = $arrSize-1;
		$news_id = $urlArray[$keyId];
        $data['news_list'] = $this->SPM->get_all_news();
		$data['news_detail'] = $this->SPM->get_news_detail($news_id);
        $data['news_detail'] =$data['news_detail'][0];
		$this->load->web_temp('news_detail',$data,$hdata);
	}
}
