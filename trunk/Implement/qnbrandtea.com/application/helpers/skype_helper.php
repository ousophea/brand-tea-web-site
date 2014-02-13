<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
if (!function_exists('skype_helper')) {

    function skype_helper() {
        $html = '';
        $html.='
            <script type="text/javascript" src="http://www.skypeassets.com/i/scom/js/skype-uri.js"></script>
            <div id="SkypeButton_Call_CHHAYVandyrichat_1">
              <script type="text/javascript">
                Skype.ui({
                  "name": "dropdown",
                  "element": "SkypeButton_Call_CHHAYVandyrichat_1",
                  "participants": ["CHHAYVandyrichat"],
                  "imageSize": 32
                });
  </script>
</div>
           ';
        return $html;
    }

}
