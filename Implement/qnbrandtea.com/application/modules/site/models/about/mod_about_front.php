<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 * Tea class. This is a class that is details about us
 * @author Thary <thary.sat@gmail.com>
 */
class Mod_about_front extends CI_Model {

    /**
     * Get front-end about us
     * @return CI database object
     */
    public function getAbout() {
        $this->db->select('*');
        $this->db->from(table('about'));   
		$this->db->join(table('language'), table('about') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
        $this->db->where(field('lanDes'), $this->lang->line('lang'));
		$this->db->where(field('aboStatus'), 1);	
        return $this->db->get();
    }

}
