<?php
//$autoload['libraries'] = array('database','session');
$autoload['libraries'] = array('session');
class My_Loader extends CI_Loader {
    public function __construct() {
        parent::__construct();
    }
    public function web_temp($template_name)
    {   
        $content = $this->view('web/includes/web_header'); // header
        $content = $this->view('web/pages/'.$template_name); // view
        $content = $this->view('web/includes/web_footer'); // footer
        return $content;
    }
}
?>