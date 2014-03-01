<?php

class mod_services extends CI_Model {

    //Insert new tea
    public function addTea($teaName, $teaDec) {
        $data = array(
            field('langId') => 1,
            field('serTitle') => $teaName,
            field('serDesc') => $teaDec,
            field('serStatus') => 1
        );
        if ($this->db->insert(table('service'), $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    //list all tea
    public function getAllTea($start, $num) {
        $this->db->select('*');
        $this->db->limit($num, $start);
        $this->db->from(table('service'));
        $this->db->join(table('language'), table('service') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
        $this->db->where(field('lanDes'), $this->lang->line('lang'));
        $this->db->order_by("ser_id", "desc");
        return $this->db->get();
    }

    //Get tea to edit
    public function getTea($tea_id) {
        $this->db->select('*');
        $this->db->from(table('service'));
        $this->db->join(table('language'), table('service') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
        $this->db->where(field('lanDes'), $this->lang->line('lang'));
        $this->db->where(field('serId'), $tea_id);
        return $this->db->get();
    }

    /*
     * Translation
     */

    public function checkLang($teaId, $langId) {
        $this->db->select('*');
        $this->db->from(table('serLang'));
        $this->db->where(field('serId'), $teaId);
        $this->db->where(field('langId'), $langId);
        return $this->db->get();
    }

    public function translate($itemId, $lanId, $teaName, $teaDec, $teastatus, $action) {
        $data = array(
            field('serId') => $itemId,
            field('langId') => $lanId,
            field('serTitle') => $teaName,
            field('serDesc') => $teaDec,
            field('serStatus') => $teastatus
        );
        if ($action == 'insert') {
            return $this->db->insert(table('serLang'), $data);
        } else if ($action == 'update') {
            $this->db->where(field('serId'), $itemId);
            $this->db->where(field('langId'), $lanId);
            return $this->db->update(table('serLang'), $data);
        }
        return FALSE;
    }

    //update tea related knowledge

    public function update($teaName, $teaDec, $teaStatus, $teaId) {
        $data = array(
            field('serTitle') => $teaName,
            field('serDesc') => $teaDec,
            field('serStatus') => $teaStatus,
            field('serId') => $teaId
                //field('langId') => 2
        );
        $this->db->where(field('serId'), $teaId);
        $result = $this->db->update(table('service'), $data);
        return $this->db->affected_rows($result);
    }

    //Delete tea knowledge
    public function delete($id) {
        $this->db->where(field('serId'), $id);
        if ($this->db->delete(table('service'))) {
            $this->delete_tea_lan($id);
            return TRUE;
        }
        return FALSE;
    }

    public function delete_tea_lan($id) {
        $this->db->where(field('serId'), $id);
        if ($this->db->delete(table('serLang'))) {
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
        $this->db->from(table('service'));
        return $this->db->get();
    }

}

?>
