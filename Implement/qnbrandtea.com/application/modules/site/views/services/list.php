<div style="height: 10px;"></div>
<div>  
    <div class="row-fluid">
        <h3 class="page-head"><?php echo $action; ?></h3> 
        <div class="span12">
            <?php
            $i = 1;
            foreach ($services->result_array() as $row) {
                $tea_desc = $row[field('serDesc')];
                ?>
                <?php
                echo'<table width="100%" border="0" class="event">
                    <tr>
                    <td rowspan="10" width="35%" valign="top">';
                echo '<img src="' . base_url() . FRONTEND_TEMPLATE . '/img/content/teaknow.png" width="20" height="20"/>';
                ?>
                <?php echo anchor('site/services/detail/' . $row[field('serId')], $row[field('serTitle')]); ?>
                <?php
                echo "<div style='margin-left:25px'>" . word_limiter($tea_desc, 50) . "<div>";
                echo '</td>    									
                 </tr>   									
                </table>';
                ?>
                <?php
            }
            ?>
        </div>
    </div>  
    <!--Pager for Tea related Knowledge-->
    <div class="pager"><?php echo $this->pagination->create_links(); ?></div>
    <div class="row-fluid ">
        <h3 class="page-head"><?php echo $this->lang->line('find_us'); ?></h3>
        <div class='span1'>
            <?php
            echo facebook_like();
            ?>
        </div>	
    </div>
</div>