<?php

class mRole extends MY_Model {

    function __construct() {
        parent::__construct();
        $this->table = 'role';
        $this->key = 'id';
    }

    public function getRole($filters) {
        $role = $this->getRoles($filters, false);
        if (empty($role)) {
            return false;
        } else {
            return $role[0];
        }
    }

    public function getRoles($filters = array(), $count = false) {
        $this->db->select('r.*')
                ->from('role as r');

        if (isset($filters['id'])) {
            $this->db->where('id', $filters['id']);
        }
        if (isset($filters['id_other'])) {
            $this->db->where('r.id !=', $filters['id_other']);
        }
        if (isset($filters['role_id_in'])) {
            $this->db->where_in('r.id', $filters['role_id_in']);
        }
        if (isset($filters['module'])) {
            $this->db->where('r.module', $filters['module']);
        }
        if (isset($filters['status'])) {
            $this->db->where('r.status', $filters['status']);
        }
        $this->db->where('r.status != 99');
        $result = $this->db->get();
        if ($count) {
            $rows = $result->num_rows();
            $result->free_result();
            return $rows;
        }
        if ($result->num_rows() == 0) {
            return false;
        }
        $roles = $result->result_array();
        $result->free_result();
        return $roles;
    }

    public function getRoleMenu($filters) {
        $role = $this->getRoleMenus($filters, false);
        if (empty($role)) {
            return false;
        } else {
            return $role[0];
        }
    }

    public function getRoleMenus($filters = array(), $count = false) {
        if (isset($filters['select'])) {
            $select = $filters['select'];
        } else {
            $select = 'r.*';
        }
        $this->db->select($select)->from('role_menu as r');

        if (isset($filters['role_id'])) {
            $this->db->where('r.role_id', $filters['role_id']);
        }
        if (isset($filters['menu_id'])) {
            $this->db->where('r.menu_id', $filters['menu_id']);
        }
        if (isset($filters['menu_link'])) {
            $this->db->join('menu as m', 'm.id = r.menu_id');
            $this->db->where('m.link', $filters['menu_link']);
            $this->db->where('m.status != 99');
        }

        if (isset($filters['menu_action'])) {
            if ($filters['menu_action']) {
                $this->db->where("m.actions !=''");
            }
        }
        $result = $this->db->get();
        //log_debug($this, "SQL=" . $this->db->last_query());
        if ($count) {
            $rows = $result->num_rows();
            $result->free_result();
            return $rows;
        }
        if ($result->num_rows() == 0) {
            return false;
        }
        $roles = $result->result_array();
        $result->free_result();
        return $roles;
    }

    public function insertRoleMenu($data) {
        $this->db->insert('role_menu', $data);
        return $this->db->insert_id();
    }

    public function deleteRoleMenu($filters = array()) {
        if (isset($filters['role_id'])) {
            $this->db->where('role_id', $filters['role_id']);
        }
        if (isset($filters['menu_array_insert'])) {
            $this->db->where_not_in('menu_id', $filters['menu_array_insert']);
        }
        return $this->db->delete('role_menu');
    }

}

/* End of file mRole.php */
/* Location: ./application/models/mRole.php */