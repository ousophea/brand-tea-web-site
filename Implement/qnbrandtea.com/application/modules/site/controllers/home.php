<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
include_once (dirname(__FILE__) . "/products.php");

class Home extends Base_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array('products/mod_product_front', 'content/mod_content', 'tearelated/mod_tea_front'));
    }

    public function index() {
        $data['slideshow'] = $this->mod_slideshow->getSlideshowByCatId(1);
        $data['home'] = $this->mod_content->getContent(1);

        $config['base_url'] = base_url() . $this->uri->segment(1) . '/' . $this->uri->segment(2) . '/allproducts/';
        $config['total_rows'] = $this->mod_product_front->getAllProNum();
        $config['per_page'] = 12;
        $config['uri_segment'] = 4;

        $this->pagination->initialize($config);

        $data['products'] = $this->mod_product_front->getProduct($this->uri->segment(5), $config['per_page']);
        $data['teas'] = $this->mod_tea_front->getTea($this->uri->segment(4), 9);
        $data['title'] = "Welcome to Tea home page";
        $data['page'] = 'home/home';
        $data['action'] = 'Dashboard';
        $this->load->view('master', $data);
    }

}
