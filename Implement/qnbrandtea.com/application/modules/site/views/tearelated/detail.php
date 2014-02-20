<div>  
    <div class="row-fluid">
        <div class="span8 content-item first-child" style="padding:0;">
               <h3 class="page-head"><?php echo $action; ?></h3> 
            <div class="row-fluid span12" style="margin-left:3%;">	
                <?php
                foreach ($detail->result_array() as $row) {
                    $tea_desc = $row[field('teaDesc')];
                    ?>
                    <?php echo "<br/><h3 style='color:#DF9D29'>" . $row[field('teaTitle')] . "</h3><br>" ?>
                    <?php
                    echo "<span style='text-align:justify;'>" . $tea_desc . "</span>";
                    ?>
                    <?php
                }
                ?>
            </div>
        </div>
        <div class="span4">
            <?php $this->load->view('support.php'); ?>
            <div style="text-align:justify;">
                <?php echo  $this->load->view('tea-related.php'); ?>
				   <div class="pager"><?php //echo $this->pagination->create_links(); ?></div>
            </div>
            <div>
                <h3 class="page-head"><?php echo $this->lang->line('find_us'); ?></h3>
                <?php
                echo facebook_like();
                ?>
            </div>
			
    <div class="clear"></div>
        </div>
    </div>  
        
</div>




<!--


<div style="height: 10px;"></div>
<div>  
    <div class="row-fluid">
        <h3 class="page-head"><?php //echo $action; ?></h3> 
        <div class="span12">
            <?php
          //  foreach ($teas->result_array() as $row) {
               // $tea_desc = $row[field('teaDesc')];
                ?>
                <?php //echo "<br/><h3 style='color:#DF9D29'>" . $row[field('teaTitle')] . "</h3><br>" ?>
                <?php
                //echo "<span style='text-align:justify;'>" . $tea_desc . "</span>";
                ?>
                <?php
            //}
            ?>
        </div>
    </div>  
    <div class="row-fluid ">
        <h3 class="page-head"><?php //echo $this->lang->line('find_us'); ?></h3>
        <div class='span1'>
            <?php
            //echo facebook_like();
            ?>
        </div>	
    </div>
</div>-->