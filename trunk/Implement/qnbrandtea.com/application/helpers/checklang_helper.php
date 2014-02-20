<?php

if (!function_exists('loadLang')) {

    function loadLang() {
        $ci = &get_instance();
        if ($ci->input->cookie('language') == 'en') {
            $ci->lang->load('english', 'english');
            $ci->lang->load('dany_english', 'english');
        } else if ($ci->input->cookie('language') == 'kh') {
            $ci->lang->load('khmer', 'khmer');
            $ci->lang->load('dany_khmer', 'khmer');
        } else if ($ci->input->cookie('language') == 'ch') {
            $ci->lang->load('chiness', 'chiness');
            $ci->lang->load('dany_chiness', 'chiness');
        }
    }

}
loadLang();
