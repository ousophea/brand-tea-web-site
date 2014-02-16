<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contact extends Base_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model(array('contact/mod_contact_front','content/mod_content'));
        $this->load->helper('facebook');
        $this->load->helper('map');
        $this->load->helper('skype');
        // Load language
    }
    public function index() {
        $this->contact();
    }
    public function contact() {
        $data['slideshow'] = $this->mod_slideshow->getSlideshowByCatId(6);
        $data['contact'] = $this->mod_content->getContent(3);
        $data['title'] = $this->lang->line('men_contact');
        $data['page'] = 'contact/contact';
        $data['action'] = $this->lang->line('men_contact');
        $this->load->view('master', $data);
    }
}
