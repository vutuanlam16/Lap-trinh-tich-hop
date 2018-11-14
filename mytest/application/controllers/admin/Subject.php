<?php
class Subject extends MY_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('mSubject');
    }

    public function index(){
        $this->data['temp'] = 'admin/subject/index';
         if ($this->input->post()) {
            $this->form_validation->set_rules('subject_name', 'Tên Subject', 'required|max_length[255]');
            if ($this->form_validation->run()) {
                $subject_name = $this->input->post('subject_name');
               // echo "$subject_name";die();
                $this->data = array(
                    'name' => $subject_name
                );
                if ($this->mSubject->create($this->data)) {
                    $this->session->set_flashdata('message', 'Thêm mới  thành công');
                } else {
                    $this->session->set_flashdata('message', 'Chưa thêm mới  được');
                }
                redirect(admin_url('subject'));
            }
        }

        $this->data['list'] = $this->mSubject->get_list();

        $this->load->view($this->main_layout, $this->data);
    }
    public function edit(){
        $subject = $this->checked_id();
       $subject_id = $subject->subject_id;
        if ($this->input->post()) {
            $this->form_validation->set_rules('subject_name', 'Tên Subject', 'required|max_length[255]');
            if ($this->form_validation->run()) {
                $subject_name = $this->input->post('subject_name');
               // echo "$subject_name";die();
                $this->data = array(
                    'name' => $subject_name
                );
                if ($this->mSubject->update($subject_id, $this->data)) {
                    $this->session->set_flashdata('message', 'Chỉnh sửa kho thành công');
                } else {
                    $this->session->set_flashdata('message', 'Chưa sửa được kho');
                }
                redirect(admin_url('subject'));
            }
        }
       $this->data['info'] = $subject;
       $this->data['temp'] = 'admin/subject/edit';

        $this->load->view($this->main_layout, $this->data);
    }
    public function delete(){
        $subject = $this->checked_id();
       $subject_id = $subject->subject_id;
        if ($this->mSubject->delete($subject_id)) {
            $this->session->set_flashdata('message', 'Xóa kho thành công');
            redirect(admin_url('subject'));
        }
    }
    private function checked_id() {
        $id_subject = $this->uri->rsegment(3);
        if (!is_numeric($id_subject)) {
            $this->session->set_flashdata('message', 'Không tồn tại kho này');
            redirect(admin_url('subject'));
        }
        $id_subject = intval($id_subject);
        $info = $this->mSubject->get_row($id_subject);
        if (!$info) {
            $this->session->set_flashdata('message', 'Không tồn tại kho này');
            redirect(admin_url('subject'));
        }
        return $info;
    }
}
