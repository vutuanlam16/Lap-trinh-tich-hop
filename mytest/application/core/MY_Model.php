<?php
defined('BASEPATH') or exit('Not direct script access allowed');
class MY_Model extends CI_Model {
	protected $table = '';
	protected $key = '';
	protected $sort_by = '';
	protected $select = '';

	function create($data = array())
	{
		// log_message("info", "aab"); //error, debug, info
		if ($this->db->insert($this->table, $data)) {
			return TRUE;
		} else {
			// log_message("info", "nok");
			return FALSE;
		}
	}

	function update_rule($where, $data)
	{
		if (! $where) {
			return FALSE;
		} else {
			$this->db->where($where);
			if ($this->db->update($this->table, $data)) {
				return TRUE;
			}
			return FALSE;
		}
	}

	function update($id, $data)
	{
		if (! $id) {
			return FALSE;
		}
		
		$where = array(
			$this->key => $id
		);
		return $this->update_rule($where, $data);
	}

	function delete_rule($where)
	{
		if (! $where) {
			return FALSE;
		} else {
			$this->db->where($where);
			if ($this->db->delete($this->table)) {
				return TRUE;
			}
			return FALSE;
		}
	}

	function insert_batch($data_array){
		if($data_array != null && count($data_array) > 0){
			if($this->db->insert_batch($this->table, $data_array)){
				return TRUE;
			}
		}
		return FALSE;
	}

	function delete($id)
	{
		if (! $id) {
			return FALSE;
		}
		$where = array(
			$this->key => $id
		);
		return $this->delete_rule($where);
	}

	function get_row_rule($where = array(), $field = '')
	{
		$this->db->where($where);
		if (! empty($field)) {
			$this->db->select($field);
		}
		$records = $this->db->get($this->table);
		if ($records->num_rows()) {
			return $records->row();
		}
		return FALSE;
	}

	function get_row($id, $field = '')
	{
		if (! $id) {
			return FALSE;
		}
		$where = array(
			$this->key => $id
		);
		return $this->get_row_rule($where, $field);
	}
//ASC tăng dần
	function get_list_set_input($input = array())
	{
		if (isset($input['select'])) {
			$this->db->select($input['select']);
		}
		if (isset($input['where']) && $input['where']) {
			$this->db->where($input['where']);
		}
		if(isset($input['in'][0]) && isset($input['in'][1])){
			$this->db->where_in($input['in'][0], $input['in'][1]);
		}
		if (isset($input['like'][0]) && isset($input['like'][1])) {
			$this->db->like($input['like'][0], $input['like'][1]);
		}
		if (isset($input['order'][0]) && isset($input['order'][1])) {
			$this->db->order_by($input['order'][0], $input['order'][1]);
		} else {
			$this->db->order_by($this->table.'.'.$this->key, 'DESC');
		}
		if (isset($input['limit'][0]) && isset($input['limit'][1])) {
			$this->db->limit($input['limit'][0], $input['limit'][1]);
		}
		if (isset($input['join'])) {
			$this->db->from($this->table);
			foreach ( $input['join'] as $join_table=>$where_column ) {
				$this->db->join($join_table, $where_column);
			}
			return $this->db->get();
		} else {
			return $this->db->get($this->table);
		}
	}

	function get_list($input = array())
	{
		$query = $this->get_list_set_input($input);
// 		show_text($this->db->last_query(), 1);
		return $query->result();
	}

	function get_totals($input = array())
	{
		$query = $this->get_list_set_input($input);
// 		var_dump($this->db->last_query());
// 		exit();
		return $query->num_rows();
	}

	function check_exist($where = array())
	{
		$this->db->where($where);
		$query = $this->db->get($this->table);
		if ($query->num_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}
/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */