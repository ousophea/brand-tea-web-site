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
//        $this->db->join(table('language'), table('tearelated') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
//        $this->db->where(field('lanDes'), $this->lang->line('lang'));

        if ($this->input->cookie('language')) {
            $this->db->join(table('teaLang'), table('teaLang') . '.' . field('teaId') . '=' . table('tearelated') . '.' . field('teaId'));
            $this->db->join(table('language'), table('teaLang') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
            $this->db->where(field('lanDes'), $this->input->cookie('language'));
            $this->db->where(table('teaLang').'.'.field('teaStatus'), 1);
            $this->db->ORDER_BY(table('teaLang').'.'.field('teaId'), 'DESC');
        }

        $data = $this->db->get();

        if ($data->num_rows() > 0) {
            return $data;
        } else {
            return $this->getEntea($start, $perPage);
        }
        return $this->db->get();
    }

    /**
     * Get English Product
     */
    public function getEntea($start, $perPage) {
        $this->db->select('*');
        $this->db->limit($perPage, $start);
        $this->db->from(table('tearelated'));
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
        if ($this->input->cookie('language')) {
            $this->db->join(table('teaLang'), table('teaLang') . '.' . field('teaId') . '=' . table('tearelated') . '.' . field('teaId'));
            $this->db->join(table('language'), table('teaLang') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
            $this->db->where(field('lanDes'), $this->input->cookie('language'));
        }   
        $this->db->where(table('tearelated').'.'.field('teaId'), $id);
        $data =$this->db->get();
            if ($data->num_rows() > 0) {
            return $data;
        } else {
            return $this->TeaDetails($id);
        }
    }
   public function TeaDetails($id) {
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
//        $this->db->join(table('language'), table('tearelated') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
//        $this->db->where(field('lanDes'), $this->lang->line('lang'));
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
