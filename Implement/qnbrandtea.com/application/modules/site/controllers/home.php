<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once (dirname(__FILE__) . "/products.php");

class Home extends Base_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('products/mod_product_front', 'content/mod_content', 'tearelated/mod_tea_front'));
    }
	
	public function index()
	{
		$data['slideshow'] = $this->mod_slideshow->getSlideshowByCatId(1);
		$data['home'] = $this->mod_content->getContent(1);
		
        $config['per_page'] = 9;
        $config['uri_segment'] = 4;
		$data['products'] = $this->mod_product_front->getProduct($this->uri->segment(4), $config['per_page']);
        $data['teas'] = $this->mod_tea_front->getTea($this->uri->segment(4), $config['per_page']);
		$data['title']="Welcome to Tea home page";
		$data['page']='home';
		$data['action']='Dashboard';
		$this->load->view('master',$data);
	}
}
