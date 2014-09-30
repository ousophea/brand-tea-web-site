<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends Admin_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model(array('mod_admin'));

    }
    public function index() {
        if (!$this->checkSession()) {
            redirect('authentication/login');
            exit();
        }
        $data['title'] = "Welcome to Tea";
        $data['page'] = 'admin/dashboard';
        $data['action'] = 'Dashboard';
        $data['productNumber'] = $this->mod_admin->getCount('products','pro_id');
        $data['categroyNumber'] = $this->mod_admin->getCount('categories','cate_id');
        $data['groupNumber'] = $this->mod_admin->getCount('groups','gro_id');
        $data['serviceNumber'] = $this->mod_admin->getCount('services','ser_id');
        $data['teaNumber'] = $this->mod_admin->getCount('tearelated','tea_id');
        $this->load->view('masterpage/master', $data);
    }

    public function checkSession() {
        if ($this->session->userdata('admin')) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
