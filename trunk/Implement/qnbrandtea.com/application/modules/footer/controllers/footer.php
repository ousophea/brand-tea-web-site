<?php
class footer extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->checkSession()) {
            redirect('authentication/login');
        }
        $this->load->model(array('mod_footer','translation/mod_translation'));
    }

    public function index() {
        $this->edit();
    }

   

    public function edit() {
//        $data['title'] = "Update Footer";
//        $data['page'] = 'edit';
//        $data['action'] = 'Update Footer';
//
//        $check='';
////        if($this->input->post('hid_cat_name')!= $this->input->post('txt_cate_name')){
////            $check = '|is_unique['.table('category').'.'. field('catName').']';
////        }
//        $this->form_validation->set_rules('txt_cate_name', 'Category Name', 'trim|required|max_length[50]'.$check);
//        if ($this->form_validation->run() == TRUE) {
//            $catName = $this->input->post('txt_cate_name');
//            $catDec = $this->input->post('txt_cate_dec');
//            $fields = $this->input->post('field');
//            $labels = $this->input->post('label');
//            $serielizeFields = serialize(array('label' => $labels, 'field' => $fields));
//            if ($this->mod_category->update($catName, $catDec, $serielizeFields,$this->uri->segment(3))) {
//                $this->session->set_userdata('ms', 'Success!');
//                redirect('category');
//            }
//        }
        $data['footers'] = $this->mod_footer->getAllFooter();
        $this->load->view('masterpage/master', $data);
    }


    public function checkSession() {
        if ($this->session->userdata('admin')) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * Translation
     */
    public function category_translation($itemId, $lanId) {
        $this->form_validation->set_rules('txt_cate_name', 'Category Name', 'trim|required|max_length[100]');
        if ($this->form_validation->run() == TRUE) {
            $catName = $this->input->post('txt_cate_name');
            $catDec = $this->input->post('txt_cate_dec');
            $fields = $this->input->post('field');
            $labels = $this->input->post('label');
            $serielizeFields = serialize(array('label' => $labels, 'field' => $fields));
            $action =$this->input->post('action');
            if($this->mod_category->translate($itemId, $lanId,$catName,$catDec,$serielizeFields, $action)){
                $this->session->set_userdata('ms', $this->lang->line('ms_success'));
                redirect('category');
            }
        }
        $data['title'] = "Translate";
        $data['page'] = 'category_translation';
        $data['action'] = 'Translate';
        if ($this->input->post('lan_title')) {
            $data['langTitle'] = $this->input->post('lan_title');
            $data['itemId']=$this->input->post('item_id');
            $data['langId']=$this->input->post('lang_id');
            $data['items']=$this->input->post('item_data');
        }else{
            redirect('category');
        }
        
        $this->load->view('masterpage/master', $data);
    }
}
