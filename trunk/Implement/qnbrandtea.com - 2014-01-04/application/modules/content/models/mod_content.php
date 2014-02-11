<?php

class Mod_Content extends CI_Model{
	
	public function getContent($id){
		$this->db->select('*');
        $this->db->from(table('content'));
		$this->db->where(field('conId'), $id);
        return $this->db->get();
	}
	
	public function updateContent($id, $name, $description){
		$data = array(
			field('conName') => $name,
			field('conDes') => $description
		);
		$this->db->where(field('conId'), $id);
		$result = $this->db->update(table('content'), $data);
		return $this->db->affected_rows($result);
	}
}