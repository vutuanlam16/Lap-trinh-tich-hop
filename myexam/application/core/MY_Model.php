<?php
defined('BASEPATH') or exit('Not direct script access allowed');
class MY_Model extends CI_Model {
    function __construct() {
        parent::__construct();
        $this->load->library("mailer");
        $this->mailer->initialize($this->config);
    }
}

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

