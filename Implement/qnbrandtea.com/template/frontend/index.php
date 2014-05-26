<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title><?php echo $title; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?php echo isset($meta_des) ? $meta_des : ''; ?>">
        <meta name="keyword" content="<?php echo isset($meta_keyword) ? $meta_des : ''; ?>">

        <!-- Le styles -->
        <link href="<?php echo base_url() . FRONTEND_TEMPLATE; ?>css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url() . FRONTEND_TEMPLATE; ?>css/bootstrap-responsive.css" rel="stylesheet">
        <link href="<?php echo base_url() . FRONTEND_TEMPLATE; ?>css/style.css" rel="stylesheet">
        <link href="<?php echo base_url() . FRONTEND_TEMPLATE; ?>css/jssor-slider.css" rel="stylesheet"  />
        <link href="<?php echo base_url() . FRONTEND_TEMPLATE; ?>css/more-style.css" rel="stylesheet"  />
        <link href="<?php echo base_url() . FRONTEND_TEMPLATE; ?>css/language.css" rel="stylesheet"  />
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Le fav and touch icons -->
        <link rel="shortcut icon" href="ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
        <link href='http://fonts.googleapis.com/css?family=Lato:300' rel='stylesheet' type='text/css'>

        <style type="text/css">
            @font-face{
                font-family: 'khmer-bokor';
                src: url('<?php echo base_url() . FRONTEND_TEMPLATE; ?>fonts/KhmerOSbokor.ttf');
            }
            <?php
            if ($this->uri->segment(2)) {
                echo '.' . $this->uri->segment(2) . '{ text-decoration: underline;color: #DE9D27;}';
            } else {
                echo '.home{text-decoration: underline; color: #DE9D27;}';
            }
// Check cookie
            if ($this->input->cookie('language') == 'kh') {
                ?>
                @font-face{
                    font-family: 'khmer-bokor';
                    src: url('<?php echo base_url() . FRONTEND_TEMPLATE; ?>fonts/KhmerOSbokor.ttf');
                }
                ul.nav li a{
                    font-family: 'khmer-bokor'!important;
                } 
                <?php
            }
            ?>
        </style>
    </head>

    <body>
        <?php $this->load->view('translation/front-end-view'); ?>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <div class="span3">
                        <a class="brand" href="<?php echo base_url(); ?>"><img width="150" src="<?php echo base_url() . FRONTEND_TEMPLATE; ?>img/template/logo.png" alt="logo"/></a>
                    </div>

                    <div class="nav-collapse">
                        <ul class="nav pull-right">
                            <li class="home"><?php echo anchor('site/home', $this->lang->line('men_home')); ?></li>
                            
                            <li class="products"><?php echo anchor('site/products', $this->lang->line('men_product')); ?></li>
                            <li class="services"><?php echo anchor('site/services', $this->lang->line('men_service')); ?></li>
                            <li class="tearelated"><?php echo anchor('site/tearelated', $this->lang->line('men_tearelated')); ?></li>
                            <li class="contact"><?php echo anchor('site/contact', $this->lang->line('men_contact')); ?></li>
                            <li class="about"><?php echo anchor('site/about', $this->lang->line('men_about')); ?></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <div class="container well">

            <?php include('slideshow.php'); ?>
            <?php $this->load->view($page); ?>
            <div class="row-fluid">
                <div class="span12 text-center" style="text-align: center;">
                    <span class='st_facebook_large' displayText='Facebook'></span>
                    <span class='st_googleplus_large' displayText='Google +'></span>
                    <span class='st_twitter_large' displayText='Tweet'></span>
                    <span class='st_linkedin_large' displayText='LinkedIn'></span>
                    <span class='st_pinterest_large' displayText='Pinterest'></span>
                    <span class='st_email_large' displayText='Email'></span>
                    <span class='st_sharethis_large' displayText='ShareThis'></span>
                </div>
            </div>
            <div class="span12" style="padding:0 15px;max-width: 910px;" id="footer-info">
                <br><hr>

                <div class="span3">
                    <!--                    <h3>Shop Main</h3>-->
                    <h3><?php echo $this->lang->line('product_to_shop'); ?></h3>
                    <ul>
                        <?php
                        $cats = $this->mod_global->getAllCats(4);

                        foreach ($cats->result_array() as $row) {
                            ?>
                                    <!--<li><a href="#"><?php echo $cat[field('catName')]; ?></a></li>-->
                        <li class="category-item"><?php echo anchor('site/products/category/' . $row[field('catId')], subString($row[field('catName')],20)); ?></li>

                            <?php
                        }
                        ?>
                    </ul>
                </div>
                <div class="span3">
                    <h3><?php echo $this->lang->line('top_product'); ?></h3>

                    <ul>
                        <?php
                        $groups = $this->mod_global->getAllGros(4, "cate_name LIKE '%tea%'");

                        foreach ($groups->result_array() as $row) {
                            ?>
                                <!--<li><a href="#"><?php echo $grop[field('groName')]; ?></a></li>-->
                            <li class="group-item">
                                    <?php echo anchor('site/products/group/' . $row[field('groId')], subString($row[field('groName')],20)); ?>
                                <?php // echo substr($row[field('proName')], 0, 12) . '...'; ?>
                            </li>

                            <?php
                        }
                        ?>

     <!--<li><?php echo anchor('site/tearelated', $this->lang->line('men_tearelated')); ?></li>-->
                    </ul>
                </div>
                <div class="span3">
                    <h3><?php echo $this->lang->line('customer_service'); ?></h3>
                    <ul>
                        <?php
                        $service = $this->mod_global->getService(4);

                        foreach ($service->result_array() as $row) {
                            ?>

                            <li><?php echo anchor('site/services/detail/' . $row[field('serId')], subString($row[field('serTitle')],20)); ?></li>

                            <?php
                        }
                        ?>
                    </ul>
                </div>
                <div class="span3">
                    <h3><?php echo $this->lang->line('customer_info'); ?></h3>
                    <ul>
                        <li><a href="#">#82, St.371, Phnom Penh, Cambodia</a></li>
                        <li><a href="#">Tel: (+855)99 999 999</a></li>
                        <li><a href="#">Fax: (+855)99 999 999</a></li>
                        <li><a href="#">Email: info@qnbrandtea.com</a></li>
                    </ul>
                </div>
                <div class="clear"></div>
            </div>
        </div><!-- /container -->
        <footer class="footer">
            <div class="container">
                <ul class="footer-menu">
                    <li><?php echo anchor('site/home', $this->lang->line('men_home')); ?></li>
                    <li><?php echo anchor('site/about', $this->lang->line('men_about')); ?></li>
                    <li><?php echo anchor('site/products', $this->lang->line('men_product')); ?></li>
                    <li><?php echo anchor('site/services', $this->lang->line('men_service')); ?></li>
                    <li><?php echo anchor('site/tearelated', $this->lang->line('men_tearelated')); ?></li>
                    <li><?php echo anchor('site/contact', $this->lang->line('men_contact')); ?></li>
                </ul>
                <span style="color: #fff; font-size: 10px;"> &copy; Q.N Brand Tea</span>
            </div>
        </footer>
        <!-- javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="<?php echo base_url() . FRONTEND_TEMPLATE; ?>js/jquery.js"></script>
        <script src="<?php echo base_url() . FRONTEND_TEMPLATE; ?>js/bootstrap-transition.js"></script>
        <script src="<?php echo base_url() . FRONTEND_TEMPLATE; ?>js/bootstrap-carousel.js"></script>
        <script src="<?php echo base_url() . FRONTEND_TEMPLATE; ?>js/bootstrap-alert.js"></script>
        <script src="<?php echo base_url() . FRONTEND_TEMPLATE; ?>js/bootstrap-modal.js"></script>
        <script src="<?php echo base_url() . FRONTEND_TEMPLATE; ?>js/bootstrap-dropdown.js"></script>
        <script src="<?php echo base_url() . FRONTEND_TEMPLATE; ?>js/bootstrap-scrollspy.js"></script>
        <script src="<?php echo base_url() . FRONTEND_TEMPLATE; ?>js/bootstrap-tab.js"></script>
        <script src="<?php echo base_url() . FRONTEND_TEMPLATE; ?>js/bootstrap-tooltip.js"></script>
        <script src="<?php echo base_url() . FRONTEND_TEMPLATE; ?>js/bootstrap-popover.js"></script>
        <script src="<?php echo base_url() . FRONTEND_TEMPLATE; ?>js/bootstrap-button.js"></script>
        <script src="<?php echo base_url() . FRONTEND_TEMPLATE; ?>js/bootstrap-collapse.js"></script>
        <script src="<?php echo base_url() . FRONTEND_TEMPLATE; ?>js/bootstrap-typeahead.js"></script>
        <script src="<?php echo base_url() . FRONTEND_TEMPLATE; ?>js/jquery-ui-1.8.18.custom.min.js"></script>
        <script src="<?php echo base_url() . FRONTEND_TEMPLATE; ?>js/jquery.smooth-scroll.min.js"></script>
        <!--<script src="<?php echo base_url() . FRONTEND_TEMPLATE; ?>js/lightbox.js"></script>-->
        <script src="<?php echo base_url() . FRONTEND_TEMPLATE; ?>js/jssor-slider.js" /></script>
    <script>
        $('.carousel').carousel({
            interval: 5000
        })
    </script>
    <script>
        //    $Z$t3_starter("$Z$t3");
    </script>
    <!--Share this-->
    <script type="text/javascript">var switchTo5x = true;</script>
    <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
    <script type="text/javascript">stLight.options({publisher: "f9d9cdbf-9fa5-4708-8fae-2cf714dcfda1", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
    <!--End Share this-->
</body>
</html>
