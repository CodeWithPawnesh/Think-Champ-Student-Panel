<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//include rozerpay 
require APPPATH.'views/rozerpay/razorpay-php/Razorpay.php';
use Razorpay\Api\Api;
class Subscription extends CI_Controller {
    function __construct()
	{
		parent::__construct();
		$this->load->model('Student_model','SM');
        $this->load->model('Subscription_model','SBM');
    }
	public function index()
	{
		if(isset($_POST['submit'])){
			$flag = 1;
			$course_id = $_POST['course_id'];
			$price = $_POST['price'];
			$price_r = $_POST['price'] * 100;
			$data['course_detail'] = $this->SM->get_course_detail($course_id);
			$data['course_detail'] = $data['course_detail'][0];
			$data['batch_detail'] = $this->SM->get_batch_data($course_id);
			$name = $_POST['name'];
			$email = $_POST['email'];
			$number = $_POST['number'];
			$pass = $_POST['pass'];
			if(isset($_POST['batch_id'])){
			$batch_id = $_POST['batch_id'];
			}else{
				$batch_id = "";
			}
			$student_ty = $_POST['student_ty'];
			$student_ab = $_POST['student_ab'];
			if(isset($_POST['gender'])){
			$gender = $_POST['gender'];
			}else{
				$gender="";
			}
			$c_pass = $_POST['c_pass'];
			$row = $this->SM->get_student_row($email);
			if($row>0){
			$data["error_mess"][] = "E-mail Is Already Registered!";
			$flag = 0;
			}
			if(!isset($_POST['batch_id'])){
				$data["error_mess"][]="Please Select A Batch";
				$flag=0;
			}
			if($pass != $c_pass){
				$data["error_mess"][]=" Confirmation Password Is Not Matching";
				$flag=0;
			}
			if($flag == 1){
                $pass_o = md5($pass);
                $date = date("Y-m-d h:i:sa");
                $created_ts = strtotime($date);
				$user_data = array(
                    "email"=>$email,
                    "password"=>$pass,
                    "password_o"=>$pass_o,
                    "access_level"=>'3',
                    "created_ts"=>$created_ts
                );
                $student_data = array(
                    "student_name"=>$name,
                    "email"=>$email,
                    "phone"=>$number,
                    "collage"=>$student_ab,
                    "course_id"=>$course_id,
                    "batch_id"=>$batch_id,
                    "created_at"=>$created_ts,
                    "status"=>'1'
                );
				$this->session->set_userdata('raz_stu_data', $student_data);
				$this->session->set_userdata('raz_log_data', $user_data);
				//create order
		$key_id = "rzp_test_GUx0qaLfzdvD5u"; //test
		$secret = "ZmujxFz5T9sDjLufIkorzoe8";//test
		// $key_id = "rzp_live_49RY8lWxxDaBbc"; //Live
		// $secret = "HVoVj9kAhE6rmBt2Uu4obm6c";//Live
		$api = new Api($key_id, $secret);
		$order = $api->order->create([
			'receipt'=>'order_rcptid_11',
			'amount'=>$price_r,
			'currency'=>'INR',
		]);
		$data['order'] = $order;
		$data['key_id'] = $key_id;
		$data['secret'] = $secret;
		$data['student_data'] = $student_data;
		$data['user_data'] = $user_data;
                // $this->SBM->insert_student($user_data,$student_data);
				$this->load->view('web/pages/razorpay_checkout.php',$data);
			}
		    if($flag==0){
                $this->load->web_temp('course_detail',$data);
            }
		}
	}
	public function payment_status(){
		// $key_id = "rzp_live_49RY8lWxxDaBbc"; //Live
		// $secret = "HVoVj9kAhE6rmBt2Uu4obm6c";//Live
		$key_id = "rzp_test_GUx0qaLfzdvD5u"; //test
		$secret = "ZmujxFz5T9sDjLufIkorzoe8";//test
		//student_data
		$student_data = $this->session->userdata('raz_stu_data');
		//Student login data
		$login_data = $this->session->userdata('raz_log_data');
		//order details 
		$roz_payment_id = $_POST['razorpay_payment_id'];
		$roz_order_id = $_POST['razorpay_order_id'];
		$roz_signature = $_POST['razorpay_signature'];
		$api = new Api($key_id, $secret);
		$payment = $api->payment->fetch($roz_payment_id);
		$amount = $payment->amount;
		$amount = $amount/100;
		$method = $payment->method;
		$status = $payment->captured;
		$capture_tc = $payment->created_at;
		$order_date = date('y-m-d');
		$course_id = $student_data['course_id'];
		$batch_id = $student_data['batch_id'];
		//Signature Verification
		$roz_data = $roz_order_id. "|" . $roz_payment_id;
		$generated_signature = hash_hmac("sha256",$roz_data,$secret);
		$order_data = array(
			"pay_order_id"=>$roz_order_id,
			"payment_id"=>$roz_payment_id,
			"fee_paid"=>$amount,
			"course_id"=>$course_id,
			"batch_id"=>$batch_id,
			"method"=>$method,
			"order_date"=>$order_date,
			"order_tc"=>$capture_tc,
			"status"=>$status
	);
       if ($generated_signature == $roz_signature) {
		$this->SBM->sub_student($student_data,$login_data,$order_data);
           }else{
			echo "Payment Failed";
		   }
	}
	public function payment_success(){
		$this->load->view("web/payment_success");
	}
}