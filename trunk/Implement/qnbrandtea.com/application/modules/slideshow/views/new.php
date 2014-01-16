<script type="text/javascript">

  $(function(){

    $('#cropbox').Jcrop({
      aspectRatio: 3.5,
      onSelect: updateCoords
    });

  });

  function updateCoords(c)
  {
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
  };

  function checkCoords()
  {
    if (parseInt($('#w').val())) return true;
    alert('Please select a crop region then press submit.');
    return false;
  };

</script>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return checkCoords();" method="post" enctype="multipart/form-data">
<input type="hidden" id="x" name="x" />
<input type="hidden" id="y" name="y" />
<input type="hidden" id="w" name="w" />
<input type="hidden" id="h" name="h" />
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
	<div style="padding: 10px 0;" id="img-preview">
    	<img src="<?php echo base_url() . SLIDESHOW_IMAGE_PATH;?>2.jpg" alt="" width="100%" id="cropbox" />
    </div>
	<?php echo $this->lang->line('image'); ?>: <input type="file" name="image" id="image" /> <br><br>
    <textarea name="description" class="tinyMCE" rows="10"></textarea>
</form>
<br><br>