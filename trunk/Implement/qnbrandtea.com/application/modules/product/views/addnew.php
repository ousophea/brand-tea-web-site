<?php echo form_open_multipart($this->uri->segment(1) . '/addnew'); ?>
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
<div style="float: left; width: 50%;">
    <h2><?php echo $this->lang->line('men_product'); ?></h2>
    <table cellspacing="0" style="min-width: 10px;"> 

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
                    $options[$gro[field('groId')]] = $gro[field('groName')] . '-->' . $gro[field('catName')];
                }
                ?>
                <label for="gro"><?php echo $this->lang->line('description'), $this->lang->line('require'); ?><small> (Group's name --> Category's name)</small></label>
                <?php
                echo form_dropdown('dro_gro_name', $options, $this->input->post('dro_gro_name') ? $this->input->post('dro_gro_name') : ' ', 'id="gro"');
                ?>
            </td>
        </tr>
        <tr> 
            <td width="100" valign="middle">
                <label for="name-1"><?php echo $this->lang->line('description'); ?></label>
                <?php echo form_textarea('txt_pro_dec', $this->input->post('txt_pro_dec') ? $this->input->post('txt_pro_dec') : '', 'id="name-1" class="tinyMCE"'); ?>
            </td>
        </tr>
        <tr>
            <td>
                <label>Photos <small>(Choose how many photos you want)</small></label>
                <?php echo form_upload('photo[]','','multiple="multiple" accept="image/gif,image/jpeg,image/png"'); ?>
            </td>
        </tr>
        <tr>
            <td>
                <label for="name-1"><?php echo $this->lang->line('field'); ?></label>
                <div id='fields'></div>
            </td>
        </tr>
    </table>


</div>
<div  style="float: left; width: 40%;">
    <h2><?php echo $this->lang->line('men_tea_related'); ?></h2>
    <table  style="min-width: 10px;">
        <?php
        foreach ($pros->result_array() as $pro) {
            ?>
            <tr>
                <td><?php echo '<label for="'.$pro[field('proId')].'">', form_checkbox('ch_tea_related[]', $pro[field('proId')],$this->input->post('ch_tea_related')?$this->input->post('ch_tea_related'):'','id="'.$pro[field('proId')].'"'),  ' '.$pro[field('proName')].'</label>';?></td>
            </tr>
            <?php
        }
        ?>

    </table>
</div>
<div style="clear:both"></div>
<?php echo form_close(); ?>