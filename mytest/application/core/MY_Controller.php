<?php

class MY_Controller extends CI_Controller {

    public $data = array();
    protected $main_layout = '';
    private $role_id = 0;

    function __construct() {
        parent::__construct();
        $this->load->library('user_agent');
        $this->load->helper('file_log');

        $access_admin = $this->uri->segment(1);

        switch ($access_admin) {
           case 'admin' : {
          //           echo "$access_admin"; die();
               $this->load->helper('admin');
               $this->main_layout = 'admin/main';
               $flag_login = $this->session->userdata('login');
               if (!isset($flag_login)) {
                redirect(admin_url('login'));
            }
                   // echo "ok";die
            $this->data['login'] = $this->session->userdata('login');
            $this->load->model('mMenu');
            $this->role_id = $this->data['login']->role_id;
          //  echo "ok";die();
             $aMenuListLeft = $this->mMenu->getMenus(array('status' => 1, 'parent_id' => 0, 'menu_role' => true, 'role_id' => $this->role_id));
            //echo "ok";die();
            //var_dump($aMenuListLeft);die();
            $this->data['listMenu'] = $aMenuListLeft;                    

                    //TODO: check nếu menu ko có gì thì sang trang báo lỗi ko có quyền truy cập
                    if(!isset($aMenuListLeft) || count($aMenuListLeft)==0) {
                        redirect("common/error");
                    }

                    break;
         }
           case 'user' : {
          //           echo "$access_admin"; die();
               $this->load->helper('user');
               $this->main_layout = 'user/main';
               $flag_login2 = $this->session->userdata('login2');
               if (!isset($flag_login2)) {
                redirect(user_url('login'));
            }
                   // echo "ok";die
            $this->data['login'] = $this->session->userdata('login2');
         }
        

    }
}

public function checkRole($menuLink) {
    $this->load->model('mRole');
       // log_debug($this, "222");
    $validMenu = $this->mRole->getRoleMenus(array("role_id"=>$this->role_id, "menu_link"=>$menuLink));
     //   log_debug($this, "333: validMenu=" . var_export($validMenu, true));
    if(!isset($validMenu) || $validMenu == false) {
        redirect('common/error?type=access-denied');
    }
        //log_debug($this, "444");
}
}
