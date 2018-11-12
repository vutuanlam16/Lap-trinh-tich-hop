<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mSetting extends MY_Model {
	function __construct(){
		parent::__construct();
		$this->table = 'setting';
		$this->key = 'id';
	}
	public function getSettings($filters = array(), $count = false){
		$this->db->select('s.*')
		->from('setting as s');
		if (isset($filters['id'])){
			$this->db->where('s.id',$filters['id']);
		}
		if (isset($filters['type'])){
			$this->db->where('s.type',$filters['type']);
		}

		if (isset($filters['key_setting'])){
			$this->db->where('s.key_setting',$filters['key_setting']);
		}
		if (isset($filters['actions'])){
			$this->db->where_in('s.key_setting',explode(',',$filters['actions']));
		}
		if (isset($filters['order']))
			$this->db->order_by('s.'.$filters['order'],$filters['by']);
		else
			$this->db->order_by('s.ordering','ASC');
		$result = $this->db->get();
		if($count){
			$rows = $result->num_rows();
			$result->free_result();
			return $rows;
		}
		if ($result->num_rows() == 0) {
			return false;
		}

		$settings = $result->result_array();
		foreach ($settings as $k=>$row ){
			$settings[$k]['setting_checked'] = false;
			if (isset($filters['action_setting'])){
				$action_setting_array = explode(',', $filters['action_setting']);
				if(in_array($row['key_setting'], $action_setting_array))
					$settings[$k]['setting_checked'] = true;
			}
		}
		$result->free_result();

		return $settings;
	}
}

/* End of file mSetting.php */
/* Location: ./application/models/mSetting.php */