<div class="holder">
    <div class="sub-title red">
		<p><?php echo $this->session->userdata('ms')?$this->session->userdata('ms'):''; $this->session->unset_userdata('ms');?></p>
    </div>

    <div class="action"><?php echo anchor('slideshow/addnew', $this->lang->line('new'), 'class="button add"'); ?></div>
    <div style="clear:both"></div>
</div>
<table class="tablesorter" cellspacing="0"> 
    <thead> 
        <tr> 
            <th width="30"><?php echo $this->lang->line('no'); ?></th> 
            <th width="145"><?php echo $this->lang->line('image'); ?></th>
            <th><?php echo $this->lang->line('description'); ?></th>
            <th><?php echo $this->lang->line('sli_category'); ?></th>
            <th width="100"><?php echo $this->lang->line('action'); ?></th> 
        </tr> 
    </thead> 
    <tbody> 
        <?php
        $i=0;
        foreach ($slideshow->result_array() as $v) {
            $i++;
            ?>
            <tr> 
                <td><?php echo $i;?></td> 
                <td><img src="<?php echo base_url() . SLIDESHOW_IMAGE_PATH . $v[field('sliImage')];?>" alt="<?php echo $v[field('sliImage')];?>" height="40" /></td>
                <td><?php echo $v[field('sliDes')];?></td> 
                <td><?php echo $v[field('sliCatName')];?></td> 
                <td align="center">
                    <?php echo anchor('slideshow/edit/'.$v[field('sliId')],$this->lang->line('edit')); ?>
                    |
                    <?php echo anchor('slideshow/delete/'.$v[field('sliId')],$this->lang->line('delete'),'onclick="return confirm(\''.$this->lang->line('ms_confirm_delete').'\');"'); ?>
                </td>
            </tr> 
            <?php
        }
        ?>
    </tbody> 
</table>
<div class="pagination"><?php echo $this->pagination->create_links(); ?></div>