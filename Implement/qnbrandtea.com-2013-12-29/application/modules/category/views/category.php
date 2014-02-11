<div class="holder">
    <div class="sub-title"> <?php echo $this->session->userdata('ms')?$this->session->userdata('ms'):''; $this->session->unset_userdata('ms');?></div>

    <div class="action"><?php echo anchor('category/addnew', $this->lang->line('new'), 'class="button add"'); ?></div>
    <div style="clear:both"></div>
</div>
<table class="tablesorter" cellspacing="0"> 
    <thead> 
        <tr> 
            <th  width="50">Nº</th> 
            <th>Name</th> 
            <th>Description</th>
            <th>Field</th> 
            <th>Action</th>
        </tr> 
    </thead> 
    <tbody> 
        <?php
        $i=0;
        foreach ($cats->result_array() as $cat) {
            $i++;
            ?>
            <tr> 
                <td><?php echo $i;?></td> 
                <td><?php echo $cat[field('catName')];?></td> 
                <td><?php echo $cat[field('catDes')];?></td> 
                <td width="100"><?php echo $cat[field('catField')];?></td>
                <td width="100" align="center">
                    <?php echo anchor('category/edit/'.$cat[field('catId')],'Edit'); ?>
                    |
                    <?php echo anchor('category/delete/'.$cat[field('catId')],'Delete','onclick="return confirm(\'Are you sure want to delete?\n Data can not return back!\');"'); ?>
                </td>
            </tr> 
            <?php
        }
        ?>

    </tbody> 
</table>
<div class="pagination"><?php echo $this->pagination->create_links(); ?></div>