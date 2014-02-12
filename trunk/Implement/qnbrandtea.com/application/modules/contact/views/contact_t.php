<?php
echo form_hidden('lan_title', $langTitle);
echo form_hidden('pro_id',$itemId);
echo form_hidden('lang_id',$langId);
$cats = unserialize($items);
echo $cats;
?>
