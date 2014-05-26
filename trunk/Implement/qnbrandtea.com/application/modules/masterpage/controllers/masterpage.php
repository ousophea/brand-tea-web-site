<?php
class Masterpage extends MX_Controller {
    function __construct() {
        parent::__construct();
        // Load language
        if ($this->input->cookie('language') == 'en') {
            $this->lang->load('english', 'english');
        } else if ($this->input->cookie('language') == 'kh') {
            $this->lang->load('khmer', 'khmer');
        } else if ($this->input->cookie('language') == 'ch') {
            $this->lang->load('chiness', 'chiness');
        }

    }
  
    

}

