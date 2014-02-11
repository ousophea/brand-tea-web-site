<div class="holder">
    <div class="sub-title"></div>

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
            </tr> 
            <?php
        }
        ?>

    </tbody> 
</table>
<div class="pagination"><?php echo $this->pagination->create_links(); ?></div>