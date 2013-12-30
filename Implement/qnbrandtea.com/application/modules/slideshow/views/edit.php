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
	<input type="file" name="image" id="image" /> &nbsp; 
    <!--<input type="submit" name="btnUpload" class="button" id="btn-upload" value="Upload" />-->
</form>
<br><br>