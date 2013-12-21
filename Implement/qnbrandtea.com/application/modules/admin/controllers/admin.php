<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Admin_Controller {

	public function index()
	{
            $data['title']="Welcome to Tea";
            $data['page']='admin/dashboard';
            $data['action']='Dashboard';
            $this->load->view('master',$data);
	}
}
