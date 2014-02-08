<?php
class Contact extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        //if ($this->checkSession()) {
          //  redirect('authentication/login');
       // }
        $this->load->model('mod_contact');
     }
    public function index()
	{
		$this->listcontact();
	}
    /**
     * View  Contact us
     * By Thary
     */
    public function listcontact() {
        $data['contact'] = $this->mod_contact->getContact();
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
		$check='';
        if($this->input->post('hid_desc')!= $this->input->post('txt_contact')){	 
            $check = '|is_unique['.table('contact').'.'. field('contactDesc').']';
        }
		$this->form_validation->set_rules('txt_contact', 'Contact us', 'trim|required|max_length[5000]'.$check);				
        if ($this->form_validation->run() == TRUE) {	    
			$conDec = $this->input->post('txt_contact');
			$conStatus = $this->input->post('dd_status');
		if ($this->mod_contact->update($conDec,$conStatus,$this->uri->segment(3))) {
				$this->session->set_userdata('ms', 'Success!');
				redirect('contact');
		}
		}
		$data['contact'] = $this->mod_contact->getContact($this->uri->segment(3));
        $this->load->view('masterpage/master', $data);
    }
}
