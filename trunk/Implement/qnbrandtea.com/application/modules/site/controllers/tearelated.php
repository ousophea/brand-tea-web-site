<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tearelated extends Base_Controller {

    function __construct() {
        parent::__construct();
		$this->load->model('tearelated/mod_tea_front');
		$this->load->helper('text');
    }
	public function index()
	{	
        $this->allteas();
	}
	 public function allteas() {
        $config['base_url'] = base_url() . $this->uri->segment(1) . '/' . $this->uri->segment(2) . '/allteas/';
        $config['total_rows'] = $this->mod_tea_front->getAllTeaNum();
        $config['per_page'] = 5;
        $config['uri_segment'] = 4;

        $this->pagination->initialize($config);

        // Get tea knowledge
        $data['teas'] = $this->mod_tea_front->getTea($this->uri->segment(4), $config['per_page']);
       
        $data['title'] = "Tea Related Knowledge";
        $data['page'] = 'tearelated/tearelated';
        $data['action'] = 'Tea Related Knowledge';
        $this->load->view('master', $data);
    }
	  /**
     * Get one Tea related knowledge to view details information
     * @param int $teaId
     */
    public function detail($teaId = 0) {
        if ($teaId == 0) {
            redirect($this->uri->segment(1) . '/' . $this->uri->segment(2));
            exit();
        }
        $data['teas'] = $this->mod_tea_front->getTeaDetails($this->uri->segment(4));

        $data['title'] = "Tea Related Knowledge Detail";
        $data['page'] = 'tearelated/detail';
        $data['action'] = 'View Tea Related Knowledge Details';
        $this->load->view('master', $data);
    }
}
