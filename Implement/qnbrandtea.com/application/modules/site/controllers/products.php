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
        $this->viewProducts();
    }

    /**
     * Viell products by limit  9 products
     */
    public function viewProducts() {
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
    public function getRelatedProduct($proId = 0) {
        if ($proId != 0) {
            return $this->mod_product_front->getRelatedProduct($proId);
        } else {
            return '';
        }
    }

    public function category($catId = 0) {
        // Get product
        $data['pros'] = $this->mod_product_front->getProPerCat($catId);

        $data['cats'] = $this->mod_product_front->getAllCats();
        $data['gros'] = $this->mod_product_front->getAllGros();
        
        $catName = $this->mod_product_front->getCatName($catId);
        $data['title'] = $catName[field('catName')];
        $data['page'] = 'products/products';
        $data['action'] = $catName[field('catName')];
        $this->load->view('master', $data);
    }

    public function group($groId = 0) {
        // Get product
        $data['pros'] = $this->mod_product_front->getProPerGro($groId);

        $data['cats'] = $this->mod_product_front->getAllCats();
        $data['gros'] = $this->mod_product_front->getAllGros();
        
        $groName = $this->mod_product_front->getGroName($groId);
        $data['title'] = $groName[field('groName')];
        $data['page'] = 'products/products';
        $data['action'] = $groName[field('groName')];
        $this->load->view('master', $data);
    }

}
