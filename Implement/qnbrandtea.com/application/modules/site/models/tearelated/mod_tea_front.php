<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/**
 * Tea class. This is a class that is details about how to view all tea, details tea, and everything related to tea to front page,
 * @author Thary <thary.sat@gmail.com>
 */
class Mod_tea_front extends CI_Model {

    /**
     * Get front-end tea knowledge
     * @param int $start
     * @param int $perPage
     * @return CI database object
     */
    public function getTea($start, $perPage) {
        $this->db->select('*');
        $this->db->limit($perPage, $start);
        $this->db->from(table('tearelated'));   
		$this->db->join(table('language'), table('tearelated') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
        $this->db->where(field('lanDes'), $this->lang->line('lang'));
		$this->db->where(field('teaStatus'), 1);
        $this->db->ORDER_BY(field('teaId'), 'DESC');	
        return $this->db->get();
    }
    /**
     * Get one tea knowledge details
     * @param int $id
     * @return CI database object
     */
    public function getTeaDetails($id) {
        $this->db->select('*');
        $this->db->from(table('tearelated'));
		$this->db->join(table('language'), table('tearelated') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
        $this->db->where(field('lanDes'), $this->lang->line('lang'));
        $this->db->where(field('teaId'), $id);
        return $this->db->get();
    }
    /**
     * Get all Tea Knowledge
     * @return CI database object
     */
    public function getAllTeas() {
        $this->db->select('*');
        $this->db->from(table('tearelated'));
		$this->db->join(table('language'), table('tearelated') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
        $this->db->where(field('lanDes'), $this->lang->line('lang'));
		$this->db->where(field('teaStatus'), 1);
        return $this->db->get();
    }
    /**
     * Get all amount of Tea Knowledge
     * @return int
     */
    public function getAllTeaNum() {
        return $this->getAllTeas()->num_rows();
    }

}
