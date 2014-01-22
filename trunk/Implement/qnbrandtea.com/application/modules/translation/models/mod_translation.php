<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mod_translation
 *
 * @author who
 */
class mod_translation extends CI_Model{
    
    public function getLanguages(){
        $this->db->select('*');
        $this->db->from(table('language'));
        $this->db->order_by(field('langName'),'ASC');
        $this->db->where(field('lanDes').' !=','en');
        return $this->db->get();
    }
}

?>
