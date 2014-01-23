<?php

class Mod_Category extends CI_Model{
	
	public function getSlideshowCategory($start, $num){
		$this->db->select('*');
        $this->db->limit($num, $start);
        $this->db->from(table('sli_category'));
        return $this->db->get();
	}
	
    public function getSlideshowCategoryNum(){
        $objDb = $this->getAllSlideshowCategory();
        return $objDb->num_rows();
    }
	
    public function getAllSlideshowCategory() {
        $this->db->select('*');
        $this->db->from(table('sli_category'));
        return $this->db->get();
    }
	
    public function getSlideshowCategoryById($sliCatId) {
        $this->db->select('*');
        $this->db->from(table('sli_category'));
        $this->db->where(field('sliCatId'),$sliCatId);
        return $this->db->get();
    }
	
	public function addSlideshowCategory($name){
		$data = array(
			field('sliCatName') => $name
		);			
		$result = $this->db->insert(table('sli_category'), $data); 
		return $this->db->affected_rows($result);
	}
	
	public function updateSlideshowCategory($sliCatId, $name){
		$data = array(
			field('sliCatName') => $name
		);
			
        $this->db->where(field('sliCatId'),$sliCatId);
		$result = $this->db->update(table('sli_category'), $data); 
		return $this->db->affected_rows($result);
	}
	
    public function delete($sliCatId) {
        $this->db->where(field('sliCatId'), $sliCatId);
        $result = $this->db->delete(table('sli_category'));
		return $this->db->affected_rows($result);
    }
}