<?php

class mod_tearelated extends CI_Model {

    //Insert new tea
    public function addTea($teaName, $teaDec) {
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
    public function getTea($tea_id) {
        $this->db->select('*');
        $this->db->from(table('tearelated'));
        $this->db->join(table('language'), table('tearelated') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
        $this->db->where(field('lanDes'), $this->lang->line('lang'));
        $this->db->where(field('teaId'), $tea_id);
        return $this->db->get();
    }

    /*
     * Translation
     */

    public function checkLang($teaId, $langId) {
        $this->db->select('*');
        $this->db->from(table('teaLang'));
        $this->db->where(field('teaId'), $teaId);
        $this->db->where(field('langId'), $langId);
        return $this->db->get();
    }

    public function translate($itemId, $lanId, $teaName, $teaDec, $teastatus, $action) {
        $data = array(
            field('teaId') => $itemId,
            field('langId') => $lanId,
            field('teaTitle') => $teaName,
            field('teaDesc') => $teaDec,
            field('teaStatus') => $teastatus
        );
        if ($action == 'insert') {
            return $this->db->insert(table('teaLang'), $data);
        } else if ($action == 'update') {
            $this->db->where(field('teaId'), $itemId);
            $this->db->where(field('langId'), $lanId);
            return $this->db->update(table('teaLang'), $data);
        }
        return FALSE;
    }

    //update tea related knowledge

    public function update($teaName, $teaDec, $teaStatus, $teaId) {
        $data = array(
            field('teaTitle') => $teaName,
            field('teaDesc') => $teaDec,
            field('teaStatus') => $teaStatus,
            field('teaId') => $teaId
                //field('langId') => 2
        );
        $this->db->where(field('teaId'), $teaId);
        $result = $this->db->update(table('tearelated'), $data);
        return $this->db->affected_rows($result);
    }

    //Delete tea knowledge
    public function delete($id) {
        $this->db->where(field('teaId'), $id);
        if ($this->db->delete(table('tearelated'))) {
            $this->delete_tea_lan($id);
            return TRUE;
        }
        return FALSE;
    }

    public function delete_tea_lan($id) {
        $this->db->where(field('teaId'), $id);
        if ($this->db->delete(table('teaLang'))) {
            return TRUE;
        }
        return FALSE;
    }

    public function getTeaNum() {
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
