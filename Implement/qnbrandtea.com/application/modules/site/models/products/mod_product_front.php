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
        $this->db->join(table('language'), table('product') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
        $this->db->where(field('lanDes'), $this->lang->line('lang'));
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
        $this->db->join(table('language'), table('product') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
        $this->db->where(field('lanDes'), $this->lang->line('lang'));
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
        $this->db->join(table('language'), table('product') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
        $this->db->where(field('lanDes'), $this->lang->line('lang'));
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

    /**
     * Get all using categories
     * @return CI database object
     */
    public function getAllCats() {
        $this->db->select('*');
        $this->db->from(table('category'));
        $this->db->join(table('group'), table('group') . '.' . field('catId') . '=' . table('category') . '.' . field('catId'));
        $this->db->join(table('product'), table('product') . '.' . field('groId') . '=' . table('group') . '.' . field('groId'));
        $this->db->join(table('language'), table('product') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
        $this->db->where(field('lanDes'), $this->lang->line('lang'));
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
        $this->db->join(table('language'), table('product') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
        $this->db->where(field('lanDes'), $this->lang->line('lang'));
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
        $this->db->join(table('language'), table('product') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
        $this->db->where(field('lanDes'), $this->lang->line('lang'));
        $this->db->where(table('product').'.'.  field('proId'), $id);
        return $this->db->get();
    }
    
    /**
     * Get related product where product's id
     */
    public function getRelatedProduct($proId){
        $data = $this->getPro($proId);
        if($data->num_rows()>0){
            $html='';
            foreach($data->result_array() as $row){
                $html.='<div class="span3">';
                    $photo = Products::getPhoto($row[field('proId')], 1)->result_array();
                    $att = array(
                        'src' => PRODUCT_PHOTO_PATH .'250x250/'. $photo[0][field('phoUrl')],
                        'width' => 110,
                        'class' => 'img'
                    );
                    $html.= '<div class="photo">' . img($att) . '</div>';
                    $html.= '<div class="content">';
                    $html.= $row[field('proName')];
                    $html.= '<label class="price">' . $this->lang->line('currency'). $row[field('proPrice')] . '</label>';
                    $html.='<label class="order">'. anchor('site/products/detail/' . $row[field('proId')], 'Details', 'class="btn"'). '</label>';
                    $html.= '</div>';
                $html.='</div>';
            }
            return $html;
        }
        return '';
    }

}
