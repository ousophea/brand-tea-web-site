<?php

class mod_product extends CI_Model {

    public function addNew($proName, $proPrice, $proQty, $proDec, $proRelated, $groId, $fields, $photos) {
        $data = array(
            field('proName') => $proName,
            field('proPrice') => $proPrice,
            field('proQty') => $proQty,
            field('proDes') => $proDec,
            field('proField') => $fields,
            field('proRelated') => $proRelated,
            field('groId') => $groId,
            field('langId') => 1
        );
        if ($this->db->insert(table('product'), $data)) {
            $proId = $this->db->insert_id();
            if ($this->addNewPhoto($proId, $photos)) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
        return FALSE;
    }

    public function addNewPhoto($proId, $photos) {
        foreach ($photos as $photo) {
            $data[] = array(
                field('phoUrl') => $photo['file_name'],
                field('proId') => $proId
            );
        }
        return $this->db->insert_batch(table('photo'), $data);
    }

    public function update($proId, $proName, $proPrice, $proQty, $proDec, $proRelated, $groId, $fields, $photos='') {
        $data = array(
            field('proName') => $proName,
            field('proPrice') => $proPrice,
            field('proQty') => $proQty,
            field('proDes') => $proDec,
            field('proField') => $fields,
            field('proRelated') => $proRelated,
            field('groId') => $groId,
            field('langId') => 1
        );
        $this->db->where(field('proId'), $proId);
        if ($this->db->update(table('product'), $data)) {
            if ($photos==''){
                return TRUE;
            }
            else if ($this->addNewPhoto($proId, $photos)) {
                return TRUE;
            }
        }
        return FALSE;
    }

    public function getProduct($start, $num) {
        $this->db->select('*');
        $this->db->limit($num, $start);
        $this->db->from(table('product'));
        $this->db->join(table('group'), table('group') . '.' . field('groId') . '=' . table('product') . '.' . field('groId'));
        $this->db->join(table('category'), table('category') . '.' . field('catId') . '=' . table('group') . '.' . field('catId'));
        $this->db->join(table('language'), table('product') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
        $this->db->where(field('lanDes'), $this->lang->line('lang'));
        return $this->db->get();
    }

    public function getAllPro() {
        $this->db->select('*');
        $this->db->from(table('product'));
        $this->db->join(table('group'), table('group') . '.' . field('groId') . '=' . table('product') . '.' . field('groId'));
        $this->db->join(table('category'), table('category') . '.' . field('catId') . '=' . table('group') . '.' . field('catId'));
        $this->db->join(table('language'), table('product') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
        $this->db->where(field('lanDes'), $this->lang->line('lang'));
        return $this->db->get();
    }

    public function getProNum() {
        return $this->getAllPro()->num_rows();
    }

    /**
     * Delete product
     * @param type $id
     * @return boolean
     */
    public function delete($id) {

        $this->db->where(field('proId'), $id);
        if ($this->db->delete(table('product'))) {

            $photos = $this->getPhoto($id);
            // Delete photo from database
            $this->deletePhoto($id);

            // Delete photo in local directory
            $this->deletePhotoInLocalDir($photos, './uploads/products/');

            return TRUE;
        }
        return FALSE;
    }

    public function deletePhoto($id) {
        $this->db->where(field('proId'), $id);
        if ($this->db->delete(table('photo'))) {
            return TRUE;
        }
        return FALSE;
    }

    /**
     * Delete all photos that belong to deleted product
     * 
     * @param array database object $photos
     */
    public function deletePhotoInLocalDir($photos, $path) {
        foreach ($photos->result_array() as $file) { // iterate files
            if (is_file($path . $file[field('phoUrl')])) {
                unlink($path . $file[field('phoUrl')]); // delete file
            } else {
                echo $path . $file[field('phoUrl')] . '<br />';
            }
        }
    }

    /**
     * Function get Photos for a product
     * @param int $id
     * @return array database object 
     */
    public function getPhoto($id) {
        $this->db->select('*');
        $this->db->where(field('proId'), $id);
        $this->db->from(table('photo'));
        return $this->db->get();
    }

    public function getPro($id) {
        $this->db->select('*');
        $this->db->from(table('product'));
        $this->db->join(table('group'), table('group') . '.' . field('groId') . '=' . table('product') . '.' . field('groId'));
        $this->db->join(table('category'), table('category') . '.' . field('catId') . '=' . table('group') . '.' . field('catId'));
        $this->db->join(table('language'), table('product') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
        $this->db->where(field('lanDes'), $this->lang->line('lang'));
        $this->db->where(field('proId'), $id);
        return $this->db->get();
    }

    /**
     * Remove photo from database
     * @param int $id
     * @param boolean $removeLocalPhoto True to delete. False will not delete
     * @param string  $photoPathAndName Path of photo and name
     * @return boolean
     */
    public function deleteSinglePhoto($id, $removeLocalPhoto = FALSE, $photoPathAndName = '') {
        $removeLocalPhoto ? unlink($photoPathAndName) : '';
        $this->db->where(field('phoId'), $id);
        if ($this->db->delete(table('photo'))) {
            return TRUE;
        }
        return FALSE;
    }

    public function getProField($id) {
        $data = $this->getPro($id);
        return $this->generateFieldsToHtml($data);
    }

    /**
     * Generate html form. It will request by ajax in edit or add form
     * @param type $data
     * @return string
     */
    public function generateFieldsToHtml($data) {
        $fields = array();
        foreach ($data->result_array() as $row) {
            $fields = unserialize($row[field('proField')]);
        }
        $k = 0;
        $html = '';
        foreach ($fields['label'] as $field) {
            $html .='<input type="hidden" value="' . $fields['label'][$k] . '" name="label[]" />';
            $html .='<label>' . $fields['label'][$k] . ' <input type="text" name="field[]" value="' . $fields['field'][$k] . '"></label>';
            $k++;
        }
        return $html;
    }

}

?>
