<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
<div class="holder">
    <div class="sub-title red">
        <?php echo isset($error) ? $error : ''; ?>
    </div>

    <div class="action">
        <?php echo form_submit('btnUpload', $this->lang->line('save'), 'class="add"'); ?>
        <?php echo anchor('admin/slideshow',$this->lang->line('cancel'), 'class="button cancel"');?>
    </div>
    <div style="clear:both"></div>
</div>
	<input type="file" name="image" id="image" /> &nbsp; 
    <!--<input type="submit" name="btnUpload" class="button" id="btn-upload" value="Upload" />-->
</form>
<br><br>