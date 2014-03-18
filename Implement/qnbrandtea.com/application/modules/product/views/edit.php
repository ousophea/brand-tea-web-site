<?php echo form_open_multipart($this->uri->segment(1) . '/edit/' . $this->uri->segment(3)); ?>
<input type="hidden" value="<?php echo $currentPro[field('groId')]; ?>" name="gro_id" id="gro_id" />
<input type="hidden" value="<?php echo $currentPro[field('proId')]; ?>" name="pro_id" id="pro_id" />
<input type="hidden" value="<?php echo $currentPro[field('proName')]; ?>" name="hid_pro_name" />


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
<div style="float: left; width: 50%;">
    <h2><?php echo $this->lang->line('men_product'); ?></h2>

    <table cellspacing="0" style="min-width: 10px;"> 

        <tr> 
            <td width="100" valign="middle">
                <label for="name"><?php echo $this->lang->line('pro_name'), $this->lang->line('require'); ?></label>
                <?php echo form_input('txt_pro_name', $this->input->post('txt_pro_name') ? $this->input->post('txt_pro_name') : $currentPro[field('proName')], 'id="name"  required'); ?>
            </td>
        </tr>
        <tr> 
            <td width="100" valign="middle">
                <label for="price"><?php echo $this->lang->line('price'), $this->lang->line('require'); ?><small> (Number only)</small></label>
                <?php
                $price = unserialize($currentPro[field('proPrice')]);
                $qty = unserialize($currentPro[field('proQty')]);
                ?>
                <?php echo form_input('txt_pro_price', $this->input->post('txt_pro_price') ? $this->input->post('txt_pro_price') : $price['price'], 'id="price" required'); ?>
                <?php
                $check = '';
                if ($price['hide_show'] == 'hide') {
                    $check = 'checked="checked"';
                }
                ?>
                <?php
                echo form_checkbox('ch_price_hide', 'hide', '', 'class="existingHideShow" ' . $check);
                echo '<input  type="hidden" value="'.$price['hide_show'].'" name="price_hide_show" /> ', $this->lang->line('hide');
                ?>
            </td>
        </tr>
        <tr> 
            <td width="100" valign="middle">
                <label for="qty"><?php echo $this->lang->line('qty'), $this->lang->line('require'); ?><small> (Number only)</small></label>
                <?php echo form_input('txt_pro_qty', $this->input->post('txt_pro_qty') ? $this->input->post('txt_pro_qty') : $qty['qty'], 'id="qty" required'); ?>
                <?php
                $check = '';
                if ($qty['hide_show'] == 'hide') {
                    $check = 'checked="checked"';
                }
                ?>
                <?php
                echo form_checkbox('ch_qty_hide', 'hide', '', 'class="existingHideShow" ' . $check);

                echo '<input  type="hidden" value="'.$qty['hide_show'].'" name="qty_hide_show" /> ', $this->lang->line('hide');
                ?>
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
                echo form_dropdown('dro_gro_name', $options, $currentPro[field('groId')], 'id="gro"');
                ?>
            </td>
        </tr>
        <tr> 
            <td width="100" valign="middle">
                <label for="name-1"><?php echo $this->lang->line('description'); ?></label>
                <?php echo form_textarea('txt_pro_dec', $this->input->post('txt_pro_dec') ? $this->input->post('txt_pro_dec') : $currentPro[field('proDes')], 'id="name-1" class="tinyMCE"'); ?>
            </td>
        </tr>
        <tr>
            <td>
                <label>Main Photos <small>(Choose how many photos you want)</small></label>
                <?php echo form_upload('main_photo[]', '', ' accept="image/gif,image/jpeg,image/png"'), '<br />'; ?>
                <?php
                foreach ($photos->result_array() as $row) {
                    $att = array(
                        'src' => 'uploads/products/100x100/' . $row[field('phoUrl')]
                    );
                    if ($row[field('isMainPhoto')] == 1) {
                        echo form_hidden('hid_main_photo',$row[field('phoUrl')]);
                        echo '<br />' . img($att) . '';
                        break;
                    }
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <label>Photos <small>(Choose how many photos you want)</small></label>
                <?php echo form_upload('photo[]', '', 'multiple="multiple" accept="image/gif,image/jpeg,image/png"'), '<br />'; ?>
                <?php
                foreach ($photos->result_array() as $row) {
                    $att = array(
                        'src' => 'uploads/products/100x100/' . $row[field('phoUrl')]
                    );
                    if ($row[field('isMainPhoto')] == 0) {
//                        echo '<br />' . img($att) . '<input class="button remove" type="button" value="Remove" />';
                        echo '<label class="./uploads/products/' . $row[field('phoUrl')] . '" id=' . $row[field('phoId')] . '>' . img($att) . '<input class="button remove" type="button" value="Remove" /></label>';
                    }
                }
                ?>
            </td>
        </tr>
        <tr>
            <td>
                <label for="name-1"><?php echo $this->lang->line('field'); ?></label>
                <div id='fields'>
                    <?php
                    // Generate HTML
                    $fields = unserialize($currentPro[field('proField')]);
                    $html = '';
                    $k = 0;
                    foreach ($fields['label'] as $field) {
                        $html .='<input type="hidden" value="' . $fields['label'][$k] . '" name="label[]" />';
                        $html .='<label for="feilds-' . $k . '">' . $fields['label'][$k] . '</label> <input id="feilds-' . $k . '" type="text" name="field[]" value="' . $fields['field'][$k] . '">';
                        $check = '';
                        if ($fields['hide_show'][$k] == 'hide') {
                            $check = 'checked="checked"';
                        }
                        $html.='<input ' . $check . ' class="hideShow" type="checkbox" name="hide-show[]" value="' . $fields['hide_show'][$k] . '" /> ' . $this->lang->line('hide');
                        $html.='<input type="hidden" name="hide_show[]" value="' . $fields['hide_show'][$k] . '" />';
                        $k++;
                    }
                    echo $html;
                    ?>
                </div>
            </td>
        </tr>
    </table>


</div>
<div  style="float: left; width: 40%;">
    <h2><?php echo $this->lang->line('related_product'); ?></h2>
    <?php
    $proRelated = (unserialize($currentPro[field('proRelated')]));
    
    ?>
    <table  style="min-width: 10px;">
        <?php
        // In case not seleted related product
        $related = array();
        foreach ($pros->result_array() as $pro) {
            // Check selected product related
            $checked = FALSE;
            if (in_array($pro[field('proId')], is_array($proRelated) ? $proRelated : $related)) {
                $checked = TRUE;
            }
            // check current product
            if ($pro[field('proId')] == $currentPro[field('proId')])
                continue;
            ?>
            <tr>
                <td><?php echo '<label for="' . $pro[field('proId')] . '">', form_checkbox('ch_tea_related[]', $pro[field('proId')], $checked, 'id="' . $pro[field('proId')] . '"'), ' ' . $pro[field('proName')] . '</label>'; ?></td>
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
        if ($relateds->num_rows > 0) {
            
        } else {
            echo $this->lang->line('ms_no_record_found');
        }
        $proRelated1 = (unserialize($currentPro[field('proKnowledge')]));
        $related1 = array();
        foreach ($relateds->result_array() as $pro) {
            $checked = FALSE;
            if (in_array($pro[field('teaId')], is_array($proRelated1) ? $proRelated1 : $related1)) {
                $checked = TRUE;
            }
            ?>
            <tr>
                <td><?php echo '<label for="knowledge-' . $pro[field('teaId')] . '">', form_checkbox('ch_tea_knowledge[]', $pro[field('teaId')], $checked, 'id="knowledge-' . $pro[field('teaId')] . '"'), ' ' . $pro[field('teaTitle')] . '</label>'; ?></td>
            </tr>
            <?php
        }
        ?>

    </table>
</div>
<div style="clear:both"></div>
<?php echo form_close(); ?>