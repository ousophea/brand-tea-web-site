<div class="holder">
    <div class="sub-title"> <?php echo $this->session->userdata('ms') ? $this->session->userdata('ms') : '';
$this->session->unset_userdata('ms');
?></div>
    <div style="clear:both"></div>
</div>
<table class="tablesorter" cellspacing="0"> 
    <thead> 
        <tr>          
            <th>Description</th>
            <th>Action</th> 
        </tr> 
    </thead> 
    <tbody> 
        <?php
        $i = 0;
        foreach ($about->result_array() as $abo) {
            $i++;
            ?>
            <tr>             
                <td><?php echo $abo[field('conDes')]; ?></td>

                <td width="100" align="center">
    <?php echo anchor('about/editabout/' . $abo[field('conId')], 'Edit'); ?>
                </td>
            </tr> 
            <?php
        }
        ?>
    </tbody> 
</table>