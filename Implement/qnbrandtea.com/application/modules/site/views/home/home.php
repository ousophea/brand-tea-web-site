    <div>  
        <div class="row-fluid">
        	<div class="span8 content-item first-child" style="padding:0;">
    			<h3 class="page-head"><?php echo $home->row()->cont_name; ?></h3>
                <?php echo br(1); ?> 
                <div class="row-fluid span12" style="margin-left:3%;">	
                	<?php echo $home->row()->cont_description; ?>
                </div>
            </div>
            <div class="span4">
                <?php $this->load->view('support.php'); ?>
            </div>
        </div>  
    	<div class="clear" style="height:15px;"></div>
        
        <div class="row-fluid">
            <div style="padding:0 15px;">
                <img src="<?php echo base_url() . SLIDESHOW_IMAGE_PATH; ?>tea-banner.jpg" width="100%" alt="">
            </div>
        </div> 
    	<div class="clear" style="height:15px;"></div>
        
        <div class="row-fluid">
            <div class="span8">
                <h3 class="page-head"><?php echo $this->lang->line('men_product'); ?></h3>
        
                <?php
                echo br(1);
                $i = 0;
                $html = '';
                foreach ($products->result_array() as $row) {
                    $i++;
        
                    $html.='<div class="span3">';
        
                    $photo = Products::getMainPhoto($row[field('proId')])->result_array();
                    $att = array(
                        'src' => PRODUCT_PHOTO_PATH . '250x250/' . $photo[0][field('phoUrl')],
                        'width' => 110,
                        'class' => 'img'
                    );
                    $html.= '<div class="photo">' . img($att) . '</div>';
                    $html.= '<div class="content">';
                    $html.= $row[field('proName')];
                    $price = unserialize($row[field('proPrice')]);
                    if ($price['hide_show'] != 'hide') {
                        $html.= '<label class="price">' . $this->lang->line('currency') . $price['price'] . '</label>';
                    }
                    $html.= '<label class="order">';
                    $html.=anchor('site/products/detail/' . $row[field('proId')] , 'Details','class="btn"');
                    $html.='</label>';
                    $html.= '</div>';
        
                    $html.='</div>';
                    if ($i == 4) {
                        $i = 0;
                        echo '<div class="row-fluid span12">';
                        echo $html;
                        echo '</div>';
                        $html = '';
                    }
                }
                if ($i < 4 && $i > 0) {
                    echo '<div class="row-fluid span12">';
                    echo $html;
                    echo '</div>';
                    $html = '';
                }
                ?>
        
                <div class="pager"><?php echo $this->pagination->create_links(); ?></div>
            </div>
            <div class="span4">
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
        
    	<div class="clear"></div>
    </div>