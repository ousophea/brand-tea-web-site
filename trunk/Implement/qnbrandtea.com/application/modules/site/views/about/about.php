<div style="height: 10px;"></div>
<div class="row-fluid">
    
        <h3 class="page-head"><?php echo $action; ?></h3>    
            <?php
            echo br(1);
            foreach ($about->result_array() as $abo) {
                ?>   
				  <div class="row-fluid span12">				
                    <?php
                     
				     echo $abo[field('conDes')];
                   
                    ?>
                </div>
                <?php
            }
			echo br(1);
            ?> 
	       
          <div class="row-fluid span12">	
		   <h3 class="page-head"><?php echo $this->lang->line('men_follow'); ?></h3>
		   <?php
		   echo br(1);
            echo facebook_follow();
            ?>		
          </div>		  
</div>