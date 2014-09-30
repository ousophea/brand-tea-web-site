<?php

class Mod_Admin extends CI_Model{
	

    public function getCount($table=NULL,$field=NULL){
        // Keep page information about return of book
        
        $this->db->select("count($field) as number");
        $this->db->from($table);
//        $this->db->where('bor_status', 0); //======Internet==========
        $data = $this->db->get();
        $result = array();
        if ($data->num_rows() > 0) {
            foreach ($data->result_array() as $row) {
                $result = $row['number'];
            }
        }
        return $result;
    }
	
    public function getAllSlideshow() {
        $this->db->select('*');
        $this->db->from(table('slideshow'));
        return $this->db->get();
    }

}