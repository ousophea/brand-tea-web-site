<div style="height: 10px;"></div>
<div class="row-fluid">
    <div class="span8">
        <h3 class="page-head"><?php echo $action; ?></h3>
        <div class="row-fluid span12">
            <?php
            echo br(1);
            foreach ($pros->result_array() as $row) {
                ?>
                <div class="span3">
                    <?php
                    $photo = Products::getPhoto($row[field('proId')], 1)->result_array();
                    $att = array(
                        'src' => PRODUCT_PHOTO_PATH .'250x250/'. $photo[0][field('phoUrl')],
                        'width' => 110,
                        'class' => 'img'
                    );
                    echo '<div class="photo">' . img($att) . '</div>';
                    echo '<div class="content">';
                    echo $row[field('proName')];
                    echo '<label class="price">' . $this->lang->line('currency'), $row[field('proPrice')] . '</label>';
                    echo '<label class="order">', anchor('site/products/detail/' . $row[field('proId')], 'Details', 'class="btn"'), '</label>';
                    echo '</div>';
                    ?>
                </div>
                <?php
            }
            ?>
        </div>
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