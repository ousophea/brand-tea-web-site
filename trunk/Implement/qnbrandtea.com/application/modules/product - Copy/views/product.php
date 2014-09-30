<div id="translation_form">
    <div class="holder">

        <div class="sub-title" style=""> 
            <div class="sub_title_text">
            <?php
        
            echo $this->session->userdata('ms') ? $this->session->userdata('ms') : '';
            $this->session->unset_userdata('ms');
            ?>
            </div><br />
            <div style="width: 80%; margin: 0 auto; border: none; border-left: 5px solid #E66222; background: #efefef; padding: 10px;">
                <?php
                // Connect Facebook
                $user = $this->facebook->getUser();
                if ($user) {
                    echo 'You have logged in facebook account!';
                } else {
                    echo 'You are not login! ';
                    echo '<a href="' . $this->facebook->getLoginUrl(array('scope' => 'manage_pages, publish_stream', 'redirect-uri' => base_url() . 'product')) . '">Login</a>';
                }
                ?>
            </div>
            <br />
            <div class="translation">
                <?php
                echo form_open('translation/translate', 'translate');
                $opts[' '] = '--Translate--';
                foreach ($langs->result_array() as $lang) {
                    $opts[$lang[field('langId')]] = $lang[field('langName')];
                }
                echo form_dropdown('dro_translate', $opts, ' ', 'class="dro_translate"');

                echo form_close();
                $rules = array(
                    'view' => 'product/product_translation',
                    'data' => serialize($pros->result_array())
                );
                ?>
                <label style="display: none" class="translation_rule"><?php echo base64_encode(serialize($rules)); ?></label>
            </div>
            
        </div>

        <div class="action"><?php echo anchor($this->uri->segment(1) . '/addnew', $this->lang->line('new'), 'class="button add"'); ?></div>
        <div style="clear:both"></div>
    </div>

    <table class="tablesorter" cellspacing="0"> 
        <thead> 
            <tr> 
                <th  width="10">T</th>
                <th  width="50">Nº</th> 
                <th colspan="2">Title</th> 
                <th>Price</th>
                <th>Quantity</th> 
                <th>Action</th>
            </tr> 
        </thead> 
        <tbody> 
            <?php
            $i = 0;
            foreach ($pros->result_array() as $pro) {
                $i++;
                $qty = unserialize($pro[field('proQty')]);
                $price = unserialize($pro[field('proPrice')]);
                ?>
                <tr> 
                    <td><input type="checkbox" name="ch_translate" value="<?php echo $pro[field('proId')] ?>" class="ch_translate" /></td>
                    <td><?php echo $i; ?></td> 
                    <td><?php echo $pro[field('proName')]; ?></td> 
                    <td width="100" id="translate-<?php echo $pro[field('proId')]; ?>">
                        <input type="hidden" value="<?php echo table('proLang'); ?>" name="table-translate-<?php echo $pro[field('proId')]; ?>" />
                        <input type="hidden" value="<?php echo field('proId'); ?>" name="field-translate-<?php echo $pro[field('proId')]; ?>" />
                    </td>
                    <td><?php echo $price['price']; ?> [<?php echo $price['hide_show'] ?>]</td> 

                    <td width="100"><?php echo $qty['qty']; ?> [<?php echo $qty['hide_show'] ?>]</td>
                    <td width="200" align="center">
                        <?php echo anchor($this->uri->segment(1) . '/edit/' . $pro[field('proId')], 'Edit'); ?>
                        |
    <?php echo anchor($this->uri->segment(1) . '/delete/' . $pro[field('proId')], 'Delete', 'onclick="return confirm(\'Are you sure want to delete?\n Data can not return back!\');"'); ?>
                    </td>
                </tr> 
                <?php
            }
            ?>

        </tbody> 
    </table>
    <div class="pagination"><?php echo $this->pagination->create_links(); ?></div>
</div>