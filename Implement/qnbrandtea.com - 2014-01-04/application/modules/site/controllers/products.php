<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Products extends Base_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('products/mod_product_front');
        $this->load->helper('facebook');
    }

    public function index() {
        $this->allproducts();
    }

    public function allproducts() {
        $config['base_url'] = base_url() . $this->uri->segment(1) . '/' . $this->uri->segment(2) . '/allproducts/';
        $config['total_rows'] = $this->mod_product_front->getAllProNum();
        $config['per_page'] = 9;
        $config['uri_segment'] = 4;

        $this->pagination->initialize($config);

        // Get product
        $data['pros'] = $this->mod_product_front->getProduct($this->uri->segment(4), $config['per_page']);

        $data['cats'] = $this->mod_product_front->getAllCats();
        $data['gros'] = $this->mod_product_front->getAllGros();

        $data['title'] = "Product";
        $data['page'] = 'products/products';
        $data['action'] = 'Products';
        $this->load->view('master', $data);
    }

    /**
     * Get product's photo
     * @param int $proId
     * @param int $limit
     * @return CI database object
     */
    public function getPhoto($proId, $limit = 0) {
        return $this->mod_product_front->getProPhoto($proId, $limit);
    }

    /**
     * Get one product to view details information
     * @param int $proId
     */
    public function detail($proId = 0) {
        if ($proId == 0) {
            redirect($this->uri->segment(1) . '/' . $this->uri->segment(2));
            exit();
        }
        $data['pros'] = $this->mod_product_front->getPro($this->uri->segment(4));

        $data['cats'] = $this->mod_product_front->getAllCats();
        $data['gros'] = $this->mod_product_front->getAllGros();
        $data['title'] = "Product Detail";
        $data['page'] = 'products/detail';
        $data['action'] = 'View Product Details';
        $this->load->view('master', $data);
    }

    /**
     * Get related product
     */
    public function getRelatedProduct($proId=0){
        if($proId!=0){
            return $this->mod_product_front->getRelatedProduct($proId);
        }else {
            return '';
        }
    }
}
