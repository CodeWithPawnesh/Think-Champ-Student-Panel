<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificate extends CI_Controller {
    function __construct()
	{
		parent::__construct();
		$this->load->model('Student_model','SM');
    }
	public function index()
	{
        $data['page'] = "page";
		$data['certificate_data'] = $this->SM->get_certificate();
        $this->load->student_panel('certificate_list',$data);
	}
	public function view_certificate(){
		if(isset($_GET['id'])){
			$id = base64_decode($_GET['id']);
			$data['certificate_data'] = $this->SM->get_one_certificate($id);
			$data['certificate_data'] = $data['certificate_data'][0];
		}
		$this->load->view("web/student_panel/certificate",$data);
	}
	public function verification($certificate_no){
		if(!empty($certificate_no)){
			$cerArr = explode("-",$certificate_no);
			$stdId = $cerArr[2];
			$batchId = $cerArr[3];
			$data['certificate_data'] = $this->SM->verify_certificate($stdId,$batchId);
			$data['certificate_data']=$data['certificate_data'][0];
			if($data['certificate_data']==false){
				echo "No Certificate Exists";
				exit;
			}
		$this->load->view("web/student_panel/certificate",$data);
		}
	}
}