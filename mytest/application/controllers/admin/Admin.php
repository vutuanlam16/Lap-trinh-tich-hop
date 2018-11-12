<?php

class Admin extends MY_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('mAdmin');
        $this->load->model('mRole');
    }
    
    public function index(){
    	$message = $this->session->flashdata('message');
    	$this->data['message'] = $message;
        $this->data['list'] = $this->mAdmin->get_list();
        $this->data['total'] = $this->mAdmin->get_totals();        
        $this->data['temp'] = 'admin/admin/index';
        $this->load->view($this->main_layout, $this->data);
    }
    
    public function username_check(){
    	$flag = $this->mAdmin->check_exist(array('username' => $this->input->post('username')));
    	if($flag){
    		$this->form_validation->set_message(__FUNCTION__, 'Tài khoản đã tồn tại');
    		return FALSE;
    	}
    	return TRUE;
    }
    
    public function add(){
    	$this->load->library('form_validation');
    	$this->load->helper('form');
        $this->data['aRole'] = $this->mRole->get_list();
        $this->data['list1'] = $this->mRole->get_list(array('order' => array('id', 'ASC')));


    	
    	if($this->input->post()){
    		$this->form_validation->set_rules('name', 'Tên biệt danh', 'required|min_length[8]');
    		$this->form_validation->set_rules('username', 'Tên tài khoản', 'required|min_length[3]|max_length[15]|callback_username_check');
    		$this->form_validation->set_rules('password', 'Mật khẩu', 'required|min_length[3]|max_length[15]');
    		$this->form_validation->set_rules('repassword', 'Nhập lại mật khẩu', 'required|matches[password]');
    		if($this->form_validation->run()){
    			$name = $this->input->post('name');
    			$password = $this->input->post('password');
    			$username = $this->input->post('username');
                $role = $this->input->post('role');
    			$this->data = array(
    				'name' => $name,
    				'username' => $username,
    				'password' => md5($password),
                    'role_id' => $role
    			);
    			if($this->mAdmin->create($this->data)){
    				$this->session->set_flashdata('message', 'Thêm mới thành công');
    			} else {
    				$this->session->set_flashdata('message', 'Chưa thêm mới được');
    			}
    			redirect(admin_url('admin'));
    		}
    	}
    	
    	$this->data['temp'] = 'admin/admin/add';
    	$this->load->view($this->main_layout, $this->data);
    }
    
    public function edit(){
    	$this->load->library('form_validation');
    	$this->load->helper('form');
        $this->data['list1'] = $this->mRole->get_list(array('order' => array('id', 'ASC')));

    	
    	$id_user = $this->uri->segment(4);
    	$id_user = intval($id_user);
    	
    	if($this->input->post()){
    		$password = $this->input->post('password');
    		$this->form_validation->set_rules('name', 'Tên biệt danh', 'required|min_length[8]');
    		$this->form_validation->set_rules('username', 'Tên tài khoản', 'required|min_length[3]|max_length[15]');
    		if(!empty($password)){
	    		$this->form_validation->set_rules('password', 'Mật khẩu', 'required|min_length[3]|max_length[15]');
	    		$this->form_validation->set_rules('repassword', 'Nhập lại mật khẩu', 'required|matches[password]');
    		}
    		if($this->form_validation->run()){
                $role = $this->input->post('role');
               // die($role);
    			$name = $this->input->post('name');
    			$username = $this->input->post('username');
    			$this->data = array(
    					'name' => $name,
    					'username' => $username,
                        'role_id' => $role
    			);
    			if(!empty($password)){
    				$this->data['password'] = md5($password);
    			}
    			if($this->mAdmin->update($id_user, $this->data)){
    				$this->session->set_flashdata('message', 'Cập nhật thành công');
    			} else {
    				$this->session->set_flashdata('message', 'Chưa cập nhật được');
    			}
    			redirect(admin_url('admin'));
    		}
    	}
    	
    	$user_info = $this->mAdmin->get_row($id_user);
    	if($user_info){
    		$this->data['user_info'] = $user_info;
    	} else {
    		$this->session->set_flashdata('message', 'Không tồn tại người dùng này');
    		redirect(admin_url('admin'));
    	}
    	 
    	
    	$this->data['temp'] = 'admin/admin/edit';
    	$this->load->view($this->main_layout, $this->data);
    }
    
    public function delete(){
    	$id_user = $this->uri->segment(4);
    	$id_user = intval($id_user);
    	
    	$check_exist_user = $this->mAdmin->check_exist(array('id' => $id_user));
    	if($check_exist_user){
    		$flag_del = $this->mAdmin->delete($id_user);
			if($flag_del){    		
    			$this->session->set_flashdata('message', 'Xóa thành công');
			} else {
				$this->session->set_flashdata('message', 'Lỗi chưa xóa được');
			}
    	} else {
    		$this->session->set_flashdata('message', 'Không tồn tại người dùng này');    		
    	}
    	redirect(admin_url('admin'));
    }
    public function logout() {
    	$flag_login = $this->session->userdata ( 'login' );
    	if (isset ( $flag_login )) {
    		$this->session->unset_userdata ( 'login' );
    	}
    	redirect ( admin_url ( 'login' ) );
    }
}
