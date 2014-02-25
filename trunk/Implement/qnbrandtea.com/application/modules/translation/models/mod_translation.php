<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of mod_translation
 *
 * @author who
 */
class mod_translation extends CI_Model{
    
    public function getLanguages(){
        $this->db->select('*');
        $this->db->from(table('language'));
        $this->db->order_by(field('langName'),'ASC');
        $this->db->where(field('lanDes').' !=','en');
        return $this->db->get();
    }
    
    public function checkLange($table, $where, $itemId){
        $this->db->select(field('lanDes'))
                ->from(table('language'))
                ->join($table, $table.'.'.field('langId').'='.table('language').'.'.field('langId'))
                ->where($table.'.'.$where,$itemId)
                ->order_by(table('language').'.'.field('langId'));
        return $this->db->get();
    }
    
    public function generateHtml($table, $where, $itemId){
        $html= img('media/icon/en.png');
        $data = $this->checkLange($table, $where, $itemId);
        if($data->num_rows()>0){
            foreach($data->result_array() as $row){
                $html.=' '.img('media/icon/'.$row[field('lanDes')].'.png');
            }
        }
        return $html;
    }
}

?>
