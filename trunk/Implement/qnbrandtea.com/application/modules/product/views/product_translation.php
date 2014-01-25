<?php
echo form_open('product/product_translation/' . $itemId . '/' . $langId);
echo form_hidden('lan_title', $langTitle);
echo form_hidden('item_id',$itemId);
echo form_hidden('lang_id',$langId);

?>
<div class="holder">
    <div class="sub-title"> <h2>Translate to <?php echo $langTitle; ?></h2>
        <?php
        echo validation_errors();
        ?>
    </div>

    <div class="action">
        <?php echo form_submit('save', $this->lang->line('save'), 'class="add"'); ?>
        <?php echo anchor('product', $this->lang->line('cancel'), 'class="button cancel"'); ?>
    </div>
    <div style="clear:both"></div>
</div>
<?php
$pros = unserialize($items);
$action ='insert';
// Check existing data
$this->load->model('product/mod_product');
$langData = $this->mod_product->checkLang($itemId, $langId);

if($langData->num_rows()>0){
    $pros = $langData->result_array();
    $action='update';
}
echo form_hidden('action', $action);
echo form_hidden('pro_data', serialize($pros));
foreach ($pros as $currentPro) {
    if ($currentPro[field('proId')] == $itemId) {
        ?>
        <label for="name"><?php echo $this->lang->line('pro_name'), $this->lang->line('require'); ?></label>
        <?php echo form_input('txt_pro_name', $this->input->post('txt_pro_name') ? $this->input->post('txt_pro_name') : $currentPro[field('proName')], 'id="name"  required'); ?>
        <label for="name-1"><?php echo $this->lang->line('description'); ?></label>
        <?php echo form_textarea('txt_pro_dec', $this->input->post('txt_pro_dec') ? $this->input->post('txt_pro_dec') : $currentPro[field('proDes')], 'id="name-1" class="tinyMCE"'); ?>

        <label for="name-2"><?php echo $this->lang->line('field'); ?></label>
        <div id='fields'>
            <?php
            // Generate HTML
            $fields = unserialize($currentPro[field('proField')]);
            $html = '';
            $k = 0;
            foreach ($fields['label'] as $field) {
                $html .='<input type="hidden" value="' . $fields['label'][$k] . '" name="label[]" />';
                $html .='<label for="feilds-' . $k . '">' . $fields['label'][$k] . '</label> <input id="feilds-' . $k . '" type="text" name="field[]" value="' . $fields['field'][$k] . '">';
                $html.='<input type="hidden" name="hide_show[]" value="' . $fields['hide_show'][$k] . '" />';
                $k++;
            }
            echo $html;
            ?>
        </div>
        <?php
        break;
    }
}
echo form_close();
?>
<script>
    tinymce.init({
        selector: "textarea.tinyMCE",
        theme: "modern",
        external_filemanager_path: '<?php echo base_url(); ?>addon/tinymce/js/tinymce/plugins/filemanager/',
        width: 600,
        height: 300,
        relative_urls: false,
        remove_script_host: false,
        subfolder: "",
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code insertdatetime media nonbreaking",
            "table contextmenu directionality emoticons paste textcolor filemanager fullscreen"
        ],
        image_advtab: true,
        toolbar: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect forecolor backcolor | link unlink anchor | image media | print preview code fullscreen"
    });
</script>