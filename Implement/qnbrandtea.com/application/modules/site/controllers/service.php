<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Service extends Base_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('content/mod_content'));
        //$this->load->helper('facebook');
        // Load language
        $this->load->helper('checklang');
    }

    public function index() {
        $this->service();
    }

    public function service() {
        $data['slideshow'] = $this->mod_slideshow->getSlideshowByCatId(4);
        $data['service'] = $this->mod_content->getContent(4);

        $data['title'] = "Service";
        $data['page'] = 'service/list';
        $data['action'] = 'Service';
        $this->load->view('master', $data);
    }

}
