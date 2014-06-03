<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Product class. This is a class that is details about how to view all products, details product, related products, and everything related to product to front page,
 * @author Richat CHHAYVANDY <richat.chhayvandy@gmail.com>
 */
class Mod_product_front extends CI_Model {

    /**
     * Get front-end product
     * @param int $start
     * @param int $perPage
     * @return CI database object
     */
    public function getProduct($start, $perPage) {
        $this->db->select('*');
        $this->db->limit($perPage, $start);
        $this->db->from(table('product'));
        $this->db->join(table('group'), table('group') . '.' . field('groId') . '=' . table('product') . '.' . field('groId'));
        $this->db->join(table('category'), table('category') . '.' . field('catId') . '=' . table('group') . '.' . field('catId'));

        if ($this->input->cookie('language')) {
            $this->db->join(table('proLang'), table('proLang') . '.' . field('proId') . '=' . table('product') . '.' . field('proId'));
            $this->db->join(table('language'), table('proLang') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
            $this->db->where(field('lanDes'), $this->input->cookie('language'));
        }
        $data = $this->db->get();

        if ($data->num_rows() > 0) {
            return $data;
        } else {
            return $this->getEnProduct($start, $perPage);
        }
    }

    /**
     * Get English Product
     */
    public function getEnProduct($start, $perPage) {
        $this->db->select('*');
        $this->db->limit($perPage, $start);
        $this->db->from(table('product'));
        $this->db->join(table('group'), table('group') . '.' . field('groId') . '=' . table('product') . '.' . field('groId'));
        $this->db->join(table('category'), table('category') . '.' . field('catId') . '=' . table('group') . '.' . field('catId'));
        return $this->db->get();
    }

    /**
     * Get one product details
     * @param int $id
     * @return CI database object
     */
    public function getProDetails($id) {
        $this->db->select('*');
        $this->db->from(table('product'));
        $this->db->join(table('group'), table('group') . '.' . field('groId') . '=' . table('product') . '.' . field('groId'));
        $this->db->join(table('category'), table('category') . '.' . field('catId') . '=' . table('group') . '.' . field('catId'));
//        $this->db->join(table('language'), table('product') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
//        $this->db->where(field('lanDes'), $this->lang->line('lang'));
        if ($this->input->cookie('language')) {
            $this->db->join(table('proLang'), table('proLang') . '.' . field('proId') . '=' . table('product') . '.' . field('proId'));
            $this->db->join(table('language'), table('proLang') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
            $this->db->where(field('lanDes'), $this->input->cookie('language'));
        }

        $this->db->where(field('proId'), $id);
        return $this->db->get();
    }

    /**
     * Get all product
     * @return CI database object
     */
    public function getAllProducts() {
        $this->db->select('*');
        $this->db->from(table('product'));
        $this->db->join(table('group'), table('group') . '.' . field('groId') . '=' . table('product') . '.' . field('groId'));
        $this->db->join(table('category'), table('category') . '.' . field('catId') . '=' . table('group') . '.' . field('catId'));
//        $this->db->join(table('language'), table('product') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
//        $this->db->where(field('lanDes'), $this->lang->line('lang'));
        return $this->db->get();
    }

    /**
     * Get all amount of product
     * @return int
     */
    public function getAllProNum() {
        return $this->getAllProducts()->num_rows();
    }

    /**
     * Get photo per product id
     * @param int $id
     * @param int $limit
     * @return CI database object
     */
    public function getProPhoto($id, $limit = 0) {
        $this->db->select('*');
        $this->db->from(table('photo'));
        $this->db->where(field('proId'), $id);
        $limit != 0 ? $this->db->limit($limit) : '';
        return $this->db->get();
    }

    public function getMainPhoto($id) {
        $this->db->select('*')
                ->from(table('photo'))
                ->where(field('isMainPhoto'), 1)
                ->where(field('proId'), $id);
        return $this->db->get();
    }

    /**
     * Get all using categories
     * @return CI database object
     */
    public function getAllCats() {
        $this->db->select('*');
        $this->db->from(table('category'));
        $this->db->join(table('group'), table('group') . '.' . field('catId') . '=' . table('category') . '.' . field('catId'));
        $this->db->join(table('product'), table('product') . '.' . field('groId') . '=' . table('group') . '.' . field('groId'));

        if ($this->input->cookie('language')) {
            $this->db->join(table('catLang'), table('catLang') . '.' . field('catId') . '=' . table('category') . '.' . field('catId'));
            $this->db->join(table('language'), table('catLang') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
            $this->db->where(field('lanDes'), $this->input->cookie('language'));
        }

        $this->db->group_by(table('category') . '.' . field('catId'));
        $data = $this->db->get();
        if ($data->num_rows() > 0) {
            return $data;
        } else {
            return $this->getEnCats();
        }
    }

    /**
     * Get English category
     */
    public function getEnCats() {
        $this->db->select('*');
        $this->db->from(table('category'));
        $this->db->join(table('group'), table('group') . '.' . field('catId') . '=' . table('category') . '.' . field('catId'));
        $this->db->join(table('product'), table('product') . '.' . field('groId') . '=' . table('group') . '.' . field('groId'));
        $this->db->group_by(table('category') . '.' . field('catId'));
        return $this->db->get();
    }

    /**
     * Get All using group
     * @return CI database object
     * 
     */
    public function getAllGros() {
        $this->db->select('*');
        $this->db->from(table('group'));
        $this->db->join(table('category'), table('group') . '.' . field('catId') . '=' . table('category') . '.' . field('catId'));
        $this->db->join(table('product'), table('product') . '.' . field('groId') . '=' . table('group') . '.' . field('groId'));

        if ($this->input->cookie('language')) {
            $this->db->join(table('groLang'), table('groLang') . '.' . field('groId') . '=' . table('group') . '.' . field('groId'));
            $this->db->join(table('language'), table('groLang') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
            $this->db->where(field('lanDes'), $this->input->cookie('language'));
        }
        $this->db->group_by(table('group') . '.' . field('groId'));
        $data = $this->db->get();
        if ($data->num_rows() > 0) {
            return $data;
        } else {
            return $this->getEnGroup();
        }
    }

    /**
     * Get English group
     */
    public function getEnGroup() {
        $this->db->select('*');
        $this->db->from(table('group'));
        $this->db->join(table('category'), table('group') . '.' . field('catId') . '=' . table('category') . '.' . field('catId'));
        $this->db->join(table('product'), table('product') . '.' . field('groId') . '=' . table('group') . '.' . field('groId'));
        $this->db->group_by(table('group') . '.' . field('groId'));
        return $this->db->get();
    }

    /**
     * Get single product. This function will use buy details or edit function
     * @param int $id Product's id
     * @return CI database object
     */
    public function getPro($id) {
        $this->db->select('*');
        $this->db->from(table('product'));
        $this->db->join(table('group'), table('group') . '.' . field('groId') . '=' . table('product') . '.' . field('groId'));
        $this->db->join(table('category'), table('category') . '.' . field('catId') . '=' . table('group') . '.' . field('catId'));
//        $this->db->join(table('language'), table('product') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
        if ($this->input->cookie('language')) {
            $this->db->join(table('proLang'), table('proLang') . '.' . field('proId') . '=' . table('product') . '.' . field('proId'));
            $this->db->join(table('language'), table('proLang') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
            $this->db->where(field('lanDes'), $this->input->cookie('language'));
        }

//        $this->db->where(field('lanDes'), $this->lang->line('lang'));
        $this->db->where(table('product') . '.' . field('proId'), $id);
        $data = $this->db->get();
        if ($data->num_rows() > 0) {
            return $data;
        } else {
            return $this->getEnPro($id);
        }
    }

    public function getEnPro($id) {
        $this->db->select('*');
        $this->db->from(table('product'));
        $this->db->join(table('group'), table('group') . '.' . field('groId') . '=' . table('product') . '.' . field('groId'));
        $this->db->join(table('category'), table('category') . '.' . field('catId') . '=' . table('group') . '.' . field('catId'));
        $this->db->join(table('language'), table('product') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
//        if ($this->input->cookie('language')) {
//            $this->db->join(table('proLang'), table('proLang') . '.' . field('proId') . '=' . table('product') . '.' . field('proId'));
//            $this->db->join(table('language'), table('proLang') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
//            $this->db->where(field('lanDes'), $this->input->cookie('language'));
//        }

        $this->db->where(field('lanDes'), $this->lang->line('lang'));
        $this->db->where(table('product') . '.' . field('proId'), $id);
        return $this->db->get();
    }

    /**
     * Get related product where product's id
     */
    public function getRelatedProduct($proId) {
        $data = $this->getPro($proId);
        if ($data->num_rows() > 0) {
            $html = '';
            foreach ($data->result_array() as $row) {
                $html.='<div class="span3">';
                $photo = Products::getPhoto($row[field('proId')], 1)->result_array();
                $att = array(
                    'src' => PRODUCT_PHOTO_PATH . '250x250/' . $photo[0][field('phoUrl')],
                    'width' => 110,
                    'class' => 'img'
                );
                $html.= '<div class="photo">' . img($att) . '</div>';
                $html.= '<div class="content">';
                $html.= $row[field('proName')];
                $price = unserialize($row[field('proPrice')]);
                if ($price['hide_show'] != 'hide') {
                    $html.= '<label class="price">' . $this->lang->line('currency') . $price['price'] . '</label>';
                }
//                $html.= '<label class="price">' . $this->lang->line('currency') . $row[field('proPrice')] . '</label>';
                $html.='<label class="order">' . anchor('site/products/detail/' . $row[field('proId')], 'Details', 'class="btn"') . '</label>';
                $html.= '</div>';
                $html.='</div>';
            }
            return $html;
        }
        return '';
    }

    /**
     * Get all products for category. Category's id is a condition for this method
     * @param int $catId
     * @return CI database object
     */
    public function getProPerCat($catId) {
        $this->db->select('*');
        $this->db->from(table('product'));
        $this->db->join(table('group'), table('group') . '.' . field('groId') . '=' . table('product') . '.' . field('groId'));
        $this->db->join(table('category'), table('category') . '.' . field('catId') . '=' . table('group') . '.' . field('catId'));
//        $this->db->join(table('language'), table('product') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
//        $this->db->where(field('lanDes'), $this->lang->line('lang'));
        if ($this->input->cookie('language') && $this->input->cookie('language') != 'en') {
            $this->db->join(table('proLang'), table('proLang') . '.' . field('proId') . '=' . table('product') . '.' . field('proId'));
            $this->db->join(table('language'), table('proLang') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
            $this->db->where(field('lanDes'), $this->input->cookie('language'));
        }
        $this->db->where(table('category') . '.' . field('catId'), $catId);
        return $this->db->get();
    }

    /**
     * Get all products for group. Group's id  is a condition for this method
     * @param int $groId
     * @return CI database object
     */
    public function getProPerGro($groId) {
        $this->db->select('*');
        $this->db->from(table('product'));
        $this->db->join(table('group'), table('group') . '.' . field('groId') . '=' . table('product') . '.' . field('groId'));
        $this->db->join(table('category'), table('category') . '.' . field('catId') . '=' . table('group') . '.' . field('catId'));
//        $this->db->join(table('language'), table('product') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
//        $this->db->where(field('lanDes'), $this->lang->line('lang'));
        if ($this->input->cookie('language') && $this->input->cookie('language') != 'en') {
            $this->db->join(table('proLang'), table('proLang') . '.' . field('proId') . '=' . table('product') . '.' . field('proId'));
            $this->db->join(table('language'), table('proLang') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
            $this->db->where(field('lanDes'), $this->input->cookie('language'));
        }
        $this->db->where(table('group') . '.' . field('groId'), $groId);
        return $this->db->get();
    }

    public function getCatName($catId) {

//        
        if ($this->input->cookie('language') && $this->input->cookie('language') != 'en') {
            $this->db->select(table('catLang') . '.' . field('catName'));
            $this->db->from(table('category'));
            $this->db->join(table('catLang'), table('catLang') . '.' . field('catId') . '=' . table('category') . '.' . field('catId'));
            $this->db->join(table('language'), table('catLang') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
            $this->db->where(field('lanDes'), $this->input->cookie('language'));
        } else {
            $this->db->select(table('category') . '.' . field('catName'));
            $this->db->from(table('category'));
            $this->db->join(table('language'), table('category') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
            $this->db->where(field('lanDes'), $this->lang->line('lang'));
        }
        $this->db->where(table('category') . '.' . field('catId'), $catId);
        $data = $this->db->get()->row_array();
        return $data;
    }

    public function getGroName($groId) {
        if ($this->input->cookie('language') && $this->input->cookie('language') != 'en') {
            $this->db->select(table('groLang') . '.' . field('groName'));
            $this->db->from(table('group'));
            $this->db->join(table('groLang'), table('groLang') . '.' . field('groId') . '=' . table('group') . '.' . field('groId'));
            $this->db->join(table('language'), table('groLang') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
            $this->db->where(field('lanDes'), $this->input->cookie('language'));
        } else {
            $this->db->select(field('groName'));
            $this->db->from(table('group'));
            $this->db->join(table('language'), table('group') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
            $this->db->where(field('lanDes'), $this->lang->line('lang'));
        }

        $this->db->where(table('group') . '.' . field('groId'), $groId);

        return $this->db->get()->row_array();
    }

    function searchProducts($end, $start) {
        $keyowrds = explode(" ", $this->input->post("q"));
        
        $this->db->from(table('product'));
        $this->db->join(table('group'), table('group') . '.' . field('groId') . '=' . table('product') . '.' . field('groId'));
        $this->db->join(table('category'), table('category') . '.' . field('catId') . '=' . table('group') . '.' . field('catId'));
        
        $this->db->limit($start, $end);
        foreach ($keyowrds as $key => $value) {
            $this->db->or_like('pro_name', $value);
            $this->db->or_like('pro_price', $value);
            $this->db->or_like('pro_qty', $value);
            $this->db->or_like('pro_fields', $value);
            $this->db->or_like('pro_related', $value);
            $this->db->or_like('pro_des', $value);
            $this->db->or_like('pro_knowledge_related', $value);

            $this->db->or_like('gro_name', $value);
            $this->db->or_like('gro_description', $value);

            $this->db->or_like('cate_name', $value);
            $this->db->or_like('cate_description', $value);
            $this->db->or_like('cate_fields', $value);
        }
        return $this->db->get();
    }

    function searchNumRows() {
        $keyowrds = explode(" ", $this->input->post("q"));
        
        
        $this->db->from(table('product'));
        $this->db->join(table('group'), table('group') . '.' . field('groId') . '=' . table('product') . '.' . field('groId'));
        $this->db->join(table('category'), table('category') . '.' . field('catId') . '=' . table('group') . '.' . field('catId'));
       
        
        foreach ($keyowrds as $key => $value) {
            $this->db->or_like('pro_name', $value);
            $this->db->or_like('pro_price', $value);
            $this->db->or_like('pro_qty', $value);
            $this->db->or_like('pro_fields', $value);
            $this->db->or_like('pro_related', $value);
            $this->db->or_like('pro_des', $value);
            $this->db->or_like('pro_knowledge_related', $value);

            $this->db->or_like('gro_name', $value);
            $this->db->or_like('gro_description', $value);

            $this->db->or_like('cate_name', $value);
            $this->db->or_like('cate_description', $value);
            $this->db->or_like('cate_fields', $value);
        }
        $data = $this->db->get();
        return $data->num_rows();
    }

}
