<?php echo form_open($this->uri->segment(1) . '/edit/'.$this->uri->segment(3)); ?>
<div class="holder">
    <div class="sub-title">
        <?php
        echo validation_errors();
        ?>
    </div>

    <div class="action">
        <?php echo form_submit('update', $this->lang->line('update'), 'class="add"'); ?>
        <?php echo anchor($this->uri->segment(1), $this->lang->line('cancel'), 'class="button cancel"'); ?>
    </div>
    <div style="clear:both"></div>
</div>
<?php
    foreach($gros->result_array() as $gro){
        
    echo form_hidden('hid_gro_name', $gro[field('groName')]);
?>
<table cellspacing="0" style="width:624px"> 

    <tr> 
        <td width="100" valign="middle">
            <label for="name"><?php echo $this->lang->line('group_name'), $this->lang->line('require'); ?></label>
            <?php echo form_input('txt_gro_name', $this->input->post('txt_gro_name') ? $this->input->post('txt_gro_name') : $gro[field('groName')], 'id="name"'); ?>
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
            <label for="cate"><?php echo $this->lang->line('men_category'),$this->lang->line('require'); ?></label>
            <?php
            echo form_dropdown('dro_cat_name', $options, $this->input->post('dro_cat_name') ? $this->input->post('dro_cat_name') : $gro[field('catId')],'id="cate"');
            ?>
        </td>
    </tr>
    <tr> 
        <td width="100" valign="middle">
            <label for="name-1"><?php echo $this->lang->line('description'); ?></label>
            <?php echo form_textarea('txt_gro_des', $this->input->post('txt_gro_dec') ? $this->input->post('txt_gro_dec') : $gro[field('groDes')], 'id="name-1"'); ?>
        </td>
    </tr>
</table>
    <?php }?>
<?php echo form_close(); ?>