    <div>  
        <div class="input-append" id="search">
            <input class="span3" type="text" placeholder="<?php echo $this->lang->line('search'); ?>..." />
            <button class="btn" type="button"><?php echo $this->lang->line('search'); ?></button>
        </div>
        <div class="row-fluid">
                <h3 class="page-head"> <?php echo $action?></h3>  
                 <?php
                     foreach ($teas->result_array() as $row) {	
					          $tea_desc=$row[field('teaDesc')];
                 ?>
                 <?php					
                  echo'<table width="90%" border="0" class="event" style="margin:0 auto">
                    <tr>
                    <td rowspan="10" width="35%" valign="top">';				 
				 ?>
                  <?php echo "<h3 style='color:#DF9D29'>".'<img src="'.base_url() . FRONTEND_TEMPLATE.'/img/content/detail.png" width="20" height="20"/>'.' '.$row[field('teaTitle')]."</h3><br>"?>
				  <?php 	                 				  
            	   echo "<span style='text-align:justify;'>". $tea_desc."</span>";		   
                   echo '</td>    									
                 </tr>   									
                </table>';
				?>
			   <?php	
                   }				
               ?>	           		   
        </div>  
	  <!--Pager for Tea related Knowledge-->
        <div class="pager" style="margin-left:-600px;"><?php echo $this->pagination->create_links(); ?></div>
        <div style="clear:both;padding:0 15px;">
        	<img src="<?php echo base_url() . FRONTEND_TEMPLATE; ?>img/content/tea-banner.png" width="100%" alt="">
        </div> 
        <div style="clear:both;padding:15px;">
        	<div class="span6">
            	<h3>&gt; Products</h3>
                <hr>
                <div class="span6 product-home">
                    <div class="product">
                        <p><img src="<?php echo base_url() . FRONTEND_TEMPLATE; ?>img/content/product.png" alt="product" class="span2"></p>
                        <p><a href="#">/ Read More /</a></p>
                    </div>
                    <div class="product">
                        <img src="<?php echo base_url() . FRONTEND_TEMPLATE; ?>img/content/product.png" alt="product" class="span2">
                        <p><a href="#">/ Read More /</a></p>
                    </div>
                    <div class="product">
                        <img src="<?php echo base_url() . FRONTEND_TEMPLATE; ?>img/content/product.png" alt="product" class="span2">
                        <p><a href="#">/ Read More /</a></p>
                    </div>
                    <div class="product">
                        <p><img src="<?php echo base_url() . FRONTEND_TEMPLATE; ?>img/content/product.png" alt="product" class="span2"></p>
                        <p><a href="#">/ Read More /</a></p>
                    </div>
                    <div class="product">
                        <img src="<?php echo base_url() . FRONTEND_TEMPLATE; ?>img/content/product.png" alt="product" class="span2">
                        <p><a href="#">/ Read More /</a></p>
                    </div>
                    <div class="product">
                        <img src="<?php echo base_url() . FRONTEND_TEMPLATE; ?>img/content/product.png" alt="product" class="span2">
                        <p><a href="#">/ Read More /</a></p>
                    </div>
                    <div class="product">
                        <img src="<?php echo base_url() . FRONTEND_TEMPLATE; ?>img/content/product.png" alt="product" class="span2">
                        <p><a href="#">/ Read More /</a></p>
                    </div>
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