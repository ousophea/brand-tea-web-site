<?php

class About extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        //if ($this->checkSession()) {
        //  redirect('authentication/login');
        // }
        $this->load->model(array('mod_about', 'content/mod_content'));
    }

    public function index() {
        $this->listabout();
    }

    /**
     * View  About us
     * By Thary
     */
    public function listabout() {
        $data['about'] = $this->mod_content->getContent(2);
        $data['title'] = "About us";
        $data['page'] = 'listabout';
        $data['action'] = 'View About us';
        $this->load->view('masterpage/master', $data);
    }

    //Edit tea related knowledge
    public function editabout() {
        $data['title'] = "Update About us";
        $data['page'] = 'editabout';
        $data['action'] = 'Update About us';
        $check = '';
    
        $this->form_validation->set_rules('txt_about', 'About us', 'trim|required|max_length[5000]');
        if ($this->form_validation->run() == TRUE) {
            $aboDec = $this->input->post('txt_about');
            if ($this->mod_content->updateContent(2, 'About', $aboDec)) {
                $this->session->set_userdata('ms', $this->lang->line('ms_success'));
                redirect('about');
            } else {
                $this->session->set_userdata('ms', $this->lang->line('ms_error'));
            }
        }
        $data['about'] = $this->mod_about->getAbout($this->uri->segment(3));
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

}
