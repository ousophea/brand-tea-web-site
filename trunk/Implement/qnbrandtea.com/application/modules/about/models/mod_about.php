<?php

class mod_about extends CI_Model { 
	//View About us
    public function getAbout() {
        $this->db->select('*'); 
        $this->db->from(table('content'));
		$this->db->join(table('language'), table('content') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
		$this->db->where(field('lanDes'), $this->lang->line('lang'));
                $this->db->where(field('conId'),2);
        return $this->db->get();
    }	
    public function update($aboDec,$aboutId) {
        $data = array(
            field('conDes') => $aboDec		
            //field('langId') => 2
        );
        $this->db->where(field('conId'),$aboutId);
        $result= $this->db->update(table('content'), $data); 
        return $this->db->affected_rows($result);
    }   
}

?>
