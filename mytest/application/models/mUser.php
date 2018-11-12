<?php
class mUser extends MY_Model {
	function __construct(){
		parent::__construct();
		$this->table = 'user';
		$this->key = 'id';
	}
	public function ban_user($id){
		$sql = "UPDATE user SET is_delete = 1 where id = $id";
		$this->db->query($sql); 
	}	
}