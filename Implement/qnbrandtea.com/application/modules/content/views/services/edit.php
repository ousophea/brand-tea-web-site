<form action="<?php echo site_url('content/services/edit'); ?>" method="post">
<input type="hidden" name="txt_id" value="<?php echo $services->row()->cont_id; ?>" />
<div class="holder">
    <div class="sub-title red">
        <?php 
			echo $this->session->userdata('ms')?$this->session->userdata('ms'):''; $this->session->unset_userdata('ms');
			echo validation_errors();
		?>
    </div>

    <div class="action">
        <?php echo form_submit('btnSave', $this->lang->line('save'), 'class="add"'); ?>
        <?php echo anchor('content/services',$this->lang->line('cancel'), 'class="button cancel"');?>
    </div>
    <div style="clear:both"></div>
</div>
<div class="holder">
    <h3><?php echo $this->lang->line('title'); ?>: <input type="text" name="txt_name" placeholder="Page Title" value="<?php echo $services->row()->cont_name; ?>" required /> <?php echo $this->lang->line('require'); ?></h3>
    <p><textarea name="txt_description" placeholder="Description" rows="10" required ><?php echo $services->row()->cont_description; ?></textarea></p>
    <br>
</div>
</form>
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