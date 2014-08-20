<div style="height: 10px;"></div>
<div class="row-fluid">

    <h3 id="location" class="page-head"><?php echo $action; ?></h3>    
    <?php
    echo br(1);
    foreach ($contact->result_array() as $con) {
        ?> 
        <div class="row-fluid">
            <div class="span12">				
                <?php
                echo "<ul>".$con[field('conDes')]."</ul>";
                ?>
            </div>
        </div>
        <?php
    }
    echo br(1);
    ?> 
     <div class="row-fluid ">
        <h3 class="page-head"><?php echo $this->lang->line('men_skype'); ?></h3>  
            <?php
            echo skype_helper();
            ?>
    </div>
    <div class="row-fluid ">
        <h3 class="page-head"><?php echo $this->lang->line('men_location'); ?></h3>
        <div class='span1'>
            <?php
            echo map_helper();
            ?>
        </div>	
    </div>
</div>