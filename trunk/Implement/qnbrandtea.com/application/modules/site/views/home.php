    <div>  
        <div class="input-append" id="search">
            <input class="span3" type="text" placeholder="<?php echo $this->lang->line('search'); ?>..." />
            <button class="btn" type="button"><?php echo $this->lang->line('search'); ?></button>
        </div>
        <div class="row-fluid">
        	<div class="span9 content-item first-child" style="padding:0;">
    			<h3 class="page-head"><?php echo $home->row()->cont_name; ?></h3>
                <?php echo br(1); ?> 
                <div class="row-fluid span12" style="margin-left:3%;">	
                	<?php echo $home->row()->cont_description; ?>
                </div>
            </div>
            <div class="span3 content-item">
                <h3>Support</h3>
                <hr>
                <div class="support"><img src="<?php echo base_url() . FRONTEND_TEMPLATE; ?>img/content/phone_support.png" width="60" /> <?php echo $this->lang->line('phone_support'); ?></div>
                <div class="support"><img src="<?php echo base_url() . FRONTEND_TEMPLATE; ?>img/content/tea_logo.png" width="60" /> Lorem ipsum</div>
                <div class="support"><img src="<?php echo base_url() . FRONTEND_TEMPLATE; ?>img/content/tea.png" width="60" /> Lorem ipsum</div>
                <div class="support"><img src="<?php echo base_url() . FRONTEND_TEMPLATE; ?>img/content/ticket.png" width="60" /> Email Support</div>
            </div>
        </div>  
        
        <div style="clear:both;padding:0 15px;">
        	<img src="<?php echo base_url() . FRONTEND_TEMPLATE; ?>img/content/tea-banner.png" width="100%" alt="">
        </div> 
        <div style="clear:both;padding:15px;">
        	<div class="span6">
            	<h3>&gt; Products</h3>
                <hr>
                <div class="span6 product-home">
				<?php 
                    foreach ($products->result_array() as $row): 
                        $photo = Products::getPhoto($row[field('proId')], 1)->result_array();
                        $att = array(
                            'src' => PRODUCT_PHOTO_PATH .'250x250/'. $photo[0][field('phoUrl')],
                            'class' => 'span2'
                        );
							
						$price = unserialize($row[field('proPrice')]);
                ?>
                        <div class="product">
                            <p><?php echo img($att); ?></p>
                            <p><?php echo $row[field('proName')]; ?></p>
                            <?php if($price['hide_show'] != 'hide'): ?>
                            <p class="price"><?php echo $this->lang->line('currency'), $price['price']; ?></p>
                            <?php endif; ?>
                            <p><a href="#">/ <?php echo anchor('site/products/detail/' . $row[field('proId')], 'Details'); ?> /</a></p>
                        </div>
                <?php endforeach; ?>
                </div>
            </div>
        	<div class="span5" style="padding-left:20px;">
            	<div>
                    <h3>&gt; <?php echo $this->lang->line('men_teaknowledge'); ?></h3>
                    <hr>
                  
                    <table width="100%" border="0" class="event tea_related">
                    <?php
					if(isset($teas) && $teas->num_rows() >  0):
					foreach ($teas->result_array() as $row): 
					echo '<tr>
                        <td>' . anchor('site/tearelated/detail/' . $row[field('teaId')], $row[field('teaTitle')]) . '</td>
                      </tr>';
					endforeach; 
					else: 
					?>
                      <tr>
                        <td>No data display!</td>
                      </tr>
					<?php endif; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>