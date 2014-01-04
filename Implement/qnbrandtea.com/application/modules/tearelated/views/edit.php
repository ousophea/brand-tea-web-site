<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<div class="holder">
    <div class="sub-title">
        <?php
            echo validation_errors();
        ?>
    </div>
    <div class="action">
        <?php echo form_submit('update', $this->lang->line('update'),'class="add"'); ?>
        <?php echo anchor('tearelated',$this->lang->line('cancel'), 'class="button cancel"');?>
    </div>
    <div style="clear:both"></div>
</div>
<?php
foreach ($tea->result_array() as $teas) {
    //$fields = unserialize($cat[field('catField')]);
	 echo form_hidden('hid_tea_name', $teas[field('teaTitle')]);
    
?>
<table cellspacing="0" style="width:624px"> 
    <tr> 
        <td width="100" valign="middle">
            <label for="tea-1"><?php echo $this->lang->line('tea_name'),$this->lang->line('require'); ?></label>
             <?php echo form_input('txt_tea_title', $this->input->post('txt_tea_title') ? $this->input->post('txt_tea_title') : $teas[field('teaTitle')], 'id="tea-1"'); ?>
        </td>
    </tr>
    <tr> 
        <td width="100" valign="middle">
             <label for="tea-2"><?php echo $this->lang->line('description'); ?></label>
             <?php echo form_textarea('txt_tea_dec', $this->input->post('txt_tea_dec') ? $this->input->post('txt_tea_dec') : $teas[field('teaDesc')], 'id="tea-2"'); ?>          
        </td>
    </tr>
</table>
<?php } ?>
</form>
<!--<div id='tab3'>
<table cellspacing="0" style="width:624px"> 
    <tr> 
        <td width="100" valign="middle">
            <label for="tea-1"><?php //echo $this->lang->line('tea_name'),$this->lang->line('require'); ?></label>
             <?php //echo form_input('txt_tea_title_ch', $this->input->post('txt_tea_title_ch') ? $this->input->post('txt_tea_title_ch') : '', 'id="tea-1"'); ?>
        </td>
    </tr>
    <tr> 
        <td width="100" valign="middle">
             <label for="tea-2"><?php //echo $this->lang->line('description'); ?></label>
             <?php //echo form_textarea('txt_tea_dec_ch', $this->input->post('txt_tea_dec_ch') ? $this->input->post('txt_tea_dec_ch') : '', 'id="tea-2"'); ?>     
        </td>
    </tr>
</table>
</div>-->
<!--tynimce-->
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
</div>
<!--Tab-->
       