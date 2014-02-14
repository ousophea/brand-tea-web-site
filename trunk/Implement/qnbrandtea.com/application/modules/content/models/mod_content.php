<?php

class Mod_Content extends CI_Model{
	
	public function getContent($id){
		$this->db->select('*');
        $this->db->from(table('content'));
		$this->db->where(table('content') . '.' . field('conId'), $id);
		
        if ($this->input->cookie('language')) {
            $this->db->join(table('conLang'), table('conLang') . '.' . field('conId') . '=' . table('content') . '.' . field('conId'));
            $this->db->join(table('language'), table('conLang') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
            $this->db->where(field('lanDes'), $this->input->cookie('language'));
        }
		
        $data = $this->db->get();

        if ($data->num_rows() > 0) {
            return $data;
        } else {
            return $this->getEnContent($id);
        }
	}
	
	public function getEnContent($id){
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

    /*
     * Translation
     */

    public function checkLang($conId, $langId) {
        $this->db->select('*');
        $this->db->from(table('conLang'));
        $this->db->where(field('conId'), $conId);
        $this->db->where(field('langId'), $langId);
        return $this->db->get();
    }

    public function translate($itemId, $lanId, $conName, $conDes, $action) {
        $data = array(
            field('conName') => $conName,
            field('conDes') => $conDes,
            field('conId') => $itemId,
            field('langId') => $lanId
        );
        if ($action == 'insert') {
            return $this->db->insert(table('conLang'), $data);
        } else if ($action == 'update') {
            $this->db->where(field('conId'), $itemId);
            $this->db->where(field('langId'), $lanId);
            return $this->db->update(table('conLang'), $data);
        }
        return FALSE;
    }
}