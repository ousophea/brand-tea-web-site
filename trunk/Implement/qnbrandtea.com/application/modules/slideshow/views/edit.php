<div class="holder">
    <div class="sub-title red">
        <p><?php echo $this->session->userdata('ms')?$this->session->userdata('ms'):''; $this->session->unset_userdata('ms');?></p>
    </div>
    
    <div class="action">
        <?php echo form_button('btnCrop', 'crop', 'class="add" onclick="crop()"'); ?>
        <?php echo form_button('btnUpload', $this->lang->line('save'), 'class="add" onclick="saveEdit()"'); ?>
        <?php echo anchor('slideshow',$this->lang->line('cancel'), 'class="button cancel"');?>
    </div>
    <div style="clear:both"></div>
</div>
    <form id="upload-frm" action="<?php echo base_url() . 'slideshow/uploadimage'; ?>" method="post">
	<div id="img-preview" style="max-height:300px;overflow:auto;"></div><br>
    <div id='imageloadstatus' style='display:none;'><img src="<?php echo base_url() . BACKEND_TEMPLATE; ?>img/loader.gif" alt="Uploading...."/></div>
    <div id='imageloadbutton'>
	<?php echo $this->lang->line('image'); ?>: <input type="file" name="image" id="image" /> 
    </div>
	</form>
    <form id="edit-frm" action="<?php echo site_url('slideshow/edit/'.$this->uri->segment(3)); ?>" method="post">
        <input type="hidden" id="x" name="x" />
        <input type="hidden" id="y" name="y" />
        <input type="hidden" id="w" name="w" />
        <input type="hidden" id="h" name="h" />
        <input type="hidden" id="image_crop" name="image_crop" />
        <input type="hidden" name="oldimage" id="oldimage" value=""/>
        
        <?php echo $this->lang->line('sli_category'); ?>: 
        <select name="category" style="min-width:150px;">
            <?php
            foreach($category->result_array() as $v){
                echo '<option value="'.$v[field('sliCatId')].'"'.(($v[field('sliCatId')] == $slideshow->row()->sli_cat_id) ? ' selected' : 'qwere').'>'.$v[field('sliCatName')].'</option>';
            }
            ?>
        </select><br><br>
        <textarea name="description" id="description" class="slideTinyMCE" rows="10"><?php echo $slideshow->row()->sli_description; ?></textarea>
    </form>
<br><br>
<script type="text/javascript">
tinymce.init({
    selector: "textarea.slideTinyMCE",
    plugins: [
        "advlist autolink lists link charmap preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link"
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
	jQuery('#cropbox').Jcrop({
		aspectRatio: 3.5,
		onSelect: updateCoords
	});
});
  
function crop_image(){
	jQuery('#cropbox').Jcrop({
		aspectRatio: 3.5,
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
			url : "<?php echo base_url() . 'slideshow/cropimage'; ?>",
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

function saveEdit(){
	jQuery('#edit-frm').submit();
}
</script>