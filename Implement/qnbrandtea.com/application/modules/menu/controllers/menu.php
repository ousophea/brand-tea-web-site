<?php

class Menu extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->checkSession()) {
            redirect('authentication/login');
        }
        $this->load->model(array('mod_menu'));
    }

    public function index() {
        $this->edit();
    }

    /**
     * View all categories
     * All category will get from table category
     */
    public function viewMenu() {
//        $config['base_url'] = base_url() . $this->uri->segment(1) . '/viewMenu/';
////        $config['total_rows'] = $this->mod_category->getCatNum();
////        $config['per_page'] = 25;
////        $data['langs'] = $this->mod_translation->getLanguages();
////
//        $this->pagination->initialize($config);
//
//        $data['menus'] = $this->mod_menu->getAllMenu();
//
//        $data['title'] = "Getegory";
//        $data['page'] = 'menu';
//        $data['action'] = 'View Category';
//        $this->load->view('masterpage/master', $data);
    }

    public function edit() {
        $data['title'] = "Footer Menu";
        $data['page'] = 'edit';
        $data['action'] = 'Footer Menu';
        if ($this->input->post('hid_menu_name') != $this->input->post('txt_menu_name')) {
            $array_men_name = $this->input->post('txt_menu_name');
            $array_men_id = $this->input->post('hid_md_id');

          $this->mod_menu->update($array_men_name,$array_men_id);
//            $this->db->update_batch('menu_detaile', $data, 'md_id');
            redirect('menu');
//            exit();
//     $data = array(
//        'md_title'=>
//        );
        } else {
//        $check='';
//        if($this->input->post('hid_menu_name')!= $this->input->post('txt_menu_name')){
//            $check = '|is_unique[menu_detail.md_title]';
//        }
//        $this->form_validation->set_rules('txt_menu_name', 'Footer Menu', 'trim|required|max_length[100]'.$check);
//        if ($this->form_validation->run() == TRUE) {
//            $menName = $this->input->post('txt_menu_name');
////            if ($this->mod_menu->update($menName, $this->uri->segment(3))) {
//                if ($this->mod_menu->update($menName)) {
//                $this->session->set_userdata('ms', 'Success!');
//                redirect('menu');
//            }
//        }
//        $data['menus'] = $this->mod_menu->getAllMenu();
            $data['menus'] = $this->mod_menu->getMenu('2');  // Get main menu in khmer
//        $data['footer_menu']=$this->mod_menu->getMenu('2');  // Get main menu in khmer
        }
        $this->load->view('masterpage/master', $data);
    }

    public function delete() {
        if ($this->mod_category->delete($this->uri->segment(3))) {
            $this->session->set_userdata('ms', 'Success!');
            redirect('category');
        }
    }

    public function checkSession() {
        if ($this->session->userdata('admin')) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
