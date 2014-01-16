<?php if(isset($slideshow) && $slideshow->num_rows() > 0):?>
	<style type="text/css">
		.slide .carousel-inner .carousel-caption {
			bottom: -266px;	
		}
	</style>
	<!--Start Carousel-->
          <div id="myCarousel" class="carousel slide">
            <div class="carousel-inner">
            <?php $i = 0; foreach($slideshow->result_array() as $row): ?>
              <div class="item<?php echo $i == 0 ? ' active' : ''; ?>">
                <img src="<?php echo base_url() . SLIDESHOW_IMAGE_PATH . '/' . $row[field('sliImage')]; ?>" class="span12" alt="">
                <div class="carousel-caption">
                  <p><?php echo $row[field('sliDes')]; ?></p>
                </div>
              </div>
            <?php $i=1; endforeach; ?>
            </div>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev"><img src="<?php echo base_url() . FRONTEND_TEMPLATE; ?>img/arrow.png" alt="Prev"></a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next"><img src="<?php echo base_url() . FRONTEND_TEMPLATE; ?>img/arrow2.png" alt="Next"></a>
          </div>
	<!--End Carousel-->
<?php else: ?>
<br />
<?php endif; ?>