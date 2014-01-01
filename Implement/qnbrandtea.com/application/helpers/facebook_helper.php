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