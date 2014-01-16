    <div>  
        <div class="input-append" id="search">
            <input class="span3" type="text" placeholder="<?php echo $this->lang->line('search'); ?>..." />
            <button class="btn" type="button"><?php echo $this->lang->line('search'); ?></button>
        </div>
        <div class="row-fluid">
        	<div class="span9 content-item first-child">
                  <h3>&gt; Welcome</h3>
                  <hr>
                  <?php echo $home->row()->cont_description; ?>
            </div>
            <div class="span3 content-item">
                <h3>Support</h3>
                <hr>
                <div class="support"><img src="<?php echo base_url() . FRONTEND_TEMPLATE; ?>img/content/tea.png" width="70" /> Lorem ipsum</div>
                <div class="support"><img src="<?php echo base_url() . FRONTEND_TEMPLATE; ?>img/content/tea.png" width="70" /> Lorem ipsum</div>
                <div class="support"><img src="<?php echo base_url() . FRONTEND_TEMPLATE; ?>img/content/tea.png" width="70" /> Lorem ipsum</div>
                <div class="support"><img src="<?php echo base_url() . FRONTEND_TEMPLATE; ?>img/content/tea.png" width="70" /> Lorem ipsum</div>
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
                ?>
                        <div class="product">
                            <p><?php echo img($att); ?></p>
                            <p><?php echo $row[field('proName')]; ?></p>
                            <p class="price"><?php echo $this->lang->line('currency'), $row[field('proPrice')]; ?></p>
                            <p><a href="#">/ <?php echo anchor('site/products/detail/' . $row[field('proId')], 'Details'); ?> /</a></p>
                        </div>
                <?php endforeach; ?>
                </div>
            </div>
        	<div class="span5" style="padding-left:20px;">
            	<div>
                    <h3>&gt; Welcome <span style="float: right; margin-right:25px;">Date</span></h3>
                    <hr>
                  
                    <table width="100%" border="0" class="event">
                      <tr>
                        <td>Lorem ipsum dolor sit amet</td>
                        <td align="right">2013-12-05</td>
                      </tr>
                      <tr>
                        <td>Lorem ipsum dolor sit amet</td>
                        <td align="right">2013-12-05</td>
                      </tr>
                      <tr>
                        <td>Lorem ipsum dolor sit amet</td>
                        <td align="right">2013-12-05</td>
                      </tr>
                      <tr>
                        <td>Lorem ipsum dolor sit amet</td>
                        <td align="right">2013-12-05</td>
                      </tr>
                      <tr>
                        <td>Lorem ipsum dolor sit amet</td>
                        <td align="right">2013-12-05</td>
                      </tr>
                      <tr>
                        <td>Lorem ipsum dolor sit amet</td>
                        <td align="right">2013-12-05</td>
                      </tr>
                      <tr>
                        <td>Lorem ipsum dolor sit amet</td>
                        <td align="right">2013-12-05</td>
                      </tr>
                    </table>
                </div>
            	<div>
                	<br>
                    <h3>&gt; Welcome <span style="float: right; margin-right:25px;">Date</span></h3>
                    <hr>
                  
                    <table width="100%" border="0" class="event">
                      <tr>
                        <td>Lorem ipsum dolor sit amet</td>
                        <td align="right">2013-12-05</td>
                      </tr>
                      <tr>
                        <td>Lorem ipsum dolor sit amet</td>
                        <td align="right">2013-12-05</td>
                      </tr>
                      <tr>
                        <td>Lorem ipsum dolor sit amet</td>
                        <td align="right">2013-12-05</td>
                      </tr>
                      <tr>
                        <td>Lorem ipsum dolor sit amet</td>
                        <td align="right">2013-12-05</td>
                      </tr>
                      <tr>
                        <td>Lorem ipsum dolor sit amet</td>
                        <td align="right">2013-12-05</td>
                      </tr>
                      <tr>
                        <td>Lorem ipsum dolor sit amet</td>
                        <td align="right">2013-12-05</td>
                      </tr>
                      <tr>
                        <td>Lorem ipsum dolor sit amet</td>
                        <td align="right">2013-12-05</td>
                      </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>