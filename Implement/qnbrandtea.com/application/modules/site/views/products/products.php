<div style="height: 10px;"></div>
<div class="row-fluid">
    <div class="span8">
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