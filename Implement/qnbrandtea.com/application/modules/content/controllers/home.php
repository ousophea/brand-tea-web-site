<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Admin_Controller {
	
	public function __construct(){
        if (!$this->checkSession()) {
            redirect('authentication/login');
        }
        $this->load->model(array('mod_content','translation/mod_translation'));
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
	
	
	public function uploadImage(){
		$config['upload_path'] = SLIDESHOW_IMAGE_PATH;
		$config['allowed_types'] = 'jpg|jpeg|JPEG|JPG';
		$config['max_size']	= '1000';	
	
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('image'))
		{			
			echo '<script>alert("Image does not supported, only .jpeg, .jpg are allowed!");</script>';
		//	$this->session->set_userdata('ms', $this->upload->display_errors());	
		} else {				
			$image = $this->upload->data();
			$imageName = $image['file_name'];
			echo '<script>$("#img-preview").html("");</script>';
			echo '<img src="' . base_url() . SLIDESHOW_IMAGE_PATH . $imageName . '" id="cropbox" />';
			echo '<script>crop_image();</script>';
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
			$targ_h = 185;
			$jpeg_quality = 100;
			$suf = '';
			$new_img = "tea-banner.jpg"; //$file_name . $suf . '.' . $ext;
		
			$src = SLIDESHOW_IMAGE_PATH . $image;
			$dist = SLIDESHOW_IMAGE_PATH . $new_img;
			$img_r = imagecreatefromjpeg($src);
			$dst_r = imagecreatetruecolor( $targ_w, $targ_h );
		
			imagecopyresampled($dst_r,$img_r,0,0,$x,$y, $targ_w, $targ_h, $w, $h);		
			header('Content-type: image/jpeg');
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
}
