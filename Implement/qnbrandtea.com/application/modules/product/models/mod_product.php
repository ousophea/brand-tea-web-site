<?php

class mod_product extends CI_Model {

    public function addNew($proName, $proPrice, $proQty, $proDec, $proRelated, $groId, $fields, $photos, $relatedKnowledge) {
        $data = array(
            field('proName') => $proName,
            field('proPrice') => $proPrice,
            field('proQty') => $proQty,
            field('proDes') => $proDec,
            field('proField') => $fields,
            field('proRelated') => $proRelated,
            field('groId') => $groId,
            field('proKnowledge') => $relatedKnowledge,
            field('langId') => 1
        );
        if ($this->db->insert(table('product'), $data)) {
            $proId = $this->db->insert_id();
            if ($this->addNewPhoto($proId, $photos['main_photo'], 1) && $this->addNewPhoto($proId, $photos['photo'])) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
        return FALSE;
    }

    public function addNewPhoto($proId, $photos, $mainPhoto = 0) {
        if ($mainPhoto == 1) {
            $this->db->where(field('proId'), $proId);
            $this->db->where(field('isMainPhoto'), 1);
            foreach ($photos as $photo) {
                $data = array(
                    field('phoUrl') => $photo['file_name'],
                );
            }
            $this->db->update(table('photo'), $data);
            @unlink('uploads/products/100x100/' . $this->input->post('hid_main_photo')); // delete file. this code is not good. But sometime it is good
            @unlink('uploads/products/250x250/' . $this->input->post('hid_main_photo'));
            @unlink('uploads/products/500x500/' . $this->input->post('hid_main_photo'));
            @unlink('uploads/products/' . $this->input->post('hid_main_photo'));
        } else {
            foreach ($photos as $photo) {
                $data[] = array(
                    field('phoUrl') => $photo['file_name'],
                    field('proId') => $proId,
                    field('isMainPhoto') => $mainPhoto
                );
            }
//            if (count($photos) > 0)
            return $this->db->insert_batch(table('photo'), $data);
//            else
//                return TRUE;
        }
    }

    public function update($proId, $proName, $proPrice, $proQty, $proDec, $proRelated, $groId, $fields, $photos = '', $relatedKnowledge) {
        print_r($photos['photo']);
        $mainUpdate = FALSE;
        $newPhoto = FALSE;
        if (count($photos['main_photo']) > 0)
            $mainUpdate = TRUE;
        if (count($photos['photo']) > 0)
            $newPhoto = TRUE;

        $data = array(
            field('proName') => $proName,
            field('proPrice') => $proPrice,
            field('proQty') => $proQty,
            field('proDes') => $proDec,
            field('proField') => $fields,
            field('proRelated') => $proRelated,
            field('groId') => $groId,
            field('proKnowledge') => $relatedKnowledge,
            field('langId') => 1
        );
        $this->db->where(field('proId'), $proId);
        if ($this->db->update(table('product'), $data)) {
            if ($mainUpdate) {
                $this->addNewPhoto($proId, $photos['main_photo'], 1);
            }
            if ($newPhoto) {
                $this->addNewPhoto($proId, $photos['photo']);
            }
            return TRUE;
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
            $this->deletePhotoInLocalDir($photos, './uploads/products/100x100/');
            $this->deletePhotoInLocalDir($photos, './uploads/products/250x250/');
            $this->deletePhotoInLocalDir($photos, './uploads/products/500x500/');


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
                @unlink($path . $file[field('phoUrl')]); // delete file
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
        if ($removeLocalPhoto) {
            @unlink('./uploads/products/' . $photoPathAndName);
            @unlink('./uploads/products/100x100/' . $photoPathAndName);
            @unlink('./uploads/products/250x250/' . $photoPathAndName);
            @unlink('./uploads/products/250x250/' . $photoPathAndName);
        }
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

    public function getRelatedKnowledge() {
        $this->db->select('*');
        $this->db->from(table('tearelated'));
        $this->db->join(table('language'), table('tearelated') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
        $this->db->where(field('lanDes'), $this->lang->line('lang'));
        $this->db->order_by("tea_id", "desc");
        return $this->db->get();
    }

    /*
     * Translation
     */

    public function checkLang($proId, $langId) {
        $this->db->select('*');
        $this->db->from(table('proLang'));
        $this->db->where(field('proId'), $proId);
        $this->db->where(field('langId'), $langId);
        return $this->db->get();
    }

    public function translate($id, $lanId, $proName, $proDes, $serielizeFields, $action) {
        $data = array(
            field('proName') => $proName,
            field('proDes') => $proDes,
            field('proField') => $serielizeFields,
            field('proId') => $id,
            field('langId') => $lanId
        );
        if ($action == 'insert') {
            return $this->db->insert(table('proLang'), $data);
        } else if ($action == 'update') {
            return $this->db->update(table('proLang'), $data);
        }
        return FALSE;
    }

}

?>
