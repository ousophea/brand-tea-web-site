<?php echo form_open($this->uri->segment(1) . '/addnew'); ?>
<div class="holder">
    <div class="sub-title">
        <?php
        echo validation_errors();
        ?>
    </div>

    <div class="action">
        <?php echo form_submit('save', $this->lang->line('save'), 'class="add"'); ?>
        <?php echo anchor($this->uri->segment(1), $this->lang->line('cancel'), 'class="button cancel"'); ?>
    </div>
    <div style="clear:both"></div>
</div>
<table cellspacing="0" style="width:624px"> 

    <tr> 
        <td width="100" valign="middle">
            <label for="name"><?php echo $this->lang->line('group_name'), $this->lang->line('require'); ?></label>
            <?php echo form_input('txt_gro_name', $this->input->post('txt_gro_name') ? $this->input->post('txt_gro_name') : '', 'id="name"'); ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php
            $options[' '] = '--Select Category--';
            foreach ($cats->result_array() as $cat) {
                $options[$cat[field('catId')]] = $cat[field('catName')];
            }
            ?>
            <label for="cate"><?php echo $this->lang->line('description'),$this->lang->line('require'); ?></label>
            <?php
            echo form_dropdown('dro_cat_name', $options, $this->input->post('dro_cat_name') ? $this->input->post('dro_cat_name') : ' ','id="cate"');
            ?>
        </td>
    </tr>
    <tr> 
        <td width="100" valign="middle">
            <label for="name-1"><?php echo $this->lang->line('description'); ?></label>
            <?php echo form_textarea('txt_gro_dec', $this->input->post('txt_gro_dec') ? $this->input->post('txt_gro_dec') : '', 'id="name-1"'); ?>
        </td>
    </tr>
</table>
<?php echo form_close(); ?>