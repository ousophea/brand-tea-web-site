<?php
$pro_to_shop ="";
if (!function_exists('loadLang')) {

    function loadLang() {
        $ci = &get_instance();
        if ($ci->input->cookie('language') == 'en') {
            $ci->lang->load('english', 'english');
           $pro_to_shop= getMn(1,9); //khmer lanquage and menu 1

        } else if ($ci->input->cookie('language') == 'kh') {
            $ci->lang->load('khmer', 'khmer');
        } else if ($ci->input->cookie('language') == 'ch') {
            $ci->lang->load('chiness', 'chiness');
        }
    }

}
loadLang();


//=========Get data from database========
    function getMn($mn_id =Null){
        
         $ci = &get_instance();
        if ($ci->input->cookie('language') == 'en') {
           $mnl_id = 1;
        } else if ($ci->input->cookie('language') == 'kh') {
           $mnl_id = 2;
        } else if ($ci->input->cookie('language') == 'ch') {
          $mnl_id= 3;
        }else{
            $mnl_id= 1;
        }
        
         $ci->db->select('*');
        $ci->db->from('menu_detail');
          $ci->db->where('md_men_id',$mn_id);
          $ci->db->where('md_lan_id',$mnl_id);
        $data_mn =  $ci->db->get();
        $mn_data = "";
         foreach ($data_mn->result_array() as $men) {
                $mn_data = $men['md_title'];
            }
        return $mn_data;
    }

