<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Base_Controller {

    function __construct() {
        parent::__construct();
    }
	
	public function index()
	{
		$data['slideshow'] = $this->mod_slideshow->getSlideshowByCatId(1);
		
		$data['title']="Welcome to Tea home page";
		$data['page']='home';
		$data['action']='Dashboard';
		$this->load->view('master',$data);
	}
}
