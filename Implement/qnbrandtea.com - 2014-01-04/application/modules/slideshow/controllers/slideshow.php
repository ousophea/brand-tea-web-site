<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slideshow extends Admin_Controller {
	
	public function __construct(){
        $this->load->model('mod_slideshow');
	}

	public function index()
	{
		$this->listSlide();
	}
	
	public function listSlide(){
        $config['base_url'] = base_url() . $this->uri->segment(1) . '/viewCategory/';
        $config['total_rows'] = $this->mod_slideshow->getSlideshowNum();
        $config['per_page'] = 25;

        $this->pagination->initialize($config);
		$data['slideshow'] = $this->mod_slideshow->getSlideshow($this->uri->segment(3), $config['per_page']);
		
		$data['title']="Slidesow Management - List";
		$data['page']='slideshow/list';
		$data['action']='Slidesow Management';
    	$this->load->view('masterpage/master',$data);
	}
	
	public function addNew(){
		
		if($this->input->post('btnUpload')){		
			$config['upload_path'] = './template/frontend/img/slideshow/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png|JPEG|JPG|PNG|x-png';
			$config['max_size']	= '1000';
	
			$this->load->library('upload', $config);
	
			if ( ! $this->upload->do_upload('image'))
			{			
				$this->session->set_userdata('ms', $this->upload->display_errors());			
			} else {				
				$image = $this->upload->data();
				$imageName = $image['file_name'];
				
				if($this->mod_slideshow->addSlideshow($imageName) > 0){
					$this->session->set_userdata('ms', $this->lang->line('ms_success'));
					redirect('slideshow/listSlide');
				} else {
                    $this->session->set_userdata('ms', $this->lang->line('ms_error'));
                }
			}	
		}
		
		$data['title']="Slidesow Management - Add new";
		$data['page']='slideshow/new';
		$data['action']='Add new slideshow';
    	$this->load->view('masterpage/master',$data);
	}
	
	public function edit(){
		$id = $this->uri->segment(3);
		
		if($this->input->post('btnUpload')){		
			$config['upload_path'] = './template/frontend/img/slideshow/';
			$config['allowed_types'] = 'gif|jpg|jpeg|png|JPEG|JPG|PNG|x-png';
			$config['max_size']	= '1000';
	
			$this->load->library('upload', $config);
	
			if ( ! $this->upload->do_upload('image'))
			{			
				$this->session->set_userdata('ms', $this->upload->display_errors());				
			} else {				
				$image = $this->upload->data();
				$imageName = $image['file_name'];
				
				$oldData = $this->mod_slideshow->getSlideshowById($id);
				
				if($this->mod_slideshow->updateSlideshow($imageName, $id) > 0){
					$this->session->set_userdata('ms', $this->lang->line('ms_success'));
					@unlink('./template/frontend/img/slideshow/'.$oldData->row()->sli_image);
					redirect('slideshow/listslide');
				} else {
                    $this->session->set_userdata('ms', $this->lang->line('ms_error'));
                }
			}	
		}
		
		$data['title']="Slidesow Management - Edit";
		$data['page']='slideshow/edit';
		$data['action']='Edit slideshow';
    	$this->load->view('masterpage/master',$data);
	}
	
    public function delete(){
		$id = $this->uri->segment(3);
		$oldData = $this->mod_slideshow->getSlideshowById($id);
		
        if ($this->mod_slideshow->delete($id) > 0) {
            $this->session->set_userdata('ms', $this->lang->line('ms_success'));
			@unlink('./template/frontend/img/slideshow/'.$oldData->row()->sli_image);
        }else{
            $this->session->set_userdata('ms', $this->lang->line('ms_error'));
		}
        redirect('slideshow/listslide');
    }
}
