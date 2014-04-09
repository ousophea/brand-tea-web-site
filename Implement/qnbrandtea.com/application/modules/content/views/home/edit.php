<form action="<?php echo site_url('content/home/edit'); ?>" method="post">
<input type="hidden" name="txt_id" value="<?php echo $home->row()->cont_id; ?>" />
<div class="holder">
    <div class="sub-title red">
        <?php 
			echo $this->session->userdata('ms')?$this->session->userdata('ms'):''; $this->session->unset_userdata('ms');
			echo validation_errors();
		?>
    </div>

    <div class="action">
        <?php echo form_submit('btnSave', $this->lang->line('save'), 'class="add"'); ?>
        <?php echo anchor('content/home',$this->lang->line('cancel'), 'class="button cancel"');?>
    </div>
    <div style="clear:both"></div>
</div>
<div class="holder">
    <h3><?php echo $this->lang->line('title'); ?>: <input type="text" name="txt_name" placeholder="Page Title" value="<?php echo $home->row()->cont_name; ?>" required /> <?php echo $this->lang->line('require'); ?></h3>
    <p><textarea name="txt_description" placeholder="Description" rows="10" required ><?php echo $home->row()->cont_description; ?></textarea></p>
    <br>
</div>
</form>

<div class="holder" style="padding:0px 12px 12px 12px;">
    <p style="text-align:right;"><?php echo form_button('btnCrop', 'crop', 'class="add" onclick="crop()"'); ?></p>
    <form id="upload-frm" action="<?php echo base_url() . 'content/home/uploadimage'; ?>" method="post">
        <div id="img-preview" style="max-height:300px;overflow:auto;"><img src="<?php echo base_url() . SLIDESHOW_IMAGE_PATH; ?>tea-banner.jpg" width="100%" alt=""></div><br>
        <div id='imageloadstatus' style='display:none;'><img src="<?php echo base_url() . BACKEND_TEMPLATE; ?>img/loader.gif" alt="Uploading...."/></div>
        <div id='imageloadbutton'>
        <?php echo $this->lang->line('image'); ?>: <input type="file" name="image" id="image" /> 
        </div>
	</form>
    <form id="edit-frm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="hidden" id="x" name="x" />
        <input type="hidden" id="y" name="y" />
        <input type="hidden" id="w" name="w" />
        <input type="hidden" id="h" name="h" />
        <input type="hidden" id="image_crop" name="image_crop" />
        <input type="hidden" name="oldimage" id="oldimage" value=""/>
    </form>
</div>
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



jQuery(document).ready(function() { 
		
	jQuery('#image').die('click').live('change', function(){ 
		jQuery("#img-preview").html('');	
		jQuery("#upload-frm").ajaxForm({target: '#img-preview', 
			beforeSubmit:function(){ 
				//console.log('ttest');
				jQuery("#imageloadstatus").show();
				jQuery("#imageloadbutton").hide();
			}, 
			success:function(){ 
				//console.log('test');
				jQuery("#imageloadstatus").hide();
				jQuery("#imageloadbutton").show();
			}, 
			error:function(){ 
				//console.log('xtest');
				jQuery("#imageloadstatus").hide();
				jQuery("#imageloadbutton").show();
			} 
		}).submit();
	});
});


jQuery(function(){
	crop_image();
});
  
function crop_image(){
	jQuery('#cropbox').Jcrop({
		aspectRatio: 5,
		onSelect: updateCoords
	});
}

function updateCoords(c)
{
	jQuery('#x').val(c.x);
	jQuery('#y').val(c.y);
	jQuery('#w').val(c.w);
	jQuery('#h').val(c.h);
	jQuery('#image_crop').val(jQuery('#image').val());
};

function crop(){
	var image = jQuery('#image_crop').val();
	image = image ? image : '';
	var newImage = jQuery('#image').val();
	var x = jQuery('#x').val();
	var y = jQuery('#y').val();
	var w = jQuery('#w').val();
	var h = jQuery('#h').val();
	
	if(image != newImage || image == '' || w == ''){
    	alert('Please select a crop region then press submit.');
		return false;
	}
	
	jQuery(function(){
		jQuery('#img-preview').html('<img src="<?php echo base_url() . BACKEND_TEMPLATE; ?>img/loader.gif" alt="Loading...."/>');
		jQuery.ajax({
			type : "POST",
			url : "<?php echo base_url() . 'content/home/cropimage'; ?>",
			data:"x="+x+ "&y="+y+"&w="+w+"&h="+h+"&image="+image,
			dataType:"json",
			success:function(data){
				var img = '<img src="<?php echo base_url() . SLIDESHOW_IMAGE_PATH; ?>'+data.image+'" id="cropbox" style="width:100%" />';
                jQuery("#img-preview").html(img);
				jQuery('#oldimage').val(data.image);
				jQuery('#x,#y,#w,#h,#image_crop').val('');
            }
		});
	});
}
</script>