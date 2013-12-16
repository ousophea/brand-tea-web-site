<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index()
	{
            $data['title']="Welcome to Tea";
            $data['page']='dashboard';
            $data['action']='Dashboard';
            $this->load->view('master',$data);
	}
}
