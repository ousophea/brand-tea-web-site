<?php

class mod_tearelated extends CI_Model {
    //Insert new tea
    public function addTea($teaName,$teaDec) {
        $data = array(		
		    field('langId') => 1,
            field('teaTitle') => $teaName,
            field('teaDesc') => $teaDec,
            field('teaStatus') => 1 
        );
        if ($this->db->insert(table('tearelated'), $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
	//list all tea
    public function getAllTea($start, $num) {
        $this->db->select('*');
        $this->db->limit($num, $start);
        $this->db->from(table('tearelated'));
		$this->db->join(table('language'), table('tearelated') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
		$this->db->where(field('lanDes'), $this->lang->line('lang'));
		$this->db->order_by("tea_id", "desc");
        return $this->db->get();
    }
	//Get tea to edit
	public function getTea($tea_id){
	    $this->db->select('*');
        $this->db->from(table('tearelated'));
        $this->db->where(field('teaId'), $tea_id);
        return $this->db->get();
	}
	//update tea related knowledge
	
    public function update($teaName, $teaDec,$teaStatus, $teaId) {
        $data = array(
            field('teaTitle') => $teaName,
            field('teaDesc') => $teaDec,
			field('teaStatus')=>$teaStatus,
            field('teaId') => $teaId
            //field('langId') => 2
        );
        $this->db->where(field('teaId'),$teaId);
        $result= $this->db->update(table('tearelated'), $data); 
        return $this->db->affected_rows($result);
    }
	//Delete tea knowledge
    public function delete($id) {
        $this->db->where(field('teaId'), $id);
        $result = $this->db->delete(table('tearelated'));
		return $this->db->affected_rows($result);
    }
    
	public function getTeaNum(){
        $objDb = $this->getAllt();
        return $objDb->num_rows();
    } 
	 public function getAllt() {
        $this->db->select('*');
        $this->db->from(table('tearelated'));
        return $this->db->get();
    }
}

?>
