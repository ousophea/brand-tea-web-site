<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slideshow extends Admin_Controller {
	
	public function __construct(){
        if (!$this->checkSession()) {
            redirect('authentication/login');
        }
        $this->load->model(array('mod_slideshow', 'slideshow/mod_category','translation/mod_translation'));
	}

	public function index()
	{
		$this->listSlide();
	}
	
	public function listSlide(){
        $config['base_url'] = base_url() . $this->uri->segment(1) . '/listSlide/';
        $config['total_rows'] = $this->mod_slideshow->getSlideshowNum();
        $config['per_page'] = 25;

        $this->pagination->initialize($config);
		$data['slideshow'] = $this->mod_slideshow->getSlideshow($this->uri->segment(3), $config['per_page']);
		
        $data['langs'] = $this->mod_translation->getLanguages();
		
		$data['title']="Slidesow Management - List";
		$data['page']='slideshow/list';
		$data['action']='Slidesow Management';
    	$this->load->view('masterpage/master',$data);
	}
	
	public function addNew(){
					
		if($this->input->post()){
			$image = $this->input->post('oldimage');
			$category = $this->input->post('category');
			$description = $this->input->post('description');
	
			if (!empty($image))
			{		
				if($this->mod_slideshow->addSlideshow($image, $description, $category) > 0){
					$this->session->set_userdata('ms', $this->lang->line('ms_success'));
					redirect('slideshow/listSlide');
				} else {
                    $this->session->set_userdata('ms', $this->lang->line('ms_error'));
                }
			} else {
				$this->session->set_userdata('ms', $this->lang->line('ms_error'));
			}
		}
		$data['category'] = $this->mod_category->getAllSlideshowCategory();
		
		$data['title']="Slidesow Management - Add new";
		$data['page']='slideshow/new';
		$data['action']='Add new slideshow';
    	$this->load->view('masterpage/master',$data);
	}
	
	public function edit(){
		$id = $this->uri->segment(3);
		
		if($this->input->post()){
			$image = $this->input->post('oldimage');
			$category = $this->input->post('category');
			$description = $this->input->post('description');
	
			if (empty($image))
			{			
				if($this->mod_slideshow->updateSlideshow(NULL, $id, $description, $category) > 0){
					$this->session->set_userdata('ms', $this->lang->line('ms_success'));
					redirect('slideshow/listslide');
				} else {
					$this->session->set_userdata('ms', $this->lang->line('ms_error'));
				}				
			} else {		
				$oldData = $this->mod_slideshow->getSlideshowById($id);
				
				if($this->mod_slideshow->updateSlideshow($image, $id, $description, $category) > 0){
					$this->session->set_userdata('ms', $this->lang->line('ms_success'));
					@unlink(SLIDESHOW_IMAGE_PATH . $oldData->row()->sli_image);
					redirect('slideshow/listslide');
				} else {
					$this->session->set_userdata('ms', $this->lang->line('ms_error'));
				}
			}	
		}
		
		$data['slideshow'] = $this->mod_slideshow->getSlideshowById($id);
		$data['category'] = $this->mod_category->getAllSlideshowCategory();
		
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
	
	public function uploadImage(){
		$oldImage = $this->input->post('oldimage');
		$config['upload_path'] = SLIDESHOW_IMAGE_PATH;
		$config['allowed_types'] = 'gif|jpg|jpeg|png|JPEG|JPG|PNG|x-png';
		$config['max_size']	= '1000';	
	
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('image'))
		{			
		//	$this->session->set_userdata('ms', $this->upload->display_errors());	
		} else {				
			$image = $this->upload->data();
			$imageName = $image['file_name'];
			echo '<script>$("#img-preview").html("");</script>';
			echo '<img src="' . base_url() . SLIDESHOW_IMAGE_PATH . $imageName . '" id="cropbox" />';
			echo '<script>crop_image();$("#oldimage").val("' . $imageName . '")</script>';
			@unlink(SLIDESHOW_IMAGE_PATH . $oldImage);
		}
	}
	
	public function cropImage(){	
		
		if($this->input->post('x')){
			$x = $this->input->post('x');
			$y = $this->input->post('y');
			$w = $this->input->post('w');
			$h = $this->input->post('h');
			$image = $this->input->post('image');			
			$ext = end(explode(".", $image));		// get file extension
			$file_name = current(explode(".", $image));	// get file name withoud extension
			
			$targ_w = 950;
			$targ_h = 267;
			$jpeg_quality = 100;
			$suf = '_950x267';
			$new_img = $file_name . $suf . '.' . $ext;
		
			$src = SLIDESHOW_IMAGE_PATH . $image;
			$dist = SLIDESHOW_IMAGE_PATH . $new_img;
			$img_r = imagecreatefromjpeg($src);
			$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
		
			imagecopyresampled($dst_r,$img_r,0,0,$x,$y, $targ_w, $targ_h, $w, $h);		
			//header('Content-type: image/jpeg');
			if(imagejpeg($dst_r,$dist,$jpeg_quality))
				@unlink(SLIDESHOW_IMAGE_PATH . $image);
			else
				$new_img = $image;
			
			$data = array('image'=>$new_img);			
			echo json_encode($data);
			return;
		}	
		$data = array('image'=>'');			
		echo json_encode($data);
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
    public function slideshow_translation($itemId, $lanId) {
		$sliDes = $this->input->post('description');		
		$action =$this->input->post('action');
		if($this->mod_slideshow->translate($itemId, $lanId, $sliDes, $action)){
			$this->session->set_userdata('ms', $this->lang->line('ms_success'));
			redirect('slideshow');
		}
        
        $data['title'] = "Translate";
        $data['page'] = 'slideshow_translation';
        $data['action'] = 'Translate';
        if ($this->input->post('lan_title')) {
            $data['langTitle'] = $this->input->post('lan_title');
            $data['itemId']=$this->input->post('item_id');
            $data['langId']=$this->input->post('lang_id');
            $data['items']=$this->input->post('item_data');
        }else{
            redirect('slideshow');
        }
        
        $this->load->view('masterpage/master', $data);
    }
}
