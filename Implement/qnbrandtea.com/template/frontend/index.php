<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $title;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?php echo base_url() . FRONTEND_TEMPLATE; ?>css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url() . FRONTEND_TEMPLATE; ?>css/bootstrap-responsive.css" rel="stylesheet">
    <link href="<?php echo base_url() . FRONTEND_TEMPLATE; ?>css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() . FRONTEND_TEMPLATE; ?>css/jssor-slider.css" rel="stylesheet"  />
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
	
  </head>

  <body>

    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
            <div class="span3">
                <a class="brand" href="<?php echo base_url(); ?>"><img width="200" src="<?php echo base_url() . FRONTEND_TEMPLATE; ?>img/template/logo.png" alt="logo"/></a>
            </div>
          
          <div class="nav-collapse">
            <ul class="nav pull-right">
              <li class="active"><a href="#">Home</a></li>
			  <li><a href="#">About</a></li>
              <li><a href="#">Product</a></li>
              <li><a href="#">Services</a></li>
			  <li><a href="#">Tea Related</a></li>
              <li><a href="#">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
	<div class="container well">
		<?php
            $this->load->view('home.php');
        ?>    
    </div><!-- /container -->
    <footer class="footer">
    	<div class="container">
        	<ul class="footer-menu">
            	<li><a href="">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Product</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Tea Related</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
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
	<script src="<?php echo base_url() . FRONTEND_TEMPLATE; ?>js/lightbox.js"></script>
    <script src="<?php echo base_url() . FRONTEND_TEMPLATE; ?>js/jssor-slider.js" /></script>
	<script>
	$('.carousel').carousel({
	  interval: 5000
	})
	</script>
	<script>
		$Z$t3_starter("$Z$t3");
	</script>
  </body>
</html>
