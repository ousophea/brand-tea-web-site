<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 * Tea class. This is a class that is details contact us
 * @author Thary <thary.sat@gmail.com>
 */
class Mod_contact_front extends CI_Model {

    /**
     * Get front-end contact us
     * @return CI database object
     */
    public function getContact() {
        $this->db->select('*');
        $this->db->from(table('contact'));   
		$this->db->join(table('language'), table('contact') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
        $this->db->where(field('lanDes'), $this->lang->line('lang'));
		$this->db->where(field('conStatus'), 1);	
        return $this->db->get();
    }

}
