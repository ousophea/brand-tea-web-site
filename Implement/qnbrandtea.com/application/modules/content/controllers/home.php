<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Admin_Controller {
	
	public function __construct(){
        if (!$this->checkSession()) {
            redirect('authentication/login');
        }
        $this->load->model(array('mod_content','translation/mod_translation'));
		$this->lang->load('dany_english', 'english');
	}

	public function index()
	{
		$this->listHome();
	}
	
	public function listHome(){
		$data['home'] = $this->mod_content->getEnContent(1);
        $data['langs'] = $this->mod_translation->getLanguages();
		
		$data['title']="Content Management - Home page";
		$data['page']='home/list';
		$data['action']='Home page';
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
		
		$data['home'] = $this->mod_content->getEnContent(1);
		
		$data['title']="Content Management - Edit home page";
		$data['page']='home/edit';
		$data['action']='Edit Home';
    	$this->load->view('masterpage/master',$data);
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
    public function home_translation($itemId, $lanId) {
		$this->form_validation->set_rules('txt_name', 'Page Title', 'trim|required|max_length[50]');
		$this->form_validation->set_rules('txt_description', 'Description', 'trim|required');
        if ($this->form_validation->run() == TRUE) {
            $conName = $this->input->post('txt_name');
            $conDes = $this->input->post('txt_description');
            $action =$this->input->post('action');
            if($this->mod_content->translate($itemId, $lanId, $conName, $conDes, $action)){
                $this->session->set_userdata('ms', $this->lang->line('ms_success'));
                redirect('content/home');
            }
        }
        $data['title'] = "Translate";
        $data['page'] = 'home_translation';
        $data['action'] = 'Translate';
        if ($this->input->post('lan_title')) {
            $data['langTitle'] = $this->input->post('lan_title');
            $data['itemId']=$this->input->post('item_id');
            $data['langId']=$this->input->post('lang_id');
            $data['items']=$this->input->post('item_data');
        }else{
            redirect('content/home');
        }
        
        $this->load->view('masterpage/master', $data);
    }
}
