<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class About extends Base_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model(array( 'content/mod_content','translation/mod_translation'));
        $this->load->helper('facebook');
        // Load language
    }

    public function index() {
        $this->about();
    }

    public function about() {
        $data['slideshow'] = $this->mod_slideshow->getSlideshowByCatId(2);   
        $data['about'] = $this->mod_content->getContent(2);
        $data['title'] = $this->lang->line('men_about');
        $data['page'] = 'about/about';
        $data['action'] = $this->lang->line('men_about');
        $this->load->view('master', $data);
    }

}
