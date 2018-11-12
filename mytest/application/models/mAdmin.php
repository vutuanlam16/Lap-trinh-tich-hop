<?php

class mAdmin extends MY_Model {
	
	function __construct() {
		$this->key = 'id';
		$this->table = 'user';
		parent::__construct();
	}
	// public function get_name($id){
	// 	return $this->get_row_rule(array('id' => $id), 'username');
	// }
	
}
