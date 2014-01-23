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
    <form id="edit-frm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="hidden" id="x" name="x" />
        <input type="hidden" id="y" name="y" />
        <input type="hidden" id="w" name="w" />
        <input type="hidden" id="h" name="h" />
        <input type="hidden" id="image_crop" name="image_crop" />
        <input type="hidden" name="oldimage" id="oldimage" value=""/>
        <textarea name="description" id="description" class="slideTinyMCE" rows="10"></textarea>
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


$(document).ready(function() { 
		
	$('#image').die('click').live('change', function(){ 
		$("#img-preview").html('');	
		$("#upload-frm").ajaxForm({target: '#img-preview', 
			beforeSubmit:function(){ 
				//console.log('ttest');
				$("#imageloadstatus").show();
				$("#imageloadbutton").hide();
			}, 
			success:function(){ 
				//console.log('test');
				$("#imageloadstatus").hide();
				$("#imageloadbutton").show();
			}, 
			error:function(){ 
				//console.log('xtest');
				$("#imageloadstatus").hide();
				$("#imageloadbutton").show();
			} 
		}).submit();
	});
});


$(function(){
	$('#cropbox').Jcrop({
		aspectRatio: 3.5,
		onSelect: updateCoords
	});
});
  
function crop_image(){
	$('#cropbox').Jcrop({
		aspectRatio: 3.5,
		onSelect: updateCoords
	});
}

function updateCoords(c)
{
	$('#x').val(c.x);
	$('#y').val(c.y);
	$('#w').val(c.w);
	$('#h').val(c.h);
	$('#image_crop').val($('#image').val());
};

function crop(){
	var image = $('#image_crop').val();
	image = image ? image : '';
	var newImage = $('#image').val();
	var x = $('#x').val();
	var y = $('#y').val();
	var w = $('#w').val();
	var h = $('#h').val();
	
	if(image != newImage || image == '' || w == ''){
    	alert('Please select a crop region then press submit.');
		return false;
	}
	
	$(function(){
		$('#img-preview').html('<img src="<?php echo base_url() . BACKEND_TEMPLATE; ?>img/loader.gif" alt="Loading...."/>');
		$.ajax({
			type : "POST",
			url : "<?php echo base_url() . 'slideshow/cropimage'; ?>",
			data:"x="+x+ "&y="+y+"&w="+w+"&h="+h+"&image="+image,
			dataType:"json",
			success:function(data){
				var img = '<img src="<?php echo base_url() . SLIDESHOW_IMAGE_PATH; ?>'+data.image+'" id="cropbox" style="width:100%" />';
                $("#img-preview").html(img);
				$('#oldimage').val(data.image);
				$('#x,#y,#w,#h,#image_crop').val('');
            }
		});
	});
}

function saveEdit(){
	if($('#oldimage').val() == ''){
		alert('Please upload an image!');
		return false;
	}
	$('#edit-frm').submit();
}
</script>