<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Mail_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('form','url');
        $this->load->library('email');
    }
    
    function send_mail_student_enrolment($student_data,$login_data,$course_name){
        $email = $student_data['email'];
        $this->email->from('pawnesh1999@gmail.com', 'Think Champ Pvt.Ltd');
        $this->email->to($email);
        $this->email->bcc('thinkchamp.pvt.ltd@gmail.com');
        $this->email->subject('Enrollment In '.$course_name[0]['course_name']);
        $message = $this->template_student_enrollment($student_data,$login_data,$course_name); 
        $this->email->message($message);
       if( $this->email->send()){
        echo "sent";
       }else{
        $this->email->print_debugger();
       }
    }
    function send_mail_workshop_enrollment($workshop_detail,$data){
        $email = $data['email'];
        $this->email->from('pawnesh1999@gmail.com', 'Think Champ Pvt.Ltd');
        $this->email->to($email);
        $this->email->bcc('thinkchamp.pvt.ltd@gmail.com');
        $this->email->subject('Enrollment In Workshop '.$workshop_detail['workshop_name']);
        $message = $this->template_student_enrollment_workshop($workshop_detail,$data); 
        $this->email->message($message);
       if( $this->email->send()){
        echo "sent";
       }else{
        $this->email->print_debugger();
       }
    }
    function template_student_enrollment($student_data,$login_data,$course_name){
        ob_start();
    ?>
        <!DOCTYPE html><html><head> <style>*{font-family: Arial, Helvetica, sans-serif;}html,body{margin: 0;padding: 0;}body{background: #f0f0f0;}</style></head><body> <table cellpadding="0" cellspacing="0" border="0" align="center" style="background: #f0f0f0; width: 100%;"> <tbody> <tr> <td> <table style="border-collapse:collapse;margin:auto;max-width:635px;min-width:320px;width:100%"> <tbody> <tr> <td valign="top"> <table cellpadding="0" cellspacing="0" border="0" style="height:40px"></table> </td></tr><tr> <td valign="top" style="padding:0 20px"> <div style="border-top:5px solid #8b4cdc; width:100%; display:block; box-shadow: 0px 0px 5px #ccc; background:#fff; padding:25px;"> 
        <p>Dear <strong><?=$student_data['student_name']?></strong>,</p><p>Think Champ.</p><p>Thank you for registering with us. Your login credentials are as follows:</p>
        <p style="font-weight:bold">Course: <?=$course_name[0]['course_name']?></p>
        <p style="font-weight:bold">Email: <?=$student_data['email']?></p>
        <p style="font-weight:bold">Password: <?=$login_data['password']?></p>
        <p>&nbsp;</p><a style="padding:15px 30px; background:#8b4cdc; margin:15px 0px; cursor:pointer; color:#fff; text-decoration:none" href="https://think-champ.com/auth/">Login Now</a><p>&nbsp;</p>
        <p>In case the above link does not work, copy and paste following link in browser.</p>
        <a href="https://think-champ.com/auth/" style="font-weight:bold">https://think-champ.com/auth/</a>
        <p>Don't forget to change your password once you login. In case of any query, feel free to contact us.</p><p>Regards,<br>Think Champ Team</p><img src="http://localhost/Think-Champ/assets/images/home/Tc_logo2.png" ></a></p></div></td></tr></tbody> </table> </td></tr></tbody> </table></body></html>
    <?php
        return ob_get_clean();
    }
   function template_student_enrollment_workshop($workshop_detail,$data){
    ob_start();
    ?>
        <!DOCTYPE html><html><head> <style>*{font-family: Arial, Helvetica, sans-serif;}html,body{margin: 0;padding: 0;}body{background: #f0f0f0;}</style></head><body> <table cellpadding="0" cellspacing="0" border="0" align="center" style="background: #f0f0f0; width: 100%;"> <tbody> <tr> <td> <table style="border-collapse:collapse;margin:auto;max-width:635px;min-width:320px;width:100%"> <tbody> <tr> <td valign="top"> <table cellpadding="0" cellspacing="0" border="0" style="height:40px"></table> </td></tr><tr> <td valign="top" style="padding:0 20px"> <div style="border-top:5px solid #8b4cdc; width:100%; display:block; box-shadow: 0px 0px 5px #ccc; background:#fff; padding:25px;"> 
        <p>Dear <strong><?=$data['name']?></strong>,</p><p>Think Champ.</p><p>Thank you for registering in our workshop. Your workshop joining details are as follows:</p>
        <p style="font-weight:bold">Workshop Name: <?=$workshop_detail['workshop_name']?></p>
        <p style="font-weight:bold">Workshop Start Date And Time: <?=$workshop_detail['start_date_time']?></p>
        <p style="font-weight:bold">Workshop End Date And Time: <?=$workshop_detail['end_date_time']?></p>
        <p style="font-weight:bold">Workshop Address: <?=$workshop_detail['workshop_address']?></p>
        <p>Regards,<br>Think Champ Team</p><img src="http://localhost/Think-Champ/assets/images/home/Tc_logo2.png" ></a></p></div></td></tr></tbody></table></td></tr></tbody></table></body></html>
    <?php
        return ob_get_clean();
    }
}