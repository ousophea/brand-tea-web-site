<?php

if (!function_exists('loadLang')) {

    function loadLang() {
        $ci = &get_instance();
        if ($ci->input->cookie('language') == 'en') {
            $ci->lang->load('english', 'english');
        } else if ($ci->input->cookie('language') == 'kh') {
            $ci->lang->load('khmer', 'khmer');
        } else if ($ci->input->cookie('language') == 'ch') {
            $ci->lang->load('chiness', 'chiness');
        }
    }

}
loadLang();
