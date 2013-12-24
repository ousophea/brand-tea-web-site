<?php echo form_open($this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . $this->uri->segment(3)); ?>
<div class="holder">
    <div class="sub-title">
         <?php
            echo validation_errors();
        ?>
    </div>

    <div class="action">
        <?php echo form_submit('update', $this->lang->line('update'), 'class="add"'); ?>
        <?php echo anchor('category', $this->lang->line('cancel'), 'class="button cancel"'); ?>
    </div>
    <div style="clear:both"></div>
</div>
<?php
foreach ($cats->result_array() as $cat) {
    $fields = unserialize($cat[field('catField')]);
//    print_r($fields);
    // Create hidden for categery name to check existing name
    echo form_hidden('hid_cat_name', $cat[field('catName')]);
    ?>
    <table cellspacing="0" style="width:624px"> 
        <tr> 
            <td width="100" valign="middle">
                <label for="cate"><?php echo $this->lang->line('cate_name'), $this->lang->line('require'); ?></label>
                <?php echo form_input('txt_cate_name', $this->input->post('txt_cate_name') ? $this->input->post('txt_cate_name') : $cat[field('catName')], 'id="cate"'); ?>
            </td>
        </tr>
        <tr> 
            <td width="100" valign="middle">
                <label for="cate-1"><?php echo $this->lang->line('description'); ?></label>
                <?php echo form_textarea('txt_cate_dec', $this->input->post('txt_cate_dec') ? $this->input->post('txt_cate_dec') : $cat[field('catDes')], 'id="cate-1"'); ?>
            </td>
        </tr>
        <tr> 
            <td width="100" valign="middle">
                <label for="cate-2"><?php echo $this->lang->line('field'); ?></label>
                <a href="#add" class="button add category-add" id="add"><?php echo $this->lang->line('new'); ?></a>
                <div id="category-add">
                    <?php
                    if (is_array($fields)) {
//                        print_r($fields);
                        $k=0;
                        foreach ($fields['label'] as $field) {
//                            print_r($field);
                            ?>
                            <div>
                                <br /><label>Label <input type="text" name="label[]" value="<?php echo $fields['label'][$k] ?>"></label>
                                <label>Name <input type="text" name="field[]" value="<?php echo $fields['field'][$k] ?>"></label>
                                <input type="button" class="delete button" value="Delete">
                            </div>
                            <?php
                            $k++;
                        }
                    }
                    ?>
                </div>
            </td>
        </tr>
    </table>
<?php } ?>
<?php echo form_close(); ?>