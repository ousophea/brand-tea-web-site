<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends Admin_Controller {
	
	public function __construct(){
        $this->load->model(array('slideshow/mod_category', 'mod_slideshow'));
		$this->lang->load('dany_english', 'english');
	}

	public function index()
	{
		$this->listCat();
	}
	
	public function listCat(){
        $config['base_url'] = base_url() . $this->uri->segment(1) . '/' . $this->uri->segment(2) . '/listCat/';
        $config['total_rows'] = $this->mod_category->getSlideshowCategoryNum();
        $config['per_page'] = 25;

        $this->pagination->initialize($config);
		$data['category'] = $this->mod_category->getSlideshowCategory($this->uri->segment(4), $config['per_page']);
		
		$data['title']="Slidesow Category Management - List";
		$data['page']='slideshow/listcat';
		$data['action']='Slidesow Category Management';
    	$this->load->view('masterpage/master',$data);
	}
	
	public function addNew(){					
		if($this->input->post()){
			$name = $this->input->post('name');
			
			if (!empty($name))
			{		
				if($this->mod_category->addSlideshowCategory($name) > 0){
					$this->session->set_userdata('ms', $this->lang->line('ms_success'));
					redirect('slideshow/category/');
				} else {
                    $this->session->set_userdata('ms', $this->lang->line('ms_error'));
                }
			} else {
				$this->session->set_userdata('ms', $this->lang->line('ms_error'));
			}
		}
		
		$data['title']="Slidesow Category Management - Add new";
		$data['page']='slideshow/newcat';
		$data['action']='Add new slideshow category';
    	$this->load->view('masterpage/master',$data);
	}
	
	public function edit(){
		$id = $this->uri->segment(4);
						
		if($this->input->post()){
			$name = $this->input->post('name');
			
			if (!empty($name))
			{		
				if($this->mod_category->updateSlideshowCategory($id, $name) > 0){
					$this->session->set_userdata('ms', $this->lang->line('ms_success'));
					redirect('slideshow/category/');
				} else {
                    $this->session->set_userdata('ms', $this->lang->line('ms_error'));
                }
			} else {
				$this->session->set_userdata('ms', $this->lang->line('ms_error'));
			}
		}
		
		$data['category'] = $this->mod_category->getSlideshowCategoryById($id);
		
		$data['title']="Slidesow Category Management - Edit";
		$data['page']='slideshow/editcat';
		$data['action']='Edit slideshow category';
    	$this->load->view('masterpage/master',$data);
	}
	
    public function delete(){
		$id = $this->uri->segment(4);
		$isExists = $this->mod_slideshow->getSlideshowByCatId($id);
		if(count($isExists->result()) == 0){
			if ($this->mod_category->delete($id) > 0) {
				$this->session->set_userdata('ms', $this->lang->line('ms_success'));
			}else{
				$this->session->set_userdata('ms', $this->lang->line('ms_error'));
			}
		}else{
			$this->session->set_userdata('ms', $this->lang->line('ms_error_inuse'));
		}
        redirect('slideshow/category/');
    }
}