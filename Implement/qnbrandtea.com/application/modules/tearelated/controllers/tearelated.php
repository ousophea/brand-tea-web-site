<?php

class Tearelated extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->checkSession()) {
            redirect('authentication/login');
        }
        $this->load->model(array('mod_tearelated', 'translation/mod_translation'));
    }

    public function index() {
        $this->listtea();
    }

    /**
     * View all list Tea
     * All Tea related will get from table Tea related Knowledge
     */
    public function listtea() {
        $config['base_url'] = base_url() . $this->uri->segment(1) . '/listtea/';
        $config['total_rows'] = $this->mod_tearelated->getTeaNum();
        $config['per_page'] = 25;
        $data['langs'] = $this->mod_translation->getLanguages();
        $this->pagination->initialize($config);

        $data['tearelated'] = $this->mod_tearelated->getAllTea($this->uri->segment(3), $config['per_page']);

        $data['title'] = "Tea Related Knowledge";
        $data['page'] = 'listtea';
        $data['action'] = 'View Tearelated';
        $this->load->view('masterpage/master', $data);
    }

    /**
     * Add New Tea
     * Tea related Knowledge
     */
    public function addnewtea() {
        $data['title'] = "New Tea Related Knowledge";
        $data['page'] = 'addnewtea';
        $data['action'] = 'Add New Tea Related Knowledge';

        $this->form_validation->set_rules('txt_tea_title', 'Tea Title', 'trim|required|max_length[50]|is_unique[' . table('tearelated') . '.' . field('teaTitle') . ']');
        if ($this->form_validation->run() == TRUE) {
            //$teaLang=$this->input->post('tea_lang');
            $teaName = $this->input->post('txt_tea_title');
            $teaDec = $this->input->post('txt_tea_dec');
            // print_r(unserialize($serielizeFields));
            //  die();
            if ($this->mod_tearelated->addTea($teaName, $teaDec)) {
                $this->session->set_userdata('ms', 'Success!');
                redirect('tearelated');
            }
        }
        $data['title'] = "Tea Related Management - Add new";
        $data['page'] = 'addtea';
        $data['action'] = 'Add new Tea Related';
        $this->load->view('masterpage/master', $data);
    }

    //Edit tea related knowledge
    public function edit() {
        $data['title'] = "Update Tea Knowledge";
        $data['page'] = 'edit';
        $data['action'] = 'Update Tea Knowledge';
        $check = '';
        if ($this->input->post('hid_tea_name') != $this->input->post('txt_tea_title')) {
            $check = '|is_unique[' . table('tearelated') . '.' . field('teaTitle') . ']';
        }
        $this->form_validation->set_rules('txt_tea_title', 'Tea Related', 'trim|required|max_length[50]' . $check);
        if ($this->form_validation->run() == TRUE) {
            $teaName = $this->input->post('txt_tea_title');
            $teaDec = $this->input->post('txt_tea_dec');
            $teaStatus = $this->input->post('dd_status');
            if ($this->mod_tearelated->update($teaName, $teaDec, $teaStatus, $this->uri->segment(3))) {
                $this->session->set_userdata('ms', 'Success!');
                redirect('tearelated');
            }
        }
        $data['teas'] = $this->mod_tearelated->getTea($this->uri->segment(3));
        $this->load->view('masterpage/master', $data);
    }

    // Delete tea related knowledge
    public function delete() {
        $id = $this->uri->segment(3);
        if ($this->mod_tearelated->delete($id) > 0) {
            $this->session->set_userdata('ms', 'Success!');
        } else {
            $this->session->set_userdata('ms', 'Delete fail, please try again!');
        }
        redirect('tearelated');
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
    public function tea_translation($itemId, $lanId) {
        $this->form_validation->set_rules('txt_tea_title', 'Tea title', 'trim|required|max_length[100]');
        if ($this->form_validation->run() == TRUE) {
            $teaName = $this->input->post('txt_tea_title');
            $teaDec = $this->input->post('txt_tea_dec');
            $teaStatus = $this->input->post('dd_status');
            // $fields = $this->input->post('field');
            //$labels = $this->input->post('label');
            // $serielizeFields = serialize(array('label' => $labels, 'field' => $fields));
            $action = $this->input->post('action');
            if ($this->mod_tearelated->translate($itemId, $lanId, $teaName, $teaDec, $teaStatus, $action)) {
                $this->session->set_userdata('ms', $this->lang->line('ms_success'));
                redirect('tearelated');
            }
        }
        $data['title'] = "Translate";
        $data['page'] = 'tearelated_translation';
        $data['action'] = 'Translate';
        if ($this->input->post('lan_title')) {
            $data['langTitle'] = $this->input->post('lan_title');
            $data['tea_id'] = $this->input->post('item_id');
            $data['langId'] = $this->input->post('lang_id');
            $data['items'] = $this->input->post('item_data');
        } else {
            redirect('tearelated');
        }

        $this->load->view('masterpage/master', $data);
    }

}