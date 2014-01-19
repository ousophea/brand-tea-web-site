<?php

class mod_about extends CI_Model { 
	//View About us
    public function getAbout() {
        $this->db->select('*'); 
        $this->db->from(table('about'));
		$this->db->join(table('language'), table('about') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
		$this->db->where(field('lanDes'), $this->lang->line('lang'));	
        return $this->db->get();
    }	
    public function update($aboDec,$aboStatus,$aboutId) {
        $data = array(
            field('aboDesc') => $aboDec,
			field('aboStatus')=>$aboStatus,
            field('aboId') => $aboutId
            //field('langId') => 2
        );
        $this->db->where(field('aboId'),$aboutId);
        $result= $this->db->update(table('about'), $data); 
        return $this->db->affected_rows($result);
    }   
}

?>
