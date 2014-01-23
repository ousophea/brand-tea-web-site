<div class="holder">
    <div class="sub-title red">
		<p><?php echo $this->session->userdata('ms')?$this->session->userdata('ms'):''; $this->session->unset_userdata('ms');?></p>
    </div>

    <div class="action"><?php echo anchor('slideshow/category/addnew', $this->lang->line('new'), 'class="button add"'); ?></div>
    <div style="clear:both"></div>
</div>
<table class="tablesorter" cellspacing="0"> 
    <thead> 
        <tr> 
            <th width="5"><?php echo $this->lang->line('no'); ?></th> 
            <th width="145"><?php echo $this->lang->line('name'); ?></th>
            <th width="10"><?php echo $this->lang->line('action'); ?></th> 
        </tr> 
    </thead> 
    <tbody> 
        <?php
        $i=0;
        foreach ($category->result_array() as $v) {
            $i++;
            ?>
            <tr> 
                <td><?php echo $i;?></td> 
                <td><?php echo $v[field('sliCatName')];?></td>
                <td align="center">
                    <?php echo anchor('slideshow/category/edit/'.$v[field('sliCatId')],$this->lang->line('edit')); ?>
                    |
                    <?php echo anchor('slideshow/category/delete/'.$v[field('sliCatId')],$this->lang->line('delete'),'onclick="return confirm(\''.$this->lang->line('ms_confirm_delete').'\');"'); ?>
                </td>
            </tr> 
            <?php
        }
        ?>
    </tbody> 
</table>
<div class="pagination"><?php echo $this->pagination->create_links(); ?></div>