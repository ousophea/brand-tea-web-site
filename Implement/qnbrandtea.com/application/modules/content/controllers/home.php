<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Admin_Controller {
	
	public function __construct(){
        $this->load->model('mod_content');
		$this->lang->load('dany_english', 'english');
	}

	public function index()
	{
		$this->listHome();
	}
	
	public function listHome(){
		$data['home'] = $this->mod_content->getContent(1);
		
		$data['title']="Content Management - Home page";
		$data['page']='home/list';
		$data['action']='Content Management';
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
					redirect('content/home/listhome');
				} else {
					$this->session->set_userdata('ms', $this->lang->line('ms_error'));
				}
			}
		}
		
		$data['home'] = $this->mod_content->getContent(1);
		
		$data['title']="Content Management - Edit home page";
		$data['page']='home/edit';
		$data['action']='Edit Home';
    	$this->load->view('masterpage/master',$data);
	}
	
}
