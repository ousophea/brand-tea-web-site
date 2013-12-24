<?php

class mod_group extends CI_Model {

    public function addNew($groName, $groDec, $catId) {
        $data = array(
            field('groName') => $groName,
            field('groDes') => $groDec,
            field('catId') => $catId,
            field('langId') => 1
        );
        if ($this->db->insert(table('group'), $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function update($title, $des, $catId, $groId) {
        $data = array(
            field('groName') => $title,
            field('groDes') => $des,
            field('catId') => $catId,
            field('langId') => 1
        );
        $this->db->where(field('groId'),$groId);
        if ($this->db->update(table('group'), $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getGroup($start, $num) {
        $this->db->select('*');
        $this->db->limit($num, $start);
        $this->db->from(table('group'));
        $this->db->join(table('category'),table('category').'.'.  field('catId').'='.table('group').'.'.  field('catId'));
        $this->db->join(table('language'), table('group') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
        $this->db->where(field('lanDes'), $this->lang->line('lang'));
        return $this->db->get();
    }

    public function getAllGro() {
        $this->db->select('*');
        $this->db->from(table('group'));
        $this->db->join(table('category'),table('category').'.'.  field('catId').'='.table('group').'.'.  field('catId'));
        $this->db->join(table('language'), table('group') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
        $this->db->where(field('lanDes'), $this->lang->line('lang'));
        return $this->db->get()->num_rows();
    }

    public function delete($id) {
        $this->db->where(field('groId'), $id);
        if ($this->db->delete(table('group'))) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function getGro($id) {
        $this->db->select('*');
        $this->db->from(table('group'));
        $this->db->join(table('category'),table('category').'.'.  field('catId').'='.table('group').'.'.  field('catId'));
        $this->db->join(table('language'), table('group') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
        $this->db->where(field('lanDes'), $this->lang->line('lang'));
        $this->db->where(field('groId'), $id);
        return $this->db->get();
    }

}

?>
