<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Tea class. This is a class that is details about how to view all tea, details tea, and everything related to tea to front page,
 * @author Thary <thary.sat@gmail.com>
 */
class Mod_service_front extends CI_Model {

    /**
     * Get front-end tea knowledge
     * @param int $start
     * @param int $perPage
     * @return CI database object
     */
    public function getService($start, $perPage) {
        $this->db->select('*');
        $this->db->limit($perPage, $start);
        $this->db->from(table('service'));

        if ($this->input->cookie('language')) {
            $this->db->join(table('serLang'), table('serLang') . '.' . field('serId') . '=' . table('service') . '.' . field('serId'));
            $this->db->join(table('language'), table('serLang') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
            $this->db->where(field('lanDes'), $this->input->cookie('language'));
            $this->db->where(table('serLang').'.'.field('serStatus'), 1);
            $this->db->ORDER_BY(table('serLang').'.'.field('serId'), 'DESC');
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
     * Get English Service
     */
    public function getEntea($start, $perPage) {
        $this->db->select('*');
        $this->db->limit($perPage, $start);
        $this->db->from(table('service'));
        $this->db->where(field('serStatus'), 1);
        $this->db->ORDER_BY(field('serId'), 'DESC');
        return $this->db->get();
    }

    /**
     * Get one tea knowledge details
     * @param int $id
     * @return CI database object
     */
//    public function getTeaDetails($id) {
//        $this->db->select('*');
//        $this->db->from(table('service'));       
//        if ($this->input->cookie('language')) {
//            $this->db->join(table('serLang'), table('serLang') . '.' . field('serId') . '=' . table('service') . '.' . field('serId'));
//            $this->db->join(table('language'), table('serLang') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
//            $this->db->where(field('lanDes'), $this->input->cookie('language'));
//        }   
//        $this->db->where(table('service').'.'.field('serId'), $id);
//        $data =$this->db->get();
//        if ($data->num_rows() > 0) {
//            return $data;
//        } else {
//            return $this->TeaDetails($id);
//        }
//    }
   public function getServiceDetails($id) {
        $this->db->select('*');
        $this->db->from(table('service')); 
        $this->db->join(table('language'), table('service') . '.' . field('langId') . '=' . table('language') . '.' . field('langId'));
        $this->db->where(field('lanDes'), $this->lang->line('lang'));
        $this->db->where(field('serId'), $id);
        return $this->db->get();
   }
    /**
     * Get all Tea Knowledge
     * @return CI database object
     */
    public function getAllService() {
        $this->db->select('*');
        $this->db->from(table('service'));
        $this->db->where(field('serStatus'), 1);
        $result = $this->db->get();
        return  $result->num_rows();
    }

        public function getTeaInfo($limit) {
        $this->db->select('*');
        $this->db->limit($limit);
        $this->db->from(table('tearelated'));
        $this->db->where(field('teaStatus'), 1);
        $this->db->ORDER_BY(field('teaId'), 'DESC');
        return $this->db->get();
    }
    
    /**
     * Get all amount of Tea Knowledge
     * @return int
     */
    public function getAllServiceNum() {
        return $this->getAllTeas()->num_rows();
    }

}
