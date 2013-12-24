<?php echo form_open('category/addnew'); ?>
<div class="holder">
    <div class="sub-title"></div>

    <div class="action">
        <?php echo form_submit('save', $this->lang->line('save'), 'class="add"'); ?>
        <?php echo anchor('category',$this->lang->line('cancel'), 'class="button cancel"');?>
    </div>
    <div style="clear:both"></div>
</div>
<table cellspacing="0" style="width:624px"> 
    <tr> 
        <td width="100" valign="middle">
            <label for="cate"><?php echo $this->lang->line('cate_name'), $this->lang->line('require'); ?></label>
            <?php echo form_input('txt_cate_name', $this->input->post('txt_cate_name') ? $this->input->post('txt_cate_name') : '', 'id="cate"'); ?>
        </td>
    </tr>
    <tr> 
        <td width="100" valign="middle">
            <label for="cate-1"><?php echo $this->lang->line('description'); ?></label>
            <?php echo form_textarea('txt_cate_dec', $this->input->post('txt_cate_dec') ? $this->input->post('txt_cate_dec') : '', 'id="cate-1"'); ?>
        </td>
    </tr>
    <tr> 
        <td width="100" valign="middle">
            <label for="cate-2"><?php echo $this->lang->line('field'); ?></label>
            <a href="#" class="button add category-add" id="add"><?php echo $this->lang->line('new'); ?></a>
            <div id="category-add"></div>
        </td>
    </tr>
</table>
<?php echo form_close(); ?>