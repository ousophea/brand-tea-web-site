<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Services extends Admin_Controller {
	
	public function __construct(){
        if (!$this->checkSession()) {
            redirect('authentication/login');
        }
        $this->load->model('mod_content');
		$this->lang->load('dany_english', 'english');
	}

	public function index()
	{
		$this->listServices();
	}
	
	public function listServices(){
		$data['services'] = $this->mod_content->getContent(4);
		
		$data['title']="Content Management - Services";
		$data['page']='services/list';
		$data['action']='Services';
    	$this->load->view('masterpage/master',$data);
	}
		
	public function edit(){		
		if($this->input->post('btnSave')){	
        	$this->form_validation->set_rules('txt_name', 'Page Title', 'trim|required|max_length[50]');
        	$this->form_validation->set_rules('txt_description', 'Description', 'trim|required');
			
        	if ($this->form_validation->run() == TRUE) {	
				$id = $this->input->post('txt_id');
				$name = $this->input->post('txt_name');
				$description = $this->input->post('txt_description');
				
				if($this->mod_content->updateContent($id, $name, $description)){
					$this->session->set_userdata('ms', $this->lang->line('ms_success'));
					redirect('content/services/listservices');
				} else {
					$this->session->set_userdata('ms', $this->lang->line('ms_error'));
				}
			}
		}
		
		$data['services'] = $this->mod_content->getContent(4);
		
		$data['title']="Content Management - Edit service";
		$data['page']='services/edit';
		$data['action']='Edit Services';
    	$this->load->view('masterpage/master',$data);
	}
	
    public function checkSession() {
        if ($this->session->userdata('admin')) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
