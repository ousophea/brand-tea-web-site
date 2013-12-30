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
            <th width="30">Nº</th> 
            <th>Image</th>
            <th>Action</th> 
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
                <td><img src="<?php echo base_url().'template/frontend/img/slideshow/'.$v[field('sliImage')];?>" alt="<?php echo $v[field('sliImage')];?>" height="40" /></td>
                <td width="100" align="center">
                    <?php echo anchor('slideshow/edit/'.$v[field('sliId')],'Edit'); ?>
                    |
                    <?php echo anchor('slideshow/delete/'.$v[field('sliId')],'Delete','onclick="return confirm(\'Are you sure want to delete?\n Data can not return back!\');"'); ?>
                </td>
            </tr> 
            <?php
        }
        ?>
    </tbody> 
</table>
<div class="pagination"><?php echo $this->pagination->create_links(); ?></div>