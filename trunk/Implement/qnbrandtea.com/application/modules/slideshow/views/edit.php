<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
<div class="holder">
    <div class="sub-title red">
        <?php echo $this->session->userdata('ms')?$this->session->userdata('ms'):''; $this->session->unset_userdata('ms');?>
    </div>

    <div class="action">
        <?php echo form_submit('btnUpload', $this->lang->line('save'), 'class="add"'); ?>
        <?php echo anchor('slideshow',$this->lang->line('cancel'), 'class="button cancel"');?>
    </div>
    <div style="clear:both"></div>
</div>
	<?php echo $this->lang->line('image'); ?>: <input type="file" name="image" id="image" /> <br><br>
    <textarea name="description" class="tinyMCE" rows="10"><?php echo $slideshow->row()->sli_description; ?></textarea>
</form>
<br><br>