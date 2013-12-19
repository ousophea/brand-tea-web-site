<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slideshow extends Admin_Controller {
	
	public function __construct(){
	}

	public function index()
	{
		$this->listSlide();
	}
	
	public function listSlide(){
		$data['title']="Slidesow Management";
		$data['page']='slideshow/list';
		$data['action']='Dashboard';
    	$this->load->view('master',$data);
	}
	
	public function newSlide(){
		
		$data['title']="Slidesow Management";
		$data['page']='slideshow/new';
		$data['action']='Dashboard';
    	$this->load->view('master',$data);
	}
}
