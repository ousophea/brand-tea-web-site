<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Service extends Base_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('content/mod_content', 'tearelated/mod_tea_front'));
        //$this->load->helper('facebook');
    }

    public function index() {
        $this->service();
    }

    public function service() {
        $data['slideshow'] = $this->mod_slideshow->getSlideshowByCatId(4);
        $data['service'] = $this->mod_content->getContent(4);
		
		$config['per_page'] = 9;
        $config['uri_segment'] = 4;
        $data['teas'] = $this->mod_tea_front->getTea($this->uri->segment($config['uri_segment']), $config['per_page']);

        $data['title'] = "Service";
        $data['page'] = 'service/list';
        $data['action'] = 'Service';
        $this->load->view('master', $data);
    }

}
