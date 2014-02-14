<?php 
echo form_open('slideshow/slideshow_translation/' . $itemId . '/' . $langId);
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
        <?php echo anchor('slideshow', $this->lang->line('cancel'), 'class="button cancel"'); ?>
    </div>
    <div style="clear:both"></div>
</div>
<?php
$slideshows = unserialize($items);
$action ='insert';
// Check existing data
$this->load->model('slideshow/mod_slideshow');
$langData = $this->mod_slideshow->checkLang($itemId, $langId);
if($langData->num_rows()>0){
    $slideshows = $langData->result_array();
    $action='update';
}
echo form_hidden('action', $action);
foreach ($slideshows as $slideshow):
    if ($slideshow[field('sliId')] == $itemId):
?>
<div class="holder">
        <textarea name="description" id="description" rows="10"><?php echo $slideshow[field('sliDes')]; ?></textarea>
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
    plugins: [
        "advlist autolink lists link image charmap preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
</script>