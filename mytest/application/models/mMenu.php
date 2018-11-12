<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class mMenu extends MY_Model {

	function __construct() {
		parent::__construct();
		$this->table = 'menu';
		$this->key = 'id';
	}
	public function getMenus($filters = array(), $count = false) {
		$menu_role = false;
		$this->db->select('m.*')->from('menu as m');

		if (isset($filters['id'])) {
			$this->db->where('m.id', $filters['id']);
		}
		if (isset($filters['role_id'])) {
			$menu_role = true;
			$this->db->join('role_menu as rm', 'rm.menu_id = m.id');
			$this->db->where('rm.role_id', $filters['role_id']);
		}
		if (isset($filters['status'])) {
			$this->db->where('m.status', $filters['status']);
		}
		if (isset($filters['parent_id'])) {
			$this->db->where('m.parent_id', $filters['parent_id']);
		}
		if (isset($filters['module'])) {
			$this->db->where('m.module', $filters['module']);
		}
		if (isset($filters['link'])) {
			$this->db->where('m.link', $filters['link']);
		}
		if (isset($filters['role_id'])) {
			$role_id = $filters['role_id'];
		} else {
			$role_id = 0;
		}
		if (isset($filters['menu_crud']))
			$status_filter = array();
		else
			$status_filter = array('status' => 1);

		$this->db->where('m.status != 99');
		$result = $this->db->get();
		if ($count) {
			$rows = $result->num_rows();
			$result->free_result();
			return $rows;
		}
		if ($result->num_rows() == 0) {
			return false;
		}
		$menus = $result->result_array();
		$this->load->model('mSetting');
		$this->load->model('mRole');
		foreach ($menus as $k => $row) {
			$menus[$k]['menu_checked'] = false;
			if (isset($filters['module'])) {
				if ($role_id > 0) {
					$menus[$k]['menu_list_sub'] = $this->getMenus(array_merge(array('module' => $filters['module'], 'parent_id' => $row['id'], 'role_id' => $role_id, 'menu_role' => $menu_role), $status_filter));
				} else {
					$menus[$k]['menu_list_sub'] = $this->getMenus(array_merge(array('module' => $filters['module'], 'parent_id' => $row['id'], 'menu_role' => $menu_role), $status_filter));
				}
			} else {
				$menus[$k]['menu_list_sub'] = $this->getMenus(array_merge(array('parent_id' => $row['id'], 'role_id' => $role_id, 'menu_role' => $menu_role), $status_filter));
			}

			$get_role_menu = $this->mRole->getRoleMenus(
				array(
					'role_id' => $role_id,
					'menu_id' => $row['id']
				)
			);
			if ($get_role_menu) {
				$menus[$k]['menu_checked'] = true;
				$action_setting = $get_role_menu[0]['actions'];
			} else
			$action_setting = '';
			if ($row['actions']) {
				$menus[$k]['menu_action_array'] = $this->mSetting->getSettings(array('type' => 1, 'actions' => $row['actions'], 'action_setting' =>
					$action_setting));
			}
			// $setting = $this->mSetting->getSetting(array('key_setting' => $row['module'], 'type' => 2));
			// $menus[$k]['module_show'] = $setting['value'];
		}

		$result->free_result();
		return $menus;
	}

	public function getMenuRoles($filters = array(), $count = false) {
		$menu_role = false;
		$this->db->select('m.*')->from('menu as m');

		if (isset($filters['id'])) {
			$this->db->where('m.id', $filters['id']);
		}
		if (isset($filters['status'])) {
			$this->db->where('m.status', $filters['status']);
		}
		if (isset($filters['parent_id'])) {
			$this->db->where('m.parent_id', $filters['parent_id']);
		}
		if (isset($filters['module'])) {
			$this->db->where('m.module', $filters['module']);
		}
		if (isset($filters['role_id'])) {
			$role_id = $filters['role_id'];
		} else {
			$role_id = 0;
		}
		
		$this->db->where('m.status != 99');
		$result = $this->db->get();
		if ($count) {
			$rows = $result->num_rows();
			$result->free_result();
			return $rows;
		}
		if ($result->num_rows() == 0) {
			return false;
		}
		$menus = $result->result_array();
		$this->load->model('mSetting');
		$this->load->model('mRole');
		foreach ($menus as $k => $row) {
			$menus[$k]['menu_checked'] = false;

			$menus[$k]['menu_list_sub'] = $this->getMenuRoles(array('parent_id' => $row['id'], 'role_id' => $role_id, 'menu_role' => $menu_role));
			

			$get_role_menu = $this->mRole->getRoleMenus(
				array(
					'role_id' => $role_id,
					'menu_id' => $row['id']
				)
			);
			if ($get_role_menu) {
				$menus[$k]['menu_checked'] = true;
				$action_setting = $get_role_menu[0]['actions'];
			} else
			$action_setting = '';
			if ($row['actions']) {
				$menus[$k]['menu_action_array'] = $this->mSetting->getSettings(array('type' => 1, 'actions' => $row['actions'], 'action_setting' =>
					$action_setting));
			}
		}
		$result->free_result();
		return $menus;
	}

}

/* End of file mMenu.php */
/* Location: ./application/models/mMenu.php */