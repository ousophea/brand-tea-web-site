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
        $this->db->from(table('content'));
        $this->db->join(table('language'), table('content') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
        $this->db->where(field('lanDes'), $this->lang->line('lang'))
                ->where(field('conId'), 2);
        return $this->db->get();
    }

}
