<?php

class Contact extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->checkSession()) {
          redirect('authentication/login');
         }
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
        
	$data['contact'] = $this->mod_content->getEnContent(3);
        $data['langs'] = $this->mod_translation->getLanguages();
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
        $data['contact'] = $this->mod_content->getEnContent(3);
        $this->load->view('masterpage/master', $data);
    }
public function contact_translation($itemId, $lanId) {
		$this->form_validation->set_rules('txt_name', 'Page Title', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('txt_description', 'Description', 'trim|required');
        if ($this->form_validation->run() == TRUE) {
            $conName = $this->input->post('txt_name');
            $conDes = $this->input->post('txt_description');
            $action =$this->input->post('action');
            if($this->mod_content->translate($itemId, $lanId, $conName, $conDes, $action)){
                $this->session->set_userdata('ms', $this->lang->line('ms_success'));
                redirect('contact');
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
            redirect('contact');
        }
        
        $this->load->view('masterpage/master', $data);
    }
	//Edit tea related knowledge
	public function edit() {
        $data['title'] = "Update Tea Knowledge";
        $data['page'] = 'edit';
        $data['action'] = 'Update Tea Knowledge';
		$check='';
        if($this->input->post('hid_tea_name')!= $this->input->post('txt_tea_title')){	 
            $check = '|is_unique['.table('tearelated').'.'. field('teaTitle').']';
        }
		$this->form_validation->set_rules('txt_tea_title', 'Tea Related', 'trim|required|max_length[50]'.$check);
		if ($this->form_validation->run() == TRUE) {
			$teaName = $this->input->post('txt_tea_title');
			$teaDec = $this->input->post('txt_tea_dec');
			$teaStatus = $this->input->post('dd_status');
		if ($this->mod_tearelated->update($teaName, $teaDec,$teaStatus,$this->uri->segment(3))) {
				$this->session->set_userdata('ms', 'Success!');
				redirect('tearelated');
		}
        }	
        $data['tea'] = $this->mod_tearelated->getTea($this->uri->segment(3));
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
