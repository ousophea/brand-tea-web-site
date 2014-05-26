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