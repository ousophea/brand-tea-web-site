<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of category
 *
 * @author who
 */
class Category extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->checkSession()) {
            redirect('authentication/login');
        }
        $this->load->model('mod_category');
    }

    public function index() {
        $this->viewCategory();
    }

    /**
     * View all categories
     * All category will get from table category
     */
    public function viewCategory() {
        $config['base_url'] = base_url() . $this->uri->segment(1) . '/viewCategory/';
        $config['total_rows'] = $this->mod_category->getAllCat();
        $config['per_page'] = 25;

        $this->pagination->initialize($config);

        $data['cats'] = $this->mod_category->getCategory($this->uri->segment(3), $config['per_page']);

        $data['title'] = "Getegory";
        $data['page'] = 'category';
        $data['action'] = 'View Category';
        $this->load->view('masterpage/master', $data);
    }

    public function addnew() {
        $data['title'] = "New Category";
        $data['page'] = 'addnew';
        $data['action'] = 'Add New Category';

        $this->form_validation->set_rules('txt_cate_name', 'Category Name', 'trim|required|max_length[50]|is_unique[' . table('category') . '.' . field('catName') . ']');
        if ($this->form_validation->run() == TRUE) {
            $catName = $this->input->post('txt_cate_name');
            $catDec = $this->input->post('txt_cate_dec');
            $fields = $this->input->post('field');
            $labels = $this->input->post('label');
            $serielizeFields = serialize(array('label' => $labels, 'field' => $fields));
//            print_r(unserialize($serielizeFields));
//            die();
            if ($this->mod_category->addNew($catName, $catDec, $serielizeFields)) {
                $this->session->set_userdata('ms', 'Success!');
                redirect('category');
            }
        }
        $this->load->view('masterpage/master', $data);
    }

    public function edit() {
        $data['title'] = "Update Category";
        $data['page'] = 'edit';
        $data['action'] = 'Update Category';

        $check='';
        if($this->input->post('hid_cat_name')!= $this->input->post('txt_cate_name')){
            $check = '|is_unique['.table('category').'.'. field('catName').']';
        }
        $this->form_validation->set_rules('txt_cate_name', 'Category Name', 'trim|required|max_length[50]'.$check);
        if ($this->form_validation->run() == TRUE) {
            $catName = $this->input->post('txt_cate_name');
            $catDec = $this->input->post('txt_cate_dec');
            $fields = $this->input->post('field');
            $labels = $this->input->post('label');
            $serielizeFields = serialize(array('label' => $labels, 'field' => $fields));
            if ($this->mod_category->update($catName, $catDec, $serielizeFields,$this->uri->segment(3))) {
                $this->session->set_userdata('ms', 'Success!');
                redirect('category');
            }
        }
        $data['cats'] = $this->mod_category->getCat($this->uri->segment(3));
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
