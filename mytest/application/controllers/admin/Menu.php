<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model('mMenu');
        $this->load->model('mSetting');
    }

    public function index() {
       // log_debug($this, "111");
        $this->checkRole("menu");

        $menu_roott = $this->mMenu->get_list(array(
            'where' => array(
                'parent_id' => 0,
            ),
            'order' => array('ordering', 'ASC')
        ));
        if (!empty($menu_roott) && count($menu_roott) > 0) {
            foreach ($menu_roott as $menu) {
                $sub = $this->mMenu->get_list(array(
                    'where' => array(
                        'parent_id' => $menu->id,
                    ),
                    'order' => array('ordering', 'ASC')
                ));
                $menu->subs = $sub;
            }
        }
        $this->data['listMenuu'] = $menu_roott;
        $this->data['message'] = $this->session->flashdata('message');

        $this->data['temp'] = 'admin/menu/index';
        $this->load->view($this->main_layout, $this->data);
    }

    public function add() {
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Tiêu đề', 'required|max_length[255]');
            if ($this->form_validation->run()) {

                $actions = implode(',', $this->input->post('actions'));
                $name = $this->input->post('name');
                $parent_id = $this->input->post('parent_id');
                $ordering = $this->input->post('ordering');
                $link = $this->input->post('link');
                $icon = $this->input->post('icon');
                $status = $this->input->post('status');
                if ($status == 'on') {
                    $status = 1;
                } else {
                    $status = 0;
                }
                $this->data = array(
                    'name' => $name,
                    'parent_id' => $parent_id,
                    'ordering' => $ordering,
                    'link' => $link,
                    'icon' => $icon,
                    'actions' => $actions,
                    'status' => $status,
                    'create_date' => time()
                );
                if ($this->mMenu->create($this->data)) {
                    $this->session->set_flashdata('message', 'Tạo mới menu thành công');
                } else {
                    $this->session->set_flashdata('message', 'Chưa tạo được menu mới');
                }
                redirect(admin_url('menu'));
            }
        }

        $input = array('where' => array('parent_id' => '0'));
        $list_parent = $this->mMenu->get_list($input);
        $this->data['parent'] = $list_parent;
        $this->data['setting'] = $this->mSetting->getSettings(array('type' => 1));
        $this->data['temp'] = 'admin/menu/add';
        $this->load->view($this->main_layout, $this->data);
    }

    public function edit() {
        $id = intval($this->uri->segment(4));
        if ($id) {
            //KKK $this->checkRole('admin/config/menu', 2);
            $menu = $this->mMenu->get_row($id);
            $action_setting = $menu->actions;
        } else {
            //$this->checkRole('/admin/config/menu', 1);
            $action_setting = '';
        }
        if ($this->input->post()) {
            $this->form_validation->set_rules('name', 'Tên menu', 'required|max_length[255]');
            if ($this->form_validation->run()) {

                $actions = implode(',', $this->input->post('actions'));
                $name = $this->input->post('name');
                $parent_id = $this->input->post('parent_id');
                $ordering = $this->input->post('ordering');
                $link = $this->input->post('link');
                $icon = $this->input->post('icon');
                $status = $this->input->post('status');
                if ($status == 'on') {
                    $status = 1;
                } else {
                    $status = 0;
                }
                $this->data = array(
                    'name' => $name,
                    'parent_id' => $parent_id,
                    'ordering' => $ordering,
                    'link' => $link,
                    'icon' => $icon,
                    'actions' => $actions,
                    'status' => $status,
                    'create_date' => time()
                );
                if ($this->mMenu->update($id, $this->data)) {
                    $this->session->set_flashdata('message', 'Cập nhật menu thành công');
                } else {
                    $this->session->set_flashdata('message', 'Không cập nhật được menu');
                }
                redirect(admin_url('menu'));
            }
        }

        $input = array('where' => array('parent_id' => '0'));
        $list_parent = $this->mMenu->get_list($input);
        $this->data['parent'] = $list_parent;
        $this->data['info'] = $menu;
        $this->data['setting'] = $this->mSetting->getSettings(array('type' => 1, 'action_setting' => $action_setting));
        $this->data['temp'] = 'admin/menu/edit';
        $this->load->view($this->main_layout, $this->data);
    }

    public function delete() {
        $id = intval($this->uri->segment(4));
        if ($this->mMenu->delete($id)) {
            $this->session->set_flashdata('message', 'Xóa menu thành công');
            redirect(admin_url('menu'));
        }
    }

}

/* End of file Menu.php */
/* Location: ./application/controllers/admin/Menu.php */