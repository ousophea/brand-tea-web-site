<?php 
echo form_open('content/services/services_translation/' . $itemId . '/' . $langId);
echo form_hidden('lan_title', $langTitle);
echo form_hidden('lang_id',$langId);
?>
<div class="holder">
    <div class="sub-title"><h2>Translate to <?php echo $langTitle; ?></h2>
         <?php
            echo validation_errors();
        ?>
    </div>

    <div class="action">
        <?php echo form_submit('save', $this->lang->line('save'), 'class="add"'); ?>
        <?php echo anchor('content/services', $this->lang->line('cancel'), 'class="button cancel"'); ?>
    </div>
    <div style="clear:both"></div>
</div>
<?php
$services = unserialize($items);
$action ='insert';
// Check existing data
$this->load->model('content/mod_content');
$langData = $this->mod_content->checkLang($itemId, $langId);
if($langData->num_rows()>0){
    $services = $langData->result_array();
    $action='update';
}
echo form_hidden('action', $action);
foreach ($services as $service):
    if ($service[field('conId')] == $itemId):
?>
<div class="holder">
    <h3><?php echo $this->lang->line('title'); ?>: <input type="text" name="txt_name" placeholder="Page Title" value="<?php echo $service[field('conName')]; ?>" required /> <?php echo $this->lang->line('require'); ?></h3>
    <p><textarea name="txt_description" rows="10" required ><?php echo $service[field('conDes')]; ?></textarea></p>
    <br>
</div>
<?php 
	endif;
endforeach;
?>
<?php echo form_close(); ?>
<script type="text/javascript">
tinymce.init({
    selector: "textarea",
	external_filemanager_path:'<?php echo base_url(); ?>addon/tinymce/js/tinymce/plugins/filemanager/',
	relative_urls: false,
	remove_script_host: false,
    plugins: [
        "advlist autolink lists link image charmap preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste filemanager"
    ],
    toolbar: "insertfile undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>