<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends Base_Controller {

    function __construct() {
        parent::__construct();
		$this->load->model('about/mod_about_front');
		$this->load->helper('facebook');
    }
	public function index()
	{	
        $this->about();
	}
	 public function about() {
       /**
     * Abou us view details information
     * 
     */
        $data['about'] = $this->mod_about_front->getAbout();
       
        $data['title'] = "About us";
        $data['page'] = 'about/about';
        $data['action'] = 'About us';
        $this->load->view('master', $data);
    }
	
}
