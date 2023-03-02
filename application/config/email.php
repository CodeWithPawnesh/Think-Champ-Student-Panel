<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$config =array(
    'mailpath'=>'/usr/sbin/sendmail',
    'protocol'=>'smtp',
    'smtp_host'=>'ssl://mail.think-champ.com',
    'smtp_port'=>465,
    'smtp_user'=>'no-replay@think-champ.com',
    'smtp_pass'=>'No@reply',
    'newline'=>"\r\n",
    'mailtype'=>'html',
    'smtp_timeout'=>'30',
    'charset'=>'utf-8',
    'validate'=>TRUE,
    'wordwrap'=>TRUE
);