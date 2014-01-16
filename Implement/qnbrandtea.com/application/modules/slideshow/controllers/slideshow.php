<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slideshow extends Admin_Controller {
	
	public function __construct(){
        $this->load->model('mod_slideshow');
		$this->lang->load('dany_english', 'english');
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
		if($this->input->post('x')){
			$targ_w = 1000;
			$targ_h = 282;
			$jpeg_quality = 100;
		
			$src = SLIDESHOW_IMAGE_PATH . '2.jpg';
			$dist = SLIDESHOW_IMAGE_PATH . '_2.jpg';
			$img_r = imagecreatefromjpeg($src);
			$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
		
			imagecopyresampled($dst_r,$img_r,0,0,$this->input->post('x'),$this->input->post('y'), $targ_w, $targ_h, $this->input->post('w'), $this->input->post('h'));
		
			header('Content-type: image/jpeg');
			imagejpeg($dst_r,$dist,$jpeg_quality);
		}
		
		if($this->input->post('btnUpload')){		
			$config['upload_path'] = SLIDESHOW_IMAGE_PATH;
			$config['allowed_types'] = 'gif|jpg|jpeg|png|JPEG|JPG|PNG|x-png';
			$config['max_size']	= '1000';
	
			$this->load->library('upload', $config);
	
			if ( ! $this->upload->do_upload('image'))
			{			
				$this->session->set_userdata('ms', $this->upload->display_errors());			
			} else {				
				$image = $this->upload->data();
				$imageName = $image['file_name'];
				$description = $this->input->post('description');
				
				if($this->mod_slideshow->addSlideshow($imageName, $description) > 0){
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
			$config['upload_path'] = SLIDESHOW_IMAGE_PATH;
			$config['allowed_types'] = 'gif|jpg|jpeg|png|JPEG|JPG|PNG|x-png';
			$config['max_size']	= '1000';
	
			$this->load->library('upload', $config);
			$description = $this->input->post('description');
	
			if ( ! $this->upload->do_upload('image'))
			{			
			//	$this->session->set_userdata('ms', $this->upload->display_errors());
				if($this->mod_slideshow->updateSlideshow(NULL, $id, $description) > 0){
					$this->session->set_userdata('ms', $this->lang->line('ms_success'));
					redirect('slideshow/listslide');
				} else {
                    $this->session->set_userdata('ms', $this->lang->line('ms_error'));
                }				
			} else {				
				$image = $this->upload->data();
				$imageName = $image['file_name'];
				
				$oldData = $this->mod_slideshow->getSlideshowById($id);
				
				if($this->mod_slideshow->updateSlideshow($imageName, $id, $description) > 0){
					$this->session->set_userdata('ms', $this->lang->line('ms_success'));
					@unlink(SLIDESHOW_IMAGE_PATH . $oldData->row()->sli_image);
					redirect('slideshow/listslide');
				} else {
                    $this->session->set_userdata('ms', $this->lang->line('ms_error'));
                }
			}	
		}
		
		$data['slideshow'] = $this->mod_slideshow->getSlideshowById($id);
		
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
			@unlink(SLIDESHOW_IMAGE_PATH . $oldData->row()->sli_image);
        }else{
            $this->session->set_userdata('ms', $this->lang->line('ms_error'));
		}
        redirect('slideshow/listslide');
    }
}
