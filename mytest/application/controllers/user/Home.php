<?php
class Home extends MY_Controller {
	public function index(){
		//die("Kien4");
    	//$this->load->model('mTransaction');
		 $this->data['temp'] = 'user/home/index';

		// //$this->data['list'] = $this->mTransaction->get_list(array('limit' => array(10, 1)));

		 $this->load->view($this->main_layout, $this->data);
		//echo "user";
	}
}
