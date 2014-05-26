<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class mod_global extends CI_Model {

    public function get_categories($limit) {
        $this->db->select('*');
        $this->db->limit($limit);
        $this->db->from(table('category'));
        return $this->db->get();
    }

    /**
     * Get all using categories
     * @return CI database object
     */
    public function getAllCats($limit = NULL) {
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
            return $this->getEnCats($limit);
        }
    }

    /**
     * Get English category
     */
    public function getEnCats($limit = NULL) {
        $this->db->select('*');
        $this->db->from(table('category'));
        $this->db->join(table('group'), table('group') . '.' . field('catId') . '=' . table('category') . '.' . field('catId'));
        $this->db->join(table('product'), table('product') . '.' . field('groId') . '=' . table('group') . '.' . field('groId'));
        $this->db->order_by(table('category') . '.' . field('catId'), "desc");
        $this->db->group_by(table('category') . '.' . field('catId'));
        $this->db->limit($limit);
        return $this->db->get();
    }

    /**
     * Get All using group
     * @return CI database object
     * 
     */
    public function getAllGros($limit = NULL, $where = NULL) {
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
            return $this->getEnGroup($limit, $where);
        }
    }

    /**
     * Get English group
     */
    public function getEnGroup($limit = NULL, $where = NULL) {


        $this->db->select('*');
        $this->db->from(table('group'));
        $this->db->join(table('category'), table('group') . '.' . field('catId') . '=' . table('category') . '.' . field('catId'));
        $this->db->join(table('product'), table('product') . '.' . field('groId') . '=' . table('group') . '.' . field('groId'));

        $this->db->where($where);

        $this->db->group_by(table('group') . '.' . field('groId'));
        $this->db->order_by(table('group') . '.' . field('groId'), 'desc');

        $this->db->limit($limit);
        return $this->db->get();
    }

      /**
     * Get front-end tea knowledge
     * @param int $start
     * @param int $perPage
     * @return CI database object
     */
    public function getService($limit=NULL) {
        $this->db->select('*');
        $this->db->limit($limit);
        $this->db->from(table('service'));

        if ($this->input->cookie('language')) {
            $this->db->join(table('serLang'), table('serLang') . '.' . field('serId') . '=' . table('service') . '.' . field('serId'));
            $this->db->join(table('language'), table('serLang') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
            $this->db->where(field('lanDes'), $this->input->cookie('language'));
            $this->db->where(table('serLang').'.'.field('serStatus'), 1);
            $this->db->ORDER_BY(table('serLang').'.'.field('serId'), 'DESC');
        }

        $data = $this->db->get();

        if ($data->num_rows() > 0) {
            return $data;
        } else {
            return $this->getEntea($limit);
        }
        return $this->db->get();
    }
        /**
     * Get English Product
     */
    public function getEntea($limit=NULL) {
        $this->db->select('*');
        $this->db->limit($limit);
        $this->db->from(table('service'));
        $this->db->where(field('serStatus'), 1);
        $this->db->ORDER_BY(field('serId'), 'DESC');
        return $this->db->get();
    }
}

?>
