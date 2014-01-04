<div class="holder">
    <div class="sub-title"> <?php echo $this->session->userdata('ms')?$this->session->userdata('ms'):''; $this->session->unset_userdata('ms');?></div>

    <div class="action"><?php echo anchor('tearelated/addnewtea', $this->lang->line('new'), 'class="button add"'); ?></div>
    <div style="clear:both"></div>
</div>
<table class="tablesorter" cellspacing="0"> 
    <thead> 
        <tr> 
           <th  width="50">Nº</th> 
            <th>Title</th>
			 <th>Description</th>
            <th>Action</th> 
        </tr> 
    </thead> 
    <tbody> 
        <?php
        $i=0;
        foreach ($tearelated->result_array() as $tea) {
            $i++;
            ?>
            <tr> 
                <td><?php echo $i;?></td> 
               <td><?php echo   $tea[field('teaTitle')];?></td>
			   <td><?php echo substr($tea[field('teaDesc')],0,150).'...';?></td>
              <td width="100" align="center">
                    <?php echo anchor('tearelated/edit/'.$tea[field('teaId')],'Edit'); ?>
                    |
                    <?php echo anchor('tearelated/delete/'.$tea[field('teaId')] ,'Delete','onclick="return confirm(\'Are you sure want to delete?\n Data can not return back!\');"'); ?>
                </td>
            </tr> 
            <?php
        }
        ?>
    </tbody> 
</table>
<div class="pagination"><?php echo $this->pagination->create_links(); ?></div>