<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
if (!function_exists('map_helper')) {
    function map_helper(){
        $html='';
//        $html.='<iframe width="900" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com.kh/maps?t=m&amp;q=Pichnil&amp;cid=0xacfe4c5bdfd2dc84&amp;ie=UTF8&amp;ll=11.555591,104.885563&amp;spn=0.004205,0.010203&amp;z=17&amp;iwloc=A&amp;output=embed"></iframe><br />
//     ';
         $html.='<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script><div style="overflow:hidden;height:500px;width:900px;"><div id="gmap_canvas" style="height:500px;width:900px;"></div><a class="google-map-code" href="http://wordpress-themes.org" id="get-map-data">http://wordpress-themes.org</a><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div><script type="text/javascript"> function init_map(){var myOptions = {zoom:16,center:new google.maps.LatLng(11.544528150044776,104.92205894075323),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(11.544528150044776, 104.92205894075323)});infowindow = new google.maps.InfoWindow({content:"<b>QN Brandtea</b><br/>Preah Monivong Blvd,<br/>855 Phnom Penh" });google.maps.event.addListener(marker, "click", function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, "load", init_map);</script><br />';
         return $html;
    }
}
