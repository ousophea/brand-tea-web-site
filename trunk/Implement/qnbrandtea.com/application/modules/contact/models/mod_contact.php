<?php

class mod_contact extends CI_Model { 
	//View Contact us
    public function getContact() {
        $this->db->select('*'); 
        $this->db->from(table('contact'));
		$this->db->join(table('language'), table('contact') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
		$this->db->where(field('lanDes'), $this->lang->line('lang'));	
        return $this->db->get();
    }	
    public function update($conDec,$conStatus,$contactId) {
        $data = array(
            field('contactDesc') => $conDec,
			field('contactStatus')=>$conStatus,
            field('contactId') => $contactId
            //field('langId') => 2
        );
        $this->db->where(field('contactId'),$contactId);
        $result= $this->db->update(table('contact'), $data); 
        return $this->db->affected_rows($result);
    }   
}

?>
