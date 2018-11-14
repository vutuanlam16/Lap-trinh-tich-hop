<?php

class mSubject extends MY_Model {
	
	function __construct() {
		$this->key = 'subject_id';
		$this->table ='subject';
		parent::__construct();
	}
	// public function get_name($id){
	// 	return $this->get_row_rule(array('id' => $id), 'username');
	// }
	
}
