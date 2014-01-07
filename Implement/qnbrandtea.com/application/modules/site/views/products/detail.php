<?php
foreach ($pros->result_array() as $row) {
    ?>
    <div style="height: 10px;"></div>
    <div class="row-fluid span12">
        <div class="span12">
            <h3 class="page-head"><?php echo $action; ?></h3>
            <div class="row-fluid span12">
                <?php
                echo br(1);
                ?>
                <?php
                $photos = Products::getPhoto($row[field('proId')], 0)->result_array();
                echo '<div class="photo span6">';
                $t = 0;
                foreach ($photos as $photo) {

                    if ($t == 0) {
                        $t = 1;
                        $att = array(
                            'src' => PRODUCT_PHOTO_PATH . '250x250/' . $photo[field('phoUrl')],
                            'class' => 'img',
                            'data-zoom-image' => base_url() . PRODUCT_PHOTO_PATH . $photo[field('phoUrl')],
                            'id' => 'img_view'
                        );
                        echo '<div style="width:100%; text-align: center;">', img($att), '</div>';
                        echo '<div style="width:100%;">&nbsp;</div>';
                        echo '<div id="myGal">'; // Open gallery tag
                    }
                    $att = array(
                        'src' => PRODUCT_PHOTO_PATH . '100x100/' . $photo[field('phoUrl')],
                        'width' => 50,
                        'class' => 'img'
                    );
                    echo '<a href="#" data-image="' . base_url() . PRODUCT_PHOTO_PATH . '250x250/' . $photo[field('phoUrl')] . '" data-zoom-image="' . base_url() . PRODUCT_PHOTO_PATH . $photo[field('phoUrl')] . '">';
                    echo img($att) . nbs();
                    echo '</a>';
                }
                echo '</div>'; // Close div gallery
                echo '</div>';
                ?>
                <div class="span5">
                    <p class="title"><?php echo $row[field('proName')]; ?></p>
                    <p>
                        <?php echo '<label><b>', $this->lang->line('price'), '</b> : <span class="price" style="text-align: left;">', $this->lang->line('currency'), $row[field('proPrice')], '</span></label>'; ?>
                        <?php // echo br().$row[field('proQty')]; ?>
                    </p>
                    <p>
                        <?php
                        // Generate HTML
                        $fields = unserialize($row[field('proField')]);
                        $html = '';
                        $k = 0;
                        foreach ($fields['label'] as $field) {
                            $html .='<label><b>' . $fields['label'][$k] . '</b> : ' . $fields['field'][$k] . '</label>';
                            $k++;
                        }
                        echo $html;
                        ?>
                    </p>
    <!--                    <p>
                    
                </p>-->
                </div>
                <div class="span11">&nbsp;</div>
                <div class="span11 more">
                    <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
                        <li class="active"><a href="#des" data-toggle="tab"><?php echo $this->lang->line('description'); ?></a></li>
                        <li><a href="#reated-knowledge" data-toggle="tab"><?php echo $this->lang->line('related_knowledge'); ?></a></li>
                        <li><a href="#other" data-toggle="tab">Other</a></li>
                    </ul>
                    <div id="my-tab-content" class="tab-content">
                        <div class="tab-pane active" id="des">
                            <?php echo $row[field('proDes')];  ?>
                        </div>
                        <div class="tab-pane" id="reated-knowledge">
                            <h1>Orange</h1>
                            <p>orange orange orange orange orange</p>
                        </div>
                        <div class="tab-pane" id="other">
                            <h1>Yellow</h1>
                            <p>yellow yellow yellow yellow yellow</p>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="span12">&nbsp;</div>
    <?php
    $relatedProduct = (unserialize($row[field('proRelated')]));

    if (is_array($relatedProduct)) {
        ?>
        <div class="span12">
            <h3 class="page-head"><?php echo $this->lang->line('related_product'); ?></h3>
            <?php echo br(2);?>
            <?php foreach($relatedProduct as $relatedProId){
                echo Products::getRelatedProduct($relatedProId);
            } ?>
        </div>
        <?php
    }
    ?>

    <?php
}
?>
<script src='<?php echo base_url() ?>addon/image-zooming/jquery-1.8.3.min.js'></script>
<script src='<?php echo base_url() ?>addon/image-zooming/jquery.elevatezoom.js'></script>
<style type="text/css">
    /*set a border on the images to prevent shifting*/
    #myGal img{border:2px solid white;}

    /*Change the colour*/
    .myActive img{border:2px solid #333 !important;}
</style>
<script type="text/javascript">
//initiate the plugin and pass the id of the div containing gallery images
    jQuery("#img_view").elevateZoom({
        scrollZoom: true,
        responsive: true,
        gallery: 'myGal',
        cursor: 'pointer',
        galleryActiveClass: 'myActive',
        imageCrossfade: true,
        loadingIcon: 'http://www.elevateweb.co.uk/spinner.gif'
    });

//pass the images to Fancybox
//    jQuery("#img_view").bind("click", function(e) {
//        var ez = jQuery('#img_view').data('elevateZoom');
//        $.fancybox(ez.getGalleryList());
//        return false;
//    });
</script>