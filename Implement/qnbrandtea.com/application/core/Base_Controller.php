<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Base_Controller extends MX_Controller {
 
    function __construct() {
        parent::__construct();
		$this->lang->load('dany_english', 'english');
        $this->load->model(array('slideshow/mod_slideshow'));
    }
}
