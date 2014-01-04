<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Description of category
 *
 * @author who
 */
class Tearelated extends Admin_Controller {

    public function __construct() {
        parent::__construct();
    //    if ($this->checkSession()) {
    //        redirect('authentication/login');
    //    }
        $this->load->model('mod_tearelated');
     }
    public function index()
	{
		$this->listtea();
	}
    /**
     * View all categories
     * All category will get from table category
     */
    public function listtea() {
        $config['base_url'] = base_url() . $this->uri->segment(1) . '/listtea/';
        $config['total_rows'] = $this->mod_tearelated->getTeaNum();
        $config['per_page'] = 25;

        $this->pagination->initialize($config);

        $data['tearelated'] = $this->mod_tearelated->getAllTea($this->uri->segment(3), $config['per_page']);

        $data['title'] = "Tea Related Knowledge";
        $data['page'] = 'listtea';
        $data['action'] = 'View Tearelated';
        $this->load->view('masterpage/master', $data);
    }
	 //Add new tea related knowledge
	 public function addnewtea() {
        $data['title'] = "New Tea Related Knowledge";
        $data['page'] = 'addnewtea';
        $data['action'] = 'Add New Tea Related Knowledge';

        $this->form_validation->set_rules('txt_tea_title', 'Tea Title', 'trim|required|max_length[50]|is_unique[' . table('tearelated') . '.' . field('teaTitle') . ']');
        if ($this->form_validation->run() == TRUE) {
		    //$teaLang=$this->input->post('tea_lang');
            $teaName = $this->input->post('txt_tea_title');
            $teaDec = $this->input->post('txt_tea_dec');
           // print_r(unserialize($serielizeFields));
            //  die();
            if ($this->mod_tearelated->addTea($teaName, $teaDec)) {
                $this->session->set_userdata('ms', 'Success!');
                redirect('tearelated');
           }
        }
	    $data['title']="Tea Related Management - Add new";
		$data['page']='addtea';
		$data['action']='Add new Tea Related';
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
		if ($this->mod_tearelated->update($teaName, $teaDec,$this->uri->segment(3))) {
				$this->session->set_userdata('ms', 'Success!');
				redirect('tearelated');
		}
        }
		
        $data['tea'] = $this->mod_tearelated->getTea($this->uri->segment(3));
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
