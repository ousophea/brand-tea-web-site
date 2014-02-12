<?php

class Contact extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        //if ($this->checkSession()) {
        //  redirect('authentication/login');
        // }
        $this->load->model(array( 'content/mod_content','translation/mod_translation'));
    }

    public function index() {
        $this->listcontact();
    }

    /**
     * View  Contact us
     * By Thary
     */
    public function listcontact() {
        $data['langs'] = $this->mod_translation->getLanguages();
        $data['contact'] = $this->mod_content->getContent(3);
        $data['title'] = "Contact us";
        $data['page'] = 'listcontact';
        $data['action'] = 'View contact us';
        $this->load->view('masterpage/master', $data);
    }

    //Edit Contact us
    public function editcontact() {
        $data['title'] = "Update Contact us";
        $data['page'] = 'editcontact';
        $data['action'] = 'Update Contact us';
        $check = '';
       
        $this->form_validation->set_rules('txt_contact', 'Contact us', 'trim|required|max_length[5000]' );
        if ($this->form_validation->run() == TRUE) {
            $conDec = $this->input->post('txt_contact');
             if ($this->mod_content->updateContent(3, 'Contact', $conDec)) {
                $this->session->set_userdata('ms', $this->lang->line('ms_success'));
                redirect('contact');
            } else {
                $this->session->set_userdata('ms', $this->lang->line('ms_error'));
            }
        }
        $data['contact'] = $this->mod_content->getContent(3);
        $this->load->view('masterpage/master', $data);
    }

}
