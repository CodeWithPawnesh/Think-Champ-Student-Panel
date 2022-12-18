<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Workshop extends CI_Controller {
	function __construct()
    {
	parent::__construct();
		$this->load->helper('form', 'url');
		$this->load->model('Student_model', 'SPM');
		$this->load->model('Auth_model', 'AM');
		$this->load->model('Mail_model','MAM');
	}
	public function index()
	{
        $data['page'] = "";
		if(isset($_POST['submit'])){
			$name = $_POST['name'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$workshop_id = $_POST['workshop_id'];
			$data = array(
				"name"=>$name,
				"email"=>$email,
				"phone"=>$phone,
				"workshop_id"=>$workshop_id
			);
			$result = $this->SPM->enroll_in_workshop($data);
			$workshop_detail = $this->SPM->get_workshop_detail($workshop_id);
			$workshop_detail = $workshop_detail[0];
			if($result == true){
				$this->MAM->send_mail_workshop_enrollment($workshop_detail,$data);
				redirect("Workshop/enroll_success");
			}
		}
		$data['workshop_list'] = $this->SPM->get_all_workshop();
		$this->load->web_temp('workshop',$data);
	}
	public function article($url){
		$urlArray = explode("-",$url);
		$arrSize = sizeof($urlArray);
		$keyId = $arrSize-1;
		$workshop_id = $urlArray[$keyId];
		$data['workshop_list'] = $this->SPM->get_all_workshop();
		$data['workshop_detail'] = $this->SPM->get_workshop_detail($workshop_id);
		$data['workshop_detail'] = $data['workshop_detail'][0];
		$this->load->web_temp('workshop_detail',$data);
	}
	public function enroll_success(){
		$this->load->view("web/workshop_enroll_success");
	}
}
