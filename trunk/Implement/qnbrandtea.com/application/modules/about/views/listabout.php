<div class="holder">
    <div class="sub-title"> <?php echo $this->session->userdata('ms')?$this->session->userdata('ms'):''; $this->session->unset_userdata('ms');?></div>
    <div style="clear:both"></div>
</div>
<table class="tablesorter" cellspacing="0"> 
    <thead> 
        <tr> 
           <th  width="50">Nº</th>          
			 <th>Description</th>
			 <th>Status</th>
            <th>Action</th> 
        </tr> 
    </thead> 
    <tbody> 
        <?php
        $i=0;
        foreach ($about->result_array() as $abo) {
            $i++;
            ?>
            <tr> 
                <td><?php echo $i;?></td>           
			   <td><?php echo substr($abo[field('aboDesc')],0,350).'...';?></td>
			   <td><?php    			   			   
			   if($abo[field('aboStatus')] == 1){
			      echo 'Active';
			   }else{
			      echo 'Inactive';
			   }
			   ?></th>
              <td width="100" align="center">
                    <?php echo anchor('about/editabout/'.$abo[field('aboId')],'Edit'); ?>
              </td>
            </tr> 
            <?php
        }
        ?>
    </tbody> 
</table>