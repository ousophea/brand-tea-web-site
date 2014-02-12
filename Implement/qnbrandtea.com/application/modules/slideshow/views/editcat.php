<form action="<?php echo $_SERVER['PHP_SELF']; ?>" onSubmit="checkSubmit();" method="post">
<div class="holder">
    <div class="sub-title red">
        <p><?php echo $this->session->userdata('ms')?$this->session->userdata('ms'):''; $this->session->unset_userdata('ms');?></p>
    </div>
    
    <div class="action">
        <?php echo form_submit('btnSave', $this->lang->line('save'), 'class="edit"'); ?>
        <?php echo anchor('slideshow/category',$this->lang->line('cancel'), 'class="button cancel"');?>
    </div>
    <div style="clear:both"></div>
</div>
	<?php echo $this->lang->line('name'); ?>: <input type="text" name="name" id="name" value="<?php echo $category->row()->sli_cat_name?>" /> <?php echo $this->lang->line('require'); ?>
</form>
<br><br>
<script type="text/javascript">
function checkSubmit(){
	if($('#name').val() == ""){
		alert("<?php echo $this->lang->line('ms_require'); ?>");	
		return false;
	}
}
</script>