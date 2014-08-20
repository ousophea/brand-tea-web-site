<div style="height: 10px;"></div>
<div class="row-fluid">
    <div class="span8">


        <?php if (!empty($q)) { ?>
            <?php if ($q->num_rows() > 0) { ?>

                <h3 class="page-head">Search Result for <?php echo '"' . $this->input->post('q') . '"'; ?>, <?php echo $q->num_rows(); ?></h3>
                <br />
                <div class="row-fluid">
                    <div class="span12">
                        <form method="post" action="<?php echo base_url(); ?>site/products" style="padding-bottom: 28px;">
                            <div class="input-append" id="search" style="text-align: left; float: right;margin-right: -4px;">
                                <input name="q" type="text" value="<?php echo set_value('q'); ?>" placeholder="<?php echo $this->lang->line('search'); ?>..." />
                                <button class="btn" type="submit" style="font-size:12px"><?php echo $this->lang->line('search'); ?></button>
                            </div>
                        </form>
                    </div>
                    <?php foreach ($q->result_array() as $row) { ?>

                        <div class="span3" title="<?php echo $row[field('proName')]; ?>">
                            <div class="photo">
                                <a href="<?php echo base_url() . 'site/products/detail/' . $row[field('proId')] ?>">
                                    <?php $photo = Products::getMainPhoto($row[field('proId')])->result_array(); ?>
                                    <img src='<?php echo base_url() . PRODUCT_PHOTO_PATH . '250x250/' . $photo[0][field('phoUrl')]; ?>' style="height: 90px;" class="img" alt="">
                                </a>
                            </div>

                            <div class="content">
                                <?php echo substr($row[field('proName')], 0, 12) . '...'; ?>
                                <label class="price"><?php
                                    $price = unserialize($row[field('proPrice')]);
                                    echo $this->lang->line('currency') . $price['price'];
                                    ?></label>
                                <label class="order">
                                    <a href="<?php echo base_url() . 'site/products/detail/' . $row[field('proId')] ?>" class="btn">Details</a>
                                </label>
                            </div>
                        </div>
                    <?php } ?>
                </div>


            <?php } else { ?>

                <h3 class="page-head">Search Result for <?php echo '"' . $this->input->post('q') . '"'; ?>, <?php echo $q->num_rows(); ?></h3>
                <br />
                <div class="row-fluid">
                    <div class="span12">
                        <form method="post" action="<?php echo base_url(); ?>site/products">
                            <div class="input-append" id="search" style="text-align: left; float: right;margin-right: -4px;">
                                <input name="q" value="<?php echo set_value('q'); ?>" type="text" placeholder="<?php echo $this->lang->line('search'); ?>..." />
                                <button class="btn" type="submit" style="font-size:12px"><?php echo $this->lang->line('search'); ?></button>
                            </div>
                        </form>
                        <p style="padding-left: 20px; color: red; position: relative; top: 20px;">No result found, please try again</p>
                    </div>
                </div>
            <?php } ?>
        <?php } else { ?>


            <h3 class="page-head"><?php echo $action; ?></h3>

            <?php
            echo br(1);
            $i = 0;
            $html = '';
            foreach ($pros->result_array() as $row) {
                $i++;

                $html.='<div class="span3">';

                $photo = Products::getMainPhoto($row[field('proId')])->result_array();
                $att = array(
                    'src' => PRODUCT_PHOTO_PATH . '250x250/' . $photo[0][field('phoUrl')],
                    'width' => 120,
                    'height'=>100,
                    'class' => 'img'
                );
                $html.= '<div class="photo">' . img($att) . '</div>';
                $html.= '<div class="content">';
                $html.= subString($row[field('proName')],15);
//            $html.= $row[field('proName')];
                $price = unserialize($row[field('proPrice')]);
                if ($price['hide_show'] != 'hide') {
                    $html.= '<label class="price">' . $this->lang->line('currency') . $price['price'] . '</label>';
                }
                $html.= '<label class="order">';
                $html.=anchor('site/products/detail/' . $row[field('proId')], 'Details', 'class="btn"');
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
        }
        ?>

        <div class="pager"><?php echo $this->pagination->create_links(); ?></div>
    </div>
    <div class="span4">
        <div>
            <h3 class="page-head"><?php echo $this->lang->line('men_category'); ?></h3>
            <?php
            if ($cats->num_rows() > 0) {
                echo '<ul class="category sidebar-content">';
                foreach ($cats->result_array() as $row) {
                    ?>
                    <li class="category-item"><?php echo anchor('site/products/category/' . $row[field('catId')], $row[field('catName')]); ?></li>
                    <?php
                }
                echo '</ul>';
            }
            ?>
        </div>
        <div>
            <h3 class="page-head"><?php echo $this->lang->line('men_group'); ?></h3>
            <?php
            if ($cats->num_rows() > 0) {
                echo '<ul class="category sidebar-content">';
                foreach ($gros->result_array() as $row) {
                    ?>
                    <li class="group-item"><?php echo anchor('site/products/group/' . $row[field('groId')], $row[field('groName')]); ?></li>
                    <?php
                }
                echo '</ul>';
            }
            ?>
        </div>
        <div>
            <h3 class="page-head"><?php echo $this->lang->line('find_us'); ?></h3>
            <?php
            echo facebook_like();
            ?>
        </div>

    </div>
</div>