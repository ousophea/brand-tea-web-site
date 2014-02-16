<?php

class About extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->checkSession()) {
          redirect('authentication/login');
         }
        //$this->load->model(array('mod_about', 'content/mod_content'));
         $this->load->model(array( 'content/mod_content','translation/mod_translation'));
    }
    public function index() {
        $this->listabout();
    }

    /**
     * View  About us
     * By Thary
     */
    public function listabout() {
        $data['about'] = $this->mod_content->getEnContent(2);
        $data['langs'] = $this->mod_translation->getLanguages();
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
        $data['about'] = $this->mod_content->getEnContent(2);
        $this->load->view('masterpage/master', $data);
    }
public function about_translation($itemId, $lanId) {
		$this->form_validation->set_rules('txt_name', 'Page Title', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('txt_description', 'Description', 'trim|required');
        if ($this->form_validation->run() == TRUE) {
            $conName = $this->input->post('txt_name');
            $conDes = $this->input->post('txt_description');
            $action =$this->input->post('action');
            if($this->mod_content->translate($itemId, $lanId, $conName, $conDes, $action)){
                $this->session->set_userdata('ms', $this->lang->line('ms_success'));
                redirect('about');
            }
        }
        $data['title'] = "Translate";
        $data['page'] = 'services_translation';
        $data['action'] = 'Translate';
        if ($this->input->post('lan_title')) {
            $data['langTitle'] = $this->input->post('lan_title');
            $data['itemId']=$this->input->post('item_id');
            $data['langId']=$this->input->post('lang_id');
            $data['items']=$this->input->post('item_data');
        }else{
            redirect('about');
        }
        
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
