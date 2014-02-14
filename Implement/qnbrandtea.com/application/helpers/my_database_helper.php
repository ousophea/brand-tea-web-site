<?php

/*
 * This file is create for storing name of table, and field.
 * 
 */

if (!function_exists('table')) {

    function table($key) {
        // Tables' name
        $table['user'] = 'users';
        $table['product'] = 'products';
        $table['usergroup'] = 'usergroup';
        $table['content'] = 'contents';
        $table['menu'] = 'menus';
        $table['group'] = 'groups';
        $table['category'] = 'categories';
        $table['language'] = 'languages';
        $table['photo'] = 'photos';
        $table['slideshow'] = 'slideshow';
        $table['sli_category'] = 'sli_categories';
        $table['tearelated'] = 'tearelated';
        $table['proLang'] = 'product_languages';
        $table['catLang'] = 'category_languages';
        $table['groLang'] = 'group_languages';
        $table['conLang'] = 'content_languages';
        $table['about'] = 'about';
        $table['contact'] = 'contact';
        if (array_key_exists($key, $table)) {
            return $table[$key];
        } else {
            return NULL;
        }
    }

}

if (!function_exists('field')) {

    function field($key) {
        // Fields' name
        $field['useId'] = 'use_id';
        $field['useName'] = 'use_name';
        $field['usePassword'] = 'use_password';
        $field['useDateCreate'] = 'use_date_create';

        $field['usgId'] = 'usg_id';
        $field['usgName'] = 'usg_name';
        $field['usgDes'] = 'usg_description';

        $field['proId'] = 'pro_id';
        $field['proName'] = 'pro_name';
        $field['proPrice'] = 'pro_price';
        $field['proQty'] = 'pro_qty';
        $field['proDes'] = 'pro_des';
        $field['proField'] = 'pro_fields';
        $field['proRelated'] = 'pro_related';
        $field['proKnowledge'] = 'pro_knowledge_related';


        $field['menId'] = 'men_id';
        $field['menName'] = 'men_name';
        $field['menOrder'] = 'men_order';

        $field['langId'] = 'lang_id';
        $field['langName'] = 'lang_name';
        $field['lanDes'] = 'lang_description';

        $field['groId'] = 'gro_id';
        $field['groName'] = 'gro_name';
        $field['groDes'] = 'gro_description';

        $field['conId'] = 'cont_id';
        $field['conName'] = 'cont_name';
        $field['conDes'] = 'cont_description';

        $field['catId'] = 'cate_id';
        $field['catName'] = 'cate_name';
        $field['catDes'] = 'cate_description';
        $field['catField'] = 'cate_fields';

        $field['phoId'] = 'pho_id';
        $field['phoUrl'] = 'pho_url';
        $field['phoDes'] = 'pho_des';
        $field['isMainPhoto'] = 'pho_is_main_photo';

        $field['sliId'] = 'sli_id';
        $field['sliImage'] = 'sli_image';
        $field['sliCatId'] = 'sli_cat_id';
        $field['sliDes'] = 'sli_description';
        //Tea


        $field['sliCatId'] = 'sli_cat_id';
        $field['sliCatName'] = 'sli_cat_name';


        $field['teaId'] = 'tea_id';
        $field['teaTitle'] = 'tea_title';
        $field['teaDesc'] = 'tea_description';
        $field['teaStatus'] = 'tea_status';
        //About
        $field['aboId'] = 'abo_id';
        $field['aboDesc'] = 'abo_description';
        $field['aboStatus'] = 'abo_status';

        //$field['aboId'] = 'abo_id';
        //$field['aboDesc'] = 'abo_description';
        //$field['aboStatus'] = 'abo_status';

        $field['prlId'] = 'prl_id';


        $field['calId'] = 'cal_id';
        $field['grlId'] = 'grl_id';

      
		//Contact
		$field['contactId']='con_id';
		$field['contactDesc'] ='con_description';
		$field['contactStatus']='con_status';
        if (array_key_exists($key, $field)) {
            return $field[$key];
        } else {
            return NULL;
        }
    }

}