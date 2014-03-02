<?php echo form_open_multipart($this->uri->segment(1) . '/addnew','class="product-form"'); ?>
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
    <div class="">
       <label for="posttofacebook"> <input type="checkbox" name="posttofacebook" id="posttofacebook" value="yes" /> Post to facebook</label>
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
                <?php echo form_checkbox('ch_price_hide', 'hide','','class="existingHideShow"'); echo '<input  type="hidden" value="show" name="price_hide_show" /> ', $this->lang->line('hide');?>
            </td>
        </tr>
        <tr> 
            <td width="100" valign="middle">
                <label for="qty"><?php echo $this->lang->line('qty'), $this->lang->line('require'); ?><small> (Number only)</small></label>
                <?php echo form_input('txt_pro_qty', $this->input->post('txt_pro_qty') ? $this->input->post('txt_pro_qty') : '', 'id="qty" required'); ?>
                <?php echo form_checkbox('ch_qty_hide', 'hide','','class="existingHideShow"'); echo '<input  type="hidden" value="show" name="qty_hide_show" /> ', $this->lang->line('hide');?>
                
            </td>
        </tr>
        <tr>
            <td>
                <?php
                $options[' '] = '--Select Category--';
                foreach ($gros->result_array() as $gro) {
                    $options[$gro[field('groId')]] =   $gro[field('catName')]. '-->' . $gro[field('groName')];
                }
                ?>
                <label for="gro"><?php echo $this->lang->line('men_category'), $this->lang->line('require'); ?><small> (Category's name --> Group's name)</small></label>
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
                <label><?php echo $this->lang->line('main_photo'), $this->lang->line('require'); ?> <small>(Choose main photo)</small></label>
                <?php echo form_upload('main_photo[]','',' accept="image/gif,image/jpeg,image/png" class="pro_photo"'); ?>
            </td>
        </tr>
        
        <tr>
            <td>
                <label><?php echo $this->lang->line('photo');?> <small>(Choose how many photos you want)</small></label>
                <?php echo form_upload('photo[]','','multiple="multiple" accept="image/gif,image/jpeg,image/png" class="pro_photo"'); ?>
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
    
    <h2><?php echo $this->lang->line('related_product'); ?></h2>
    <table  style="min-width: 10px;">
        <?php
        if($pros->num_rows>0){
            
        }else{
            echo $this->lang->line('ms_no_record_found');
        }
        foreach ($pros->result_array() as $pro) {
            ?>
            <tr>
                <td><?php echo '<label for="'.$pro[field('proId')].'">', form_checkbox('ch_tea_related[]', $pro[field('proId')],  '','id="'.$pro[field('proId')].'" '.set_checkbox('ch_tea_related',$pro[field('proId')])),  ' '.$pro[field('proName')].'</label>';?></td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>
<div  style="float: left; width: 40%;">
    <h2><?php echo $this->lang->line('related_knowledge'); ?></h2>
    <table  style="min-width: 10px;">
        <?php
        if($relateds->num_rows>0){
            
        }else{
            echo $this->lang->line('ms_no_record_found');
        }
        foreach ($relateds->result_array() as $pro) {
            ?>
            <tr>
                <td><?php echo '<label for="knowledge-'.$pro[field('teaId')].'">', form_checkbox('ch_tea_knowledge[]', $pro[field('teaId')],  '','id="knowledge-'.$pro[field('teaId')].'" '.set_checkbox('ch_tea_knowledge',$pro[field('teaId')])),  ' '.$pro[field('teaTitle')].'</label>';?></td>
            </tr>
            <?php
        }
        ?>

    </table>
</div>
<div style="clear:both"></div>
<?php echo form_close(); ?>