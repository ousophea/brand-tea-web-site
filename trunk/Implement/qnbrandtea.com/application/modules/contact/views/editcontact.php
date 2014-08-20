<?php echo form_open($this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . $this->uri->segment(3)); ?>
<!--<form action="<?php // echo $_SERVER['PHP_SELF']; ?>" method="post">-->
<div class="holder">
    <div class="sub-title">
        <?php
            echo validation_errors();
        ?>
    </div>
    <div class="action">
        <?php echo form_submit('update', $this->lang->line('update'), 'class="add"'); ?>
        <?php echo anchor('contact/listcontact',$this->lang->line('cancel'), 'class="button cancel"');?>
    </div>
    <div style="clear:both"></div>
</div>
<?php
foreach ($contact->result_array() as $con) {
    //$fields = unserialize($cat[field('catField')]);
	 echo form_hidden('hid_desc', $con[field('conDes')]); 
?>
<table cellspacing="0"> 
    <tr> 
        <td width="100" valign="middle">
             <label for="tea-2"><?php echo $this->lang->line('men_contact'); ?></label>
             <?php echo form_textarea('txt_contact', $this->input->post('txt_contact') ? $this->input->post('txt_contact') : $con[field('conDes')]); ?>          
        </td>
    </tr>
</table>
<?php } ?>
<!--</form>-->
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