<?php

class Common extends CI_Controller {

    function __construct() {
        parent::__construct();
    }

    public function error() {
        log_message("info", "111");
        $this->load->view('error');
    }
}    