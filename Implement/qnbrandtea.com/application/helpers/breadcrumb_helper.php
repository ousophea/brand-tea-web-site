<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
  Document   : breadcrumbs_helper
  Created on : Apr 24, 2013, 9:45:24 AM
  Author     : mario
  Description: metodo criado para gerar breadcrumbs
 */

function simpleway($ignore_segment = array(), $list = FALSE, $attrs = array()) {
    /*
     * Recebe o caminho do controller, dá um exeplode para trasnformar em 
     * array.
     */

    $ignore_segment = (!is_array($ignore_segment)) ? array($ignore_segment) : $ignore_segment;

    $ci = &get_instance();

    $crumb = $ci->uri->segment_array();

    $result = $ci->uri->total_segments();


    /*
     * coloca as primeiras letras de cada palavra em maiusculo e gera um 
     * link.
     */
    $cound_link = count($crumb);

    $url_crumb = array(anchor('site/home', ucfirst($ci->lang->line('home'))));

    $content_url = "";
    $i = 1;

    foreach ($crumb as $key => $c):
        // pega o tamanho do array.
        if ($i < 3) {
            $content_url .= "/" . $c;
        }
        /*
         * se o array for menor ou igual a 1, entende que ele está no
         * controller raiz, e será linkado para o mesmo.
         */

        if (!in_array($key, $ignore_segment)) {

            if ($result <= 1) {
                $url_crumb[] = anchor('', ucfirst($c)); //'<a href="">'.ucfirst($c).'</a>';
            } else {
                if ($c != 'home') {
                    if ($c == 'detail') {
                        $url_crumb[] = "Detail";//// When cuse log to detail
                    } else {
                        $url_crumb[] = anchor($content_url, ucfirst(str_replace(array('_', '-'), ' ', $ci->lang->line(strtolower($c)))));
                    }
                }
            }
        }
        $i++;


    endforeach;
    // da um implode adicionando '>' entre as palavras.
    $fim = implode(' > ', $url_crumb);

    if ($list)
        $fim = ul($url_crumb, $attrs);

    if (!empty($fim))
        return $fim;
}
