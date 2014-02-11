<div class="holder">
    <div class="sub-title"> <?php echo $this->session->userdata('ms')?$this->session->userdata('ms'):''; $this->session->unset_userdata('ms');?></div>

    <div class="action"><?php echo anchor($this->uri->segment(1).'/addnew', $this->lang->line('new'), 'class="button add"'); ?></div>
    <div style="clear:both"></div>
</div>
<table class="tablesorter" cellspacing="0"> 
    <thead> 
        <tr> 
            <th  width="50">Nº</th> 
            <th>Title</th> 
            <th>Price</th>
            <th>Quantity</th> 
            <th>Action</th>
        </tr> 
    </thead> 
    <tbody> 
        <?php
        $i=0 ;
        foreach ($pros->result_array() as $pro) {
            $i++;
            ?>
            <tr> 
                <td><?php echo $i;?></td> 
                <td><?php echo $pro[field('proName')];?></td> 
                <td><?php echo $pro[field('proPrice')];?></td> 
                <td width="100"><?php echo $pro[field('proQty')];?></td>
                <td width="100" align="center">
                    <?php echo anchor($this->uri->segment(1).'/detail/'.$pro[field('proId')],'View Details'); ?>
                    |
                    <?php echo anchor($this->uri->segment(1).'/edit/'.$pro[field('proId')],'Edit'); ?>
                    |
                    <?php echo anchor($this->uri->segment(1).'/delete/'.$pro[field('proId')],'Delete','onclick="return confirm(\'Are you sure want to delete?\n Data can not return back!\');"'); ?>
                </td>
            </tr> 
            <?php
        }
        ?>

    </tbody> 
</table>
<div class="pagination"><?php echo $this->pagination->create_links(); ?></div>