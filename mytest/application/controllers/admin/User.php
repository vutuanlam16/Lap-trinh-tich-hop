<?php

class User extends MY_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('mUser');
    }
    
    public function index(){
    	$message = $this->session->flashdata('message');

        $this->load->library('pagination');
        $input = array(
            'select' => '*',
            'where' => array('is_delete' => 0)

        );

        $totals = $this->mUser->get_totals($input);
        $config = array(
            'total_rows' => $totals,
            'base_url' => admin_url('user/index'),
            'per_page' => 10,
            'uri_segment' => 4,
            'num_links' => 2,
            'reuse_query_string' => TRUE,
            'use_page_numbers' => TRUE,
            'first_link' => 'Đầu',
            'last_link' => 'Cuối',
            'next_link' => 'Trang kế tiếp',
            'prev_link' => 'Trang trước'
        );
        $this->pagination->initialize($config);
        
        $start_index = $this->uri->segment(4);
        if (! $start_index && ! is_int($start_index)) {
            $start_index = 0;
        } else {
            $start_index = ($start_index-1)*$config['per_page'];
        }
        
        $input = array(
            'limit' => array(
                $config['per_page'],
                $start_index
            )
        );
        
        $list = $this->mUser->get_list($input);

        $this->data['message'] = $message;
        $this->data['list'] = $list;
        $this->data['total'] = $this->mUser->get_totals();        
        $this->data['temp'] = 'admin/user/index';
        $this->load->view($this->main_layout, $this->data);
    }


    public function ban()
    {
        $iduser = intval($this->uri->segment(4));
        $this->mUser->ban_user($iduser);
        $this->session->set_flashdata('message', 'Đã khóa tài khoản người dùng này!');
        redirect(admin_url('user'));
    }

    public function unban()
    {
        $iduser = intval($this->uri->segment(4));
        $this->mUser->update($iduser,array('is_delete' => 0));
        $this->session->set_flashdata('message', 'Đã mở khóa tài khoản người dùng này!');
        redirect(admin_url('user'));
    }











    public function delete()
    {
        $iduser = intval($this->uri->segment(4));
        $this->__del($iduser, TRUE);
    }

    public function delete_all()
    {
        $ids = $this->input->post('ids');
        $msg = array(
            'deleted' => array(),
            'error' => array()
        );
        foreach ( $ids as $id ) {
            if ($this->__del($id)) {
                $msg['deleted'][] = $id;
            } else {
                $msg['error'][] = $id;
            }
        }
        echo json_encode($msg);
    }

    private function __del($id, $redirect = FALSE)
    {
        $user = $this->mUser->get_row($id);
        if (!$user) {
            if ($redirect) {
                $this->session->set_flashdata('message', 'Không tồn tại tài khoản người dùng này');
                redirect(admin_url('user'));
            }
            return FALSE;
        }
        
        if ($this->mUser->delete($id)) {
            if (! empty($user->avatar)) {
                $file = './upload/user/' . $user->avatar;
                if (file_exists($file)) {
                    unlink($file);
                }
            }
            if ($redirect) {
                $this->session->set_flashdata('message', 'Xóa thành công tài khoản người dùng');
                redirect(admin_url('user'));
            }
            return TRUE;
        } else {
            if ($redirect) {
                $this->session->set_flashdata('message', 'Không xóa được tài khoản người dùng');
                redirect(admin_url('user'));
            }
            return FALSE;
        }
    }


}