<?php
//$autoload['libraries'] = array('database','session');
$autoload['libraries'] = array('session');
class My_Loader extends CI_Loader {
    public function __construct() {
        parent::__construct();
    }
    public function web_temp($template_name,$data,$hdata)
    {   
        $content = $this->view('web/includes/web_header',$hdata); // header
        $content = $this->view('web/pages/'.$template_name,$data); // view
        $content = $this->view('web/includes/web_footer'); // footer
        return $content;
    }
    public function web_temp_2($template_name,$data,$hdata)
    {   
        $content = $this->view('web/includes/web_header_2',$hdata); // header
        $content = $this->view('web/pages/'.$template_name,$data); // view
        $content = $this->view('web/includes/web_footer'); // footer
        return $content;
    }
    public function student_panel($template_name,$data)
    {   
        $content = $this->view('web/student_panel/includes/student_header'); // header
        $content = $this->view('web/student_panel/'.$template_name,$data); // view
        $content = $this->view('web/student_panel/includes/student_footer'); // footer
        return $content;
    }
}
?>