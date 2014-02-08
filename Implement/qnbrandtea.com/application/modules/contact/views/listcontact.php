<div class="holder">
    <div class="sub-title"> <?php echo $this->session->userdata('ms')?$this->session->userdata('ms'):''; $this->session->unset_userdata('ms');?></div>
    <div style="clear:both"></div>
</div>
<table class="tablesorter" cellspacing="0"> 
    <thead> 
        <tr>          
			 <th>Contact</th>
			 <th>Status</th>
            <th>Action</th> 
        </tr> 
    </thead> 
    <tbody> 
        <?php
      
        foreach ($contact->result_array() as $con) {      
            ?>
            <tr>                    
			   <td><?php echo $con[field('contactDesc')];?></td>
			   <td><?php    			   			   
			   if($con[field('contactStatus')] == 1){
			      echo 'Active';
			   }else{
			      echo 'Inactive';
			   }
			   ?></th>
              <td width="100" align="center">
                    <?php echo anchor('contact/editcontact/'.$con[field('contactId')],'Edit'); ?>
              </td>
            </tr> 
            <?php
        }
        ?>
    </tbody> 
</table>