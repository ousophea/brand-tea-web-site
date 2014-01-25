<div style="height: 10px;"></div>
<div class="row-fluid">
    
        <h3 class="page-head"><?php echo $action; ?></h3>    
            <?php
            echo br(1);
            foreach ($contact->result_array() as $con) {
                ?>   
				  <div class="row-fluid span12">				
                    <?php
                     
				     echo $con[field('conDesc')];
                   
                    ?>
                </div>
                <?php
            }
			echo br(1);
            ?> 
	       
  	  
</div>