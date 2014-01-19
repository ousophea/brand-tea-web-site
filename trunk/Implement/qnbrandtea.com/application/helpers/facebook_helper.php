<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
if (!function_exists('facebook_like')) {
    function facebook_like(){
        $html='';
        $html.='<!--Start Facebook-->
            <div class="fb-like-box" data-href="https://www.facebook.com/pichnilteam" data-height="300" data-width="250" data-show-border="false" data-show-faces="true" data-stream="false" data-header="true"></div>
        ';
        $html.='<script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, \'script\', \'facebook-jssdk\'));</script>';
        return $html;
    }
}
if (!function_exists('facebook_follow')) {
    function facebook_follow(){
         $html='';
        $html.='<!--Start Facebook-->
           <div class="fb-like" data-href="https://www.facebook.com/pichnilteam" data-width="900px" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>';
        $html.='<div id="fb-root"></div>
				<script>(function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0];
				  if (d.getElementById(id)) return;
				  js = d.createElement(s); js.id = id;
				  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
				  fjs.parentNode.insertBefore(js, fjs);
				}(document, \'script\', \'facebook-jssdk\'));</script>';
        return $html;
    }
}