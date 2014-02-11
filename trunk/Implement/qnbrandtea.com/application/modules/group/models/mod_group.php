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
        $this->db->where(field('groId'), $groId);
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
        $this->db->join(table('category'), table('category') . '.' . field('catId') . '=' . table('group') . '.' . field('catId'));
        $this->db->join(table('language'), table('group') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
        $this->db->where(field('lanDes'), $this->lang->line('lang'));
        return $this->db->get();
    }

    public function getAllGro() {
        $this->db->select('*');
        $this->db->from(table('group'));
        $this->db->join(table('category'), table('category') . '.' . field('catId') . '=' . table('group') . '.' . field('catId'));
        $this->db->join(table('language'), table('group') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
        $this->db->where(field('lanDes'), $this->lang->line('lang'));
        return $this->db->get();
    }

    public function getGroNum() {
        return $this->getAllGro()->num_rows();
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
        $this->db->join(table('category'), table('category') . '.' . field('catId') . '=' . table('group') . '.' . field('catId'));
        $this->db->join(table('language'), table('group') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
        $this->db->where(field('lanDes'), $this->lang->line('lang'));
        $this->db->where(field('groId'), $id);
        return $this->db->get();
    }

    public function getFields($groId) {
        $fields = $this->getCatFields($groId);
        if ($fields->num_rows() > 0) {
            return $this->generateFieldsToHtml($fields);
        } else {
            return 'No field more!';
        }
    }

    public function getCatFields($groId) {
        $this->db->select(field('catField'));
        $this->db->from(table('group'));
        $this->db->join(table('category'), table('category') . '.' . field('catId') . '=' . table('group') . '.' . field('catId'));
        $this->db->join(table('language'), table('group') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
        $this->db->where(field('lanDes'), $this->lang->line('lang'));
        $this->db->where(field('groId'), $groId);
        return $this->db->get();
    }

    public function generateFieldsToHtml($data) {
        $fields = array();
        foreach ($data->result_array() as $row) {
            $fields = unserialize($row[field('catField')]);
        }
        $k = 0;
        $html = '';
        if(!is_array($fields['label'])){
            return FALSE;
        }
        foreach ($fields['label'] as $field) {
            $html .='<input type="hidden" value="' . $fields['label'][$k] . '" name="label[]" />';
            $html .='<label for="field-"' . $k . '>' . $fields['label'][$k] . ' </label><input id="field-"' . $k . ' type="text" name="field[]" value="' . $fields['field'][$k] . '">';
            $html.=' <input class="hideShow" type="checkbox" name="hide-show[]" value="hide" /> <input type="hidden" name="hide_show[]" value="show" />Hide';
            $k++;
        }
        return $html;
    }

    /*
     * Translation
     */

    public function checkLang($itemId, $langId) {
        $this->db->select('*');
        $this->db->from(table('groLang'));
        $this->db->where(field('groId'), $itemId);
        $this->db->where(field('langId'), $langId);
        return $this->db->get();
    }

    public function translate($itemId, $lanId, $name, $dec, $action) {
        $data = array(
            field('groName') => $name,
            field('groDes') => $dec,
            field('groId') => $itemId,
            field('langId') => $lanId
        );
        if ($action == 'insert') {
            return $this->db->insert(table('groLang'), $data);
        } else if ($action == 'update') {
            $this->db->where(field('groId'), $itemId);
            $this->db->where(field('langId'), $lanId);
            return $this->db->update(table('groLang'), $data);
        }
        return FALSE;
    }
}

?>
