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
        $data['page'] = "";
		$data['blog_list'] = $this->SPM->get_all_blogs();
		$this->load->web_temp('blog',$data);
	}
	public function article($url){
		$urlArray = explode("-",$url);
		$arrSize = sizeof($urlArray);
		$keyId = $arrSize-1;
		$blog_id = $urlArray[$keyId];
		$data['blog_list'] = $this->SPM->get_all_blogs();
		$data['blog_detail'] = $this->SPM->get_blog_detail($blog_id);
		$data['blog_detail'] = $data['blog_detail'][0];
		$this->load->web_temp('blog_detail',$data);
	}
}
