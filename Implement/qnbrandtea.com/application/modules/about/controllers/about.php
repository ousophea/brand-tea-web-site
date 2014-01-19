<?php
class About extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        //if ($this->checkSession()) {
          //  redirect('authentication/login');
       // }
        $this->load->model('mod_about');
     }
    public function index()
	{
		$this->listabout();
	}
    /**
     * View  About us
     * By Thary
     */
    public function listabout() {
        $data['about'] = $this->mod_about->getAbout();
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
		$check='';
        if($this->input->post('hid_desc')!= $this->input->post('txt_about')){	 
            $check = '|is_unique['.table('about').'.'. field('aboDesc').']';
        }
		$this->form_validation->set_rules('txt_about', 'About us', 'trim|required|max_length[5000]'.$check);				
        if ($this->form_validation->run() == TRUE) {	    
			$aboDec = $this->input->post('txt_about');
			$aboStatus = $this->input->post('dd_status');
		if ($this->mod_about->update($aboDec,$aboStatus,$this->uri->segment(3))) {
				$this->session->set_userdata('ms', 'Success!');
				redirect('about');
		}
		}
		$data['about'] = $this->mod_about->getAbout($this->uri->segment(3));
        $this->load->view('masterpage/master', $data);
    }
	 // Delete tea related knowledge
	 public function delete(){
		$id = $this->uri->segment(3);
		
        if ($this->mod_tearelated->delete($id) > 0) {
            $this->session->set_userdata('ms', 'Success!');
        }else{
            $this->session->set_userdata('ms', 'Delete fail, please try again!');
		}
       redirect('tearelated');
    }
}
