<div style="height: 10px;"></div>
<div class="row-fluid">
    <h3 class="page-head"><?php echo $action; ?></h3>    
    <?php
    echo br(1);
    foreach ($about->result_array() as $abo) {
        ?>     				
        <?php
        echo "<div class='row-fluid'><div class='span12'><ul>";
        echo $abo[field('conDes')];
        echo "</ul></div></div>";
        ?>
        <?php
    }
    ?> 
    <div class="row-fluid ">
        <h3 class="page-head"><?php echo $this->lang->line('find_us'); ?></h3>
        <div class='span1'>
            <?php
            echo facebook_like();
            ?>
        </div>	
    </div>
</div>