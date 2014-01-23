<?php

class Mod_Slideshow extends CI_Model{
	
	public function getSlideshow($start, $num){
		$this->db->select('*');
        $this->db->limit($num, $start);
        $this->db->from(table('slideshow'));
        return $this->db->get();
	}
	
    public function getSlideshowNum(){
        $objDb = $this->getAllSlideshow();
        return $objDb->num_rows();
    }
	
    public function getAllSlideshow() {
        $this->db->select('*');
        $this->db->from(table('slideshow'));
        return $this->db->get();
    }
	
    public function getSlideshowById($sliId) {
        $this->db->select('*');
        $this->db->from(table('slideshow'));
        $this->db->where(field('sliId'),$sliId);
        return $this->db->get();
    }
	
	public function addSlideshow($imageName, $description){
		$data = array(
			field('sliImage') => $imageName,
			field('sliDes') => $description 
		);			
		$result = $this->db->insert(table('slideshow'), $data); 
		return $this->db->affected_rows($result);
	}
	
	public function updateSlideshow($imageName, $sliId, $description){
		$data = array(
			field('sliImage') => $imageName,
			field('sliDes') => $description
		);
		
		if(empty($imageName))
			unset($data[field('sliImage')]);
			
        $this->db->where(field('sliId'),$sliId);
		$result = $this->db->update(table('slideshow'), $data); 
		return $this->db->affected_rows($result);
	}
	
    public function delete($sliId) {
        $this->db->where(field('sliId'), $sliId);
        $result = $this->db->delete(table('slideshow'));
		return $this->db->affected_rows($result);
    }
		
    public function getSlideshowByCatId($sliCatId) {
        $this->db->select('*');
        $this->db->from(table('slideshow'));
        $this->db->where(field('sliCatId'),$sliCatId);
        return $this->db->get();
    }
}