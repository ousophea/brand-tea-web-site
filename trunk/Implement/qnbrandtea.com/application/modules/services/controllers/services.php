<?php

class Services extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->checkSession()) {
            redirect('authentication/login');
        }
        $this->load->model(array('mod_services', 'translation/mod_translation'));
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
        $config['total_rows'] = $this->mod_services->getTeaNum();
        $config['per_page'] = 25;
        $data['langs'] = $this->mod_translation->getLanguages();
        $this->pagination->initialize($config);

        $data['tearelated'] = $this->mod_services->getAllTea($this->uri->segment(3), $config['per_page']);

        $data['title'] = "Services";
        $data['page'] = 'list';
        $data['action'] = 'View Services';
        $this->load->view('masterpage/master', $data);
    }

    /**
     * Add New Tea
     * Tea related Knowledge
     */
    public function addnew() {
        $data['title'] = "New Service";
        $data['page'] = 'addnew';
        $data['action'] = 'Add New Service';

        $this->form_validation->set_rules('txt_title', 'Tea Title', 'trim|required|max_length[50]|is_unique[' . table('service') . '.' . field('serTitle') . ']');
        if ($this->form_validation->run() == TRUE) {
            //$teaLang=$this->input->post('tea_lang');
            $teaName = $this->input->post('txt_title');
            $teaDec = $this->input->post('txt_dec');
            // print_r(unserialize($serielizeFields));
            //  die();
            if ($this->mod_services->addTea($teaName, $teaDec)) {
                $this->session->set_userdata('ms', 'Success!');
                redirect('services');
            }
        }
        $data['title'] = "Services Managemet - Add new";
        $data['page'] = 'new';
        $data['action'] = 'Add new Service';
        $this->load->view('masterpage/master', $data);
    }

    //Edit tea related knowledge
    public function edit() {
        $data['title'] = "Update Service";
        $data['page'] = 'edit';
        $data['action'] = 'Update Service';
        $check = '';
        if ($this->input->post('hid_name') != $this->input->post('txt_title')) {
            $check = '|is_unique[' . table('service') . '.' . field('serTitle') . ']';
        }
        $this->form_validation->set_rules('txt_title', 'Tea Related', 'trim|required|max_length[50]' . $check);
        if ($this->form_validation->run() == TRUE) {
            $teaName = $this->input->post('txt_title');
            $teaDec = $this->input->post('txt_dec');
            $teaStatus = $this->input->post('dd_status');
            if ($this->mod_services->update($teaName, $teaDec, $teaStatus, $this->uri->segment(3))) {
                $this->session->set_userdata('ms', 'Success!');
                redirect('services');
            }
        }
        $data['teas'] = $this->mod_services->getTea($this->uri->segment(3));
        $this->load->view('masterpage/master', $data);
    }

    // Delete tea related knowledge
    public function delete() {
        $id = $this->uri->segment(3);
        if ($this->mod_services->delete($id) > 0) {
            $this->session->set_userdata('ms', 'Success!');
        } else {
            $this->session->set_userdata('ms', 'Delete fail, please try again!');
        }
        redirect('services');
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
    public function service_translation($itemId, $lanId) {
        $this->form_validation->set_rules('txt_title', 'Tea title', 'trim|required|max_length[100]');
        if ($this->form_validation->run() == TRUE) {
            $teaName = $this->input->post('txt_title');
            $teaDec = $this->input->post('txt_dec');
            $teaStatus = $this->input->post('dd_status');
            // $fields = $this->input->post('field');
            //$labels = $this->input->post('label');
            // $serielizeFields = serialize(array('label' => $labels, 'field' => $fields));
            $action = $this->input->post('action');
            if ($this->mod_services->translate($itemId, $lanId, $teaName, $teaDec, $teaStatus, $action)) {
                $this->session->set_userdata('ms', $this->lang->line('ms_success'));
                redirect('services');
            }
        }
        $data['title'] = "Translate";
        $data['page'] = 'service_translation';
        $data['action'] = 'Translate';
        if ($this->input->post('lan_title')) {
            $data['langTitle'] = $this->input->post('lan_title');
            $data['tea_id'] = $this->input->post('item_id');
            $data['langId'] = $this->input->post('lang_id');
            $data['items'] = $this->input->post('item_data');
        } else {
            redirect('services');
        }

        $this->load->view('masterpage/master', $data);
    }

}
