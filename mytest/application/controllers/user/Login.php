<?php
class Login extends CI_Controller {
	public function index() {
		$this->load->library ( 'form_validation' );
		$this->load->helper('user');
		$this->load->helper ( 'form' );

		if ($this->input->post ()) {			
			$this->form_validation->set_rules ( 'login', 'login', 'callback_check_login' );			
			if ($this->form_validation->run ()) {
				redirect ( user_url ( 'home' ) );
			}
		}
		
		$this->load->view ( 'user/login/index' );
	}
	
	public function check_login() {
		$username = $this->input->post ( 'username' );
		$password = md5 ( $this->input->post ( 'password' ) );
		
		$this->load->model ( 'mAdmin' );
		
		$where = array (
			'username' => $username,
			'password' => $password,
			'role_id' => "4"
		);
		
		$admin = $this->mAdmin->get_row_rule($where, '*');		
		if ($admin != FALSE && $admin != NULL) {
			$this->session->set_userdata ( 'login2', $admin );
			return TRUE;
		} else {
			$this->form_validation->set_message ( __FUNCTION__, 'Đăng nhập không thành công' );
			return FALSE;
		}
	}
}
