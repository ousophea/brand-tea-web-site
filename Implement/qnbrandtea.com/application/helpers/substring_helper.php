<?php

function subString($str =NULL, $limit =NULL){
    $result='';
     $CI = &get_instance();
     
    $lan = $CI->input->cookie('language');
    if($lan == 'kh'){
        $limit = $limit * 4;
    }
    if(strlen($str)> $limit){
        $result =substr($str,0,$limit).'...';
    }else{
        return $str;
    }
    return $result;
}
//=========Get data from database========
//    function getMn($mnl_id=NULL, $mn_id =Null){
//         $ci = &get_instance();
//         $ci->db->select('*');
//        $ci->db->from('menu_detail');
//          $ci->db->where('md_men_id',$mn_id);
//          $ci->db->where('md_lan_id',$mnl_id);
//        $data_mn =  $ci->db->get();
//        $mn_data = "";
//         foreach ($data_mn->result_array() as $men) {
//                $mn_data = $men['md_title'];
//            }
//        return $mn_data;
//    }
//    $lang['product_to_shop'] = getMn(1,9); //khmer lanquage and menu 1