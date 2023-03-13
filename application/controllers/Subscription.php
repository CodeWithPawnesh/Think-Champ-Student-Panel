<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//include rozerpay 
require APPPATH.'views/rozerpay/razorpay_php/Razorpay.php';
use Razorpay\Api\Api;
class Subscription extends CI_Controller {
    function __construct()
	{
		parent::__construct();
		$this->load->model('Student_model','SM');
		$this->load->model('Mail_model','MAM');
        $this->load->model('Subscription_model','SBM');
    }
	public function index()
	{
		if(isset($_POST['submit'])){
			$flag = 1;
			$course_id = $_POST['course_id'];
			$price = $_POST['price'];
			$t_price = $_POST['t_price'];
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
			$gender = $_POST['gender'];
			$c_pass = $_POST['c_pass'];
			$pay_type = $_POST['pay_type'];
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
                    "created_ts"=>$created_ts,
					"status"=>1
                );
                $student_data = array(
                    "student_name"=>$name,
                    "email"=>$email,
                    "phone"=>$number,
                    "collage"=>$student_ab,
                    "created_at"=>$created_ts,
                    "status"=>'1',
					"gender"=>$gender
                );
				$course_data = array(
					"course_id"=>$course_id,
                    "batch_id"=>$batch_id,
				);
				$this->session->set_userdata('raz_total_price', $t_price);
				$this->session->set_userdata('raz_pay_type', $pay_type);
				$this->session->set_userdata('raz_stu_data', $student_data);
				$this->session->set_userdata('raz_log_data', $user_data);
				$this->session->set_userdata('raz_crs_data', $course_data);
				//create order
				if($email=='pawnesh1999@gmail.com'){
		$key_id = "rzp_test_GUx0qaLfzdvD5u"; //test
		$secret = "ZmujxFz5T9sDjLufIkorzoe8";//test
				}else{
		$key_id = "rzp_live_49RY8lWxxDaBbc"; //Live
		$secret = "HVoVj9kAhE6rmBt2Uu4obm6c";//Live
				}
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
                $this->load->web_temp('course_enrollment_form',$data);
            }
		}
	}
	public function payment_status(){
		if($email=='pawnesh1999@gmail.com'){
			$key_id = "rzp_test_GUx0qaLfzdvD5u"; //test
			$secret = "ZmujxFz5T9sDjLufIkorzoe8";//test
					}else{
			$key_id = "rzp_live_49RY8lWxxDaBbc"; //Live
			$secret = "HVoVj9kAhE6rmBt2Uu4obm6c";//Live
					}
		//student_data
		$student_data = $this->session->userdata('raz_stu_data');
		//Student login data
		$login_data = $this->session->userdata('raz_log_data');
		$course_data = $this->session->userdata('raz_crs_data');
		//pay type
		$pay_type = $this->session->userdata('raz_pay_type');
		//total price
		$total_price = $this->session->userdata('raz_total_price');
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
		$course_id = $course_data['course_id'];
		$batch_id = $course_data['batch_id'];
		//Signature Verification
		$roz_data = $roz_order_id. "|" . $roz_payment_id;
		$generated_signature = hash_hmac("sha256",$roz_data,$secret);
		$order_data = array(
			"main_order_id"=>$roz_order_id,
			"pay_order_id"=>$roz_order_id,
			"payment_id"=>$roz_payment_id,
			"fee_paid"=>$amount,
			"course_id"=>$course_id,
			"batch_id"=>$batch_id,
			"method"=>$method,
			"order_date"=>$order_date,
			"order_tc"=>$capture_tc,
			"status"=>$status,
			"pay_type"=>$pay_type,
			"mode"=>1,
			"pay_no"=>1
	);
	$order_data_inst_2="0";
	$order_data_inst_3="0";
	if($pay_type==2){
		  $pending_amount = round($total_price/2);
		  $date = date('y-m-d');
		  $ins_2_date = strtotime(date("Y-m-d", strtotime($date)) . " +15 days");
	      $order_data_inst_2 = array(
		  "main_order_id"=>$roz_order_id,
		  "pending_amount"=>$pending_amount,
		  "course_id"=>$course_id,
		  "batch_id"=>$batch_id,
		  "pay_type"=>$pay_type,
		  "pay_no"=>2,
		  "due_date"=>$ins_2_date
          );
	       }
	if($pay_type==3){
		$pending_amount = round($total_price/3);
		$date = date('y-m-d');
		$ins_2_date = strtotime(date("Y-m-d", strtotime($date)) . " +15 days");
		$date = date('y-m-d');
		$ins_3_date = strtotime(date("Y-m-d", strtotime($date)) . " +30 days");
		$order_data_inst_2 = array(
			"main_order_id"=>$roz_order_id,
			"pending_amount"=>$pending_amount,
			"course_id"=>$course_id,
			"batch_id"=>$batch_id,
			"pay_type"=>$pay_type,
			"pay_no"=>2,
			"due_date"=>$ins_2_date,
			);
         $order_data_inst_3 = array(
		"pending_amount"=>$pending_amount,
	     "main_order_id"=>$roz_order_id,
	     "course_id"=>$course_id,
	     "batch_id"=>$batch_id,
	     "pay_type"=>$pay_type,
	     "pay_no"=>3,
		 "due_date"=>$ins_3_date
          );
		}
       if ($generated_signature == $roz_signature) {
		$result = $this->SBM->sub_student($student_data,$login_data,$order_data,$course_data,$order_data_inst_2,$order_data_inst_3);
		if($result == true){
		$course_name = $this->SM->get_course_name($student_data['course_id']);
		$this->MAM->send_mail_student_enrolment($student_data,$login_data,$course_name);
		redirect("Subscription/payment_success");
		}
           }else{
			echo "Payment Failed"; 
		   }
	}
	public function payment_success(){
		$this->load->view("web/payment_success");
	}
	// Installments
	public function pay_installments(){
		$student_data = $this->session->userdata('user_data');
		if(isset($_GET['od'])){
			$order_id = base64_decode($_GET['od']);
			$pending_amount = base64_decode($_GET['pa']);
		    $price_r = $pending_amount *100;
				//create order
				if($email=='pawnesh1999@gmail.com'){
					$key_id = "rzp_test_GUx0qaLfzdvD5u"; //test
					$secret = "ZmujxFz5T9sDjLufIkorzoe8";//test
							}else{
					$key_id = "rzp_live_49RY8lWxxDaBbc"; //Live
					$secret = "HVoVj9kAhE6rmBt2Uu4obm6c";//Live
							}
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
				$this->session->set_userdata('inst_raz_pending_amount', $pending_amount);
				$this->session->set_userdata('inst_raz_order_id', $order_id);
				$this->session->set_userdata('inst_raz_student_data', $student_data);
						// $this->SBM->insert_student($user_data,$student_data);
						$this->load->view('web/pages/installment_checkout.php',$data);
					}
				}
	public function install_status(){
		$student_data = $this->session->userdata('inst_raz_student_data');
		$order_id = $this->session->userdata('inst_raz_order_id');
		$pending_amount = $this->session->userdata('inst_raz_pending_amount');
		if($email=='pawnesh1999@gmail.com'){
			$key_id = "rzp_test_GUx0qaLfzdvD5u"; //test
			$secret = "ZmujxFz5T9sDjLufIkorzoe8";//test
					}else{
			$key_id = "rzp_live_49RY8lWxxDaBbc"; //Live
			$secret = "HVoVj9kAhE6rmBt2Uu4obm6c";//Live
					}
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
		$newPendingAmount = $pending_amount - $amount;
		//Signature Verification
		$roz_data = $roz_order_id. "|" . $roz_payment_id;
		$generated_signature = hash_hmac("sha256",$roz_data,$secret);
		$order_data = array(
			"pay_order_id"=>$roz_order_id,
			"payment_id"=>$roz_payment_id,
			"fee_paid"=>$amount,
			"pending_amount"=>$newPendingAmount,
			"method"=>$method,
			"order_date"=>$order_date,
			"order_tc"=>$capture_tc,
			"status"=>$status,
			"mode"=>1,
	);
       if ($generated_signature == $roz_signature) {
		$result = $this->SBM->sub_install($order_data,$order_id);
		if($result == true){
			$paid_order_detail = $this->SM->get_paid_order_detail($order_id);
		$this->MAM->send_mail_student_install_pay($student_data,$paid_order_detail);
		redirect("Subscription/install_success");
		}
           }else{
			echo "Payment Failed"; 
		   }
	}
	public function install_success(){
		$this->load->view("web/install_success");
	}
}