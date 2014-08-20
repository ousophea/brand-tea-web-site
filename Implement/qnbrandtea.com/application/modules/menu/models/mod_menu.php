<?php

class mod_menu extends CI_Model {

//    public function addNew($cateName, $catDec, $fields) {
//        $data = array(
//            field('catName') => $cateName,
//            field('catDes') => $catDec,
//            field('catField') => $fields,
//            field('langId') => 1
//        );
//        if ($this->db->insert(table('category'), $data)) {
//            return TRUE;
//        } else {
//            return FALSE;
//        }
//    }

    public function update($array_men_name, $array_men_id) {
//        echo $menuName." --- ";
//        $data = array(
//            field('catName') => $cateName,
//            field('catDes') => $catDec,
//            field('catField') => $fields,
//            field('langId') => 1
//        );
           for ($i = 0; $i < count($array_men_id); $i++) {
           $data = array(
                    'md_id' => $array_men_id[$i],
                    'md_title' => $array_men_name[$i]
                        );
           $this->db->where('md_id',  $array_men_id[$i]);
           $this->db->update('menu_detail', $data);
        }
    }

    public function getMenu($menu_type) {
        $this->db->select('*');
        $this->db->from('menu_detail');
        $this->db->join('menus', 'md_men_id = men_id');
          $this->db->join('languages', 'md_lan_id = lang_id');
          $this->db->where('men_mt_id',$menu_type);
          $this->db->order_by("md_men_id", "asc"); 
          $this->db->order_by("md_lan_id", "asc"); 
        return $this->db->get();
    }

    public function getAllMenu() {
        $this->db->select('*');
        $this->db->from('menu_detail');
        $this->db->join('menus', 'md_men_id = men_id');
//        $this->db->join('languages', 'md_lan_id = lang_id');
//          $this->db->join('menu_type', 'men_mt_id = mt_id');
           $this->db->order_by("md_men_id", "asc"); 
        return $this->db->get();
    }

}
?>
