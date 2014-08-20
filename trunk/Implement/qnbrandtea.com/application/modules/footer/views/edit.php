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
foreach ($footers->result_array() as $foot) {
    $fields = unserialize($foot->foo_title);
//    print_r($fields);
    // Create hidden for categery name to check existing name
    echo form_hidden('hid_foo_name', $foot->foo_title);
    ?>
    <table cellspacing="0" style="width:624px"> 
        <tr> 
            <td width="100" valign="middle">
                <label for="cate"><?php echo $this->lang->line('cate_name'), $this->lang->line('require'); ?></label>
                <?php echo form_input('txt_foo_name', $this->input->post('txt_foo_name') ? $this->input->post('txt_foo_name') : $foot->foo_name, 'id="foot"'); ?>
            </td>
        </tr>
<!--        <tr> 
            <td width="100" valign="middle">
                <label for="cate-1"><?php echo $this->lang->line('description'); ?></label>
                <?php echo form_textarea('txt_cate_dec', $this->input->post('txt_cate_dec') ? $this->input->post('txt_cate_dec') : $cat[field('catDes')], 'id="cate-1"'); ?>
            </td>
        </tr>
        -->
    </table>
<?php } ?>
<?php echo form_close(); ?>