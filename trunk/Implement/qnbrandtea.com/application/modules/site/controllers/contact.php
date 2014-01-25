<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends Base_Controller {

    function __construct() {
        parent::__construct();
		$this->load->model('contact/mod_contact_front');
		//$this->load->helper('facebook');
    }
	public function index()
	{	
        $this->contact();
	}
	 public function contact() {
       /**
     * Contact us view details information
     * 
     */
        $data['contact'] = $this->mod_contact_front->getContact();
       
        $data['title'] = "Contact us";
        $data['page'] = 'contact/contact';
        $data['action'] = 'contact us';
        $this->load->view('master', $data);
    }
	
}
