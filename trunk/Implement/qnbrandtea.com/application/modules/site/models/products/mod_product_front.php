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
    public function getProDetails($id){
        $this->db->select('*');
        $this->db->from(table('product'));
        $this->db->join(table('group'), table('group') . '.' . field('groId') . '=' . table('product') . '.' . field('groId'));
        $this->db->join(table('category'), table('category') . '.' . field('catId') . '=' . table('group') . '.' . field('catId'));
        $this->db->join(table('language'), table('product') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
        $this->db->where(field('lanDes'), $this->lang->line('lang'));
        $this->db->where(field('proId'), $id);
        return $this->db->get();
    }

}
