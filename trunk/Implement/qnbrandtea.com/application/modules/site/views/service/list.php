<div style="height: 10px;"></div>
<div class="row-fluid">
    <div class="span8">
        <h3 class="page-head"><?php echo $service->row()->cont_name; ?></h3>    
        <?php echo br(1); ?>   
        <div class="row-fluid span12">				
            <?php echo $service->row()->cont_description; ?>
        </div>
    </div>
    <div class="span4">
        <div>
            <?php $this->load->view('support.php'); ?>
        </div>
        <div>
            <?php echo $this->load->view('tea-related.php'); ?>
        </div>
        <div>
            <h3 class="page-head"><?php echo $this->lang->line('find_us'); ?></h3>
            <?php
            echo facebook_like();
            ?>
        </div>

    </div>
</div>