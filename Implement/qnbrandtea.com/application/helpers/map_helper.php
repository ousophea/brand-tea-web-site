<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
if (!function_exists('map_helper')) {
    function map_helper(){
        $html='';
        $html.='
            <iframe width="900" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com.kh/maps?t=m&amp;q=Pichnil&amp;cid=0xacfe4c5bdfd2dc84&amp;ie=UTF8&amp;ll=11.555591,104.885563&amp;spn=0.004205,0.010203&amp;z=17&amp;iwloc=A&amp;output=embed"></iframe><br />
           ';
        return $html;
    }
}
