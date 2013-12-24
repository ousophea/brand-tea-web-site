<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends Admin_Controller {

	public function index()
	{
            if(!$this->checkSession()){
                redirect('authentication/login');
                exit();
            }
            $data['title']="Welcome to Tea";
            $data['page']='admin/dashboard';
            $data['action']='Dashboard';
            $this->load->view('masterpage/master',$data);
	}
        
        public function checkSession(){
            if($this->session->userdata('admin')){
                return TRUE;
            }else{
                return FALSE;
            }
            
        }
}
