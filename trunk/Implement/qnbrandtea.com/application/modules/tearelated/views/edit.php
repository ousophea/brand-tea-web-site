<form action="<?php echo site_url('tearelated/edit/'.$this->uri->segment(3)); ?>" method="post">
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
foreach ($teas->result_array() as $tea) {
    //$fields = unserialize($cat[field('catField')]);
	 echo form_hidden('hid_tea_name', $tea[field('teaTitle')]); 
?>
<table cellspacing="0" > 
    <tr> 
        <td width="100" valign="middle">
            <label for="tea-1"><?php echo $this->lang->line('tea_name'),$this->lang->line('require'); ?></label>
             <?php echo form_input('txt_tea_title', $this->input->post('txt_tea_title') ? $this->input->post('txt_tea_title') : $tea[field('teaTitle')], 'id="tea-1"'); ?>
        </td>
    </tr>
    <tr> 
        <td width="100" valign="middle">
             <label for="tea-2"><?php echo $this->lang->line('description'); ?></label>
             <?php echo form_textarea('txt_tea_dec', $this->input->post('txt_tea_dec') ? $this->input->post('txt_tea_dec') : $tea[field('teaDesc')], 'id="tea-2"'); ?>          
        </td>
    </tr>
	 <tr> 
        <td width="100" valign="middle">
             <label for="tea-2"><?php echo $this->lang->line('men_status'); ?></label>		 
			 <?php
             $dd_list = array(
			      ''. $tea[field('teaStatus')].'' => ''.$tea[field('teaStatus')].'',
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
</div>
<!--Tab-->
       