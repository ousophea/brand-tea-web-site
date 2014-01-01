<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Products extends Base_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('products/mod_product_front');
    }
    
    public function index(){
        $this->allproducts();
    }
    
    public function allproducts(){
//        $config['base_url'] = base_url() . $this->uri->segment(1).'/'.$this->uri->segment(2) . '/allproducts/';
//        $config['total_rows'] = $this->mod_product->getProNum();
//        $config['per_page'] = 25;
//        $config['uri_segment']=4;
//
//        $this->pagination->initialize($config);

//        $data['pros'] = $this->mod_product->getProduct($this->uri->segment(3), $config['per_page']);

        $data['title'] = "Product";
        $data['page'] = 'products/products';
        $data['action'] = 'View Product';
        $this->load->view('master', $data);
    }
}

?>
