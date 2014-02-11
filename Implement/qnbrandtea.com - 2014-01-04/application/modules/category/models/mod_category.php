<?php

class mod_category extends CI_Model {

    public function addNew($cateName, $catDec, $fields) {
        $data = array(
            field('catName') => $cateName,
            field('catDes') => $catDec,
            field('catField') => $fields,
            field('langId') => 1
        );
        if ($this->db->insert(table('category'), $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function update($cateName, $catDec, $fields, $catId) {
        $data = array(
            field('catName') => $cateName,
            field('catDes') => $catDec,
            field('catField') => $fields,
            field('langId') => 1
        );
        $this->db->where(field('catId'),$catId);
        if ($this->db->update(table('category'), $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getCategory($start, $num) {
        $this->db->select('*');
        $this->db->limit($num, $start);
        $this->db->from(table('category'));
        return $this->db->get();
    }

    public function getAllCat() {
        $this->db->select('*');
        $this->db->from(table('category'));
        $this->db->join(table('language'), table('category') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
        $this->db->where(field('lanDes'), $this->lang->line('lang'));
        return $this->db->get();
    }

    public function getCatNum(){
        $objDb = $this->getAllCat();
        return $objDb->num_rows();
    }
    public function delete($catId) {
        $this->db->where(field('catId'), $catId);
        if ($this->db->delete(table('category'))) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getCat($catId) {
        $this->db->select('*');
        $this->db->from(table('category'));
        $this->db->join(table('language'), table('category') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
        $this->db->where(field('lanDes'), $this->lang->line('lang'));
        $this->db->where(field('catId'), $catId);
        return $this->db->get();
    }

}

?>
