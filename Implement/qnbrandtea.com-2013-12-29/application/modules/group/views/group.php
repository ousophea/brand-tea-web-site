<div class="holder">
    <div class="sub-title"> <?php echo $this->session->userdata('ms')?$this->session->userdata('ms'):''; $this->session->unset_userdata('ms');?></div>

    <div class="action"><?php echo anchor('group/addnew', $this->lang->line('new'), 'class="button add"'); ?></div>
    <div style="clear:both"></div>
</div>
<table class="tablesorter" cellspacing="0"> 
    <thead> 
        <tr> 
            <th  width="50">Nº</th> 
            <th>Name</th> 
            <th>Description</th>
            <th>Category</th> 
            <th>Action</th>
        </tr> 
    </thead> 
    <tbody> 
        <?php
        $i=0;
        foreach ($gros->result_array() as $gro) {
            $i++;
            ?>
            <tr> 
                <td><?php echo $i;?></td> 
                <td><?php echo $gro[field('groName')];?></td> 
                <td><?php echo $gro[field('groDes')];?></td> 
                <td width="100"><?php echo $gro[field('catName')];?></td>
                <td width="100" align="center">
                    <?php echo anchor('group/edit/'.$gro[field('groId')],'Edit'); ?>
                    |
                    <?php echo anchor('group/delete/'.$gro[field('groId')],'Delete','onclick="return confirm(\'Are you sure want to delete?\n Data can not return back!\');"'); ?>
                </td>
            </tr> 
            <?php
        }
        ?>

    </tbody> 
</table>
<div class="pagination"><?php echo $this->pagination->create_links(); ?></div>