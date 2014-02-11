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
            <label for="name"><?php echo $this->lang->line('pro_name'), $this->lang->line('require'); ?></label>
            <?php echo form_input('txt_pro_name', $this->input->post('txt_pro_name') ? $this->input->post('txt_pro_name') : '', 'id="name"  required'); ?>
        </td>
    </tr>
    <tr> 
        <td width="100" valign="middle">
            <label for="price"><?php echo $this->lang->line('price'), $this->lang->line('require'); ?><small> (Number only)</small></label>
            <?php echo form_input('txt_pro_price', $this->input->post('txt_pro_price') ? $this->input->post('txt_pro_price') : '', 'id="qty" required'); ?>
        </td>
    </tr>
    <tr> 
        <td width="100" valign="middle">
            <label for="qty"><?php echo $this->lang->line('qty'), $this->lang->line('require'); ?><small> (Number only)</small></label>
            <?php echo form_input('txt_pro_qty', $this->input->post('txt_pro_qty') ? $this->input->post('txt_pro_qty') : '', 'id="qty" required'); ?>
        </td>
    </tr>
    <tr>
        <td>
            <?php
            $options[' '] = '--Select Group--';
            foreach ($gros->result_array() as $gro) {
                $options[$gro[field('groId')]] = $gro[field('groName')].'-->'.$gro[field('catName')];
            }
            ?>
            <label for="gro"><?php echo $this->lang->line('description'),$this->lang->line('require'); ?><small> (Group's name --> Category's name)</small></label>
            <?php
            echo form_dropdown('dro_gro_name', $options, $this->input->post('dro_gro_name') ? $this->input->post('dro_gro_name') : ' ','id="gro"');
            ?>
        </td>
    </tr>
    <tr> 
        <td width="100" valign="middle">
            <label for="name-1"><?php echo $this->lang->line('description'); ?></label>
            <?php echo form_textarea('txt_pro_dec', $this->input->post('txt_pro_dec') ? $this->input->post('txt_pro_dec') : '', 'id="name-1"'); ?>
        </td>
    </tr>
    <tr>
        <td>
            <label for="name-1"><?php echo $this->lang->line('field'); ?></label>
            <div id='fields'></div>
        </td>
    </tr>
</table>
<?php echo form_close(); ?>