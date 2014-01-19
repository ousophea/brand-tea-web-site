
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<div class="holder">
    <div class="sub-title">
        <?php
            echo validation_errors();
        ?>
    </div>
    <div class="action">
        <?php echo form_submit('update', $this->lang->line('update'), 'class="add"'); ?>
        <?php echo anchor('about/listabout',$this->lang->line('cancel'), 'class="button cancel"');?>
    </div>
    <div style="clear:both"></div>
</div>
 <!--<ul class='tabs'>
			<li><a href='#tab2'>English</a></li>
</ul>-->
<?php
foreach ($about->result_array() as $abo) {
    //$fields = unserialize($cat[field('catField')]);
	 echo form_hidden('hid_desc', $abo[field('aboDesc')]); 
?>
<table cellspacing="0"> 
    <tr> 
        <td width="100" valign="middle">
             <label for="tea-2"><?php echo $this->lang->line('men_about'); ?></label>
             <?php echo form_textarea('txt_about', $this->input->post('txt_about') ? $this->input->post('txt_about') : $abo[field('aboDesc')], 'id="tea-2"'); ?>          
        </td>
    </tr>
	<tr> 
        <td width="100" valign="middle">
             <label for="tea-2"><?php echo $this->lang->line('men_abo_status'); ?></label>		 
			 <?php
             $dd_list = array(
			      ''. $abo[field('aboStatus')].'' => ''.$abo[field('aboStatus')].'',
                  '1'   => 'Active',
                  '0'   => 'Inactive'
                );
             echo form_dropdown('dd_status', $dd_list, '2');   
			?>          
        </td>
    </tr>
</table>
<?php } ?>
</form>
<!--tynimce-->
	<script type="text/javascript">
	tinymce.init({
		selector: "textarea",
		width: 850,
        height: 300,
		plugins: [
			"advlist autolink lists link image charmap preview anchor",
			"searchreplace visualblocks code fullscreen",
			"insertdatetime media table contextmenu paste"
		],
		toolbar: "insertfile undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
	});
	</script>
