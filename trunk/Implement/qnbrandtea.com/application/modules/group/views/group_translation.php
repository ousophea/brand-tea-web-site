<?php
echo form_open('group/translation/' . $itemId . '/' . $langId);
echo form_hidden('lan_title', $langTitle);
echo form_hidden('item_id', $itemId);
echo form_hidden('lang_id', $langId);
?>
<div class="holder">
    <div class="sub-title"><h2>Translate to <?php echo $langTitle; ?></h2>
        <?php
        echo validation_errors();
        ?>
    </div>

    <div class="action">
        <?php echo form_submit('save', $this->lang->line('save'), 'class="add"'); ?>
        <?php echo anchor('group', $this->lang->line('cancel'), 'class="button cancel"'); ?>
    </div>
    <div style="clear:both"></div>
</div>
<?php
$gros = unserialize($items);
$action = 'insert';
// Check existing data
$this->load->model('group/mod_group');
$langData = $this->mod_group->checkLang($itemId, $langId);
if ($langData->num_rows() > 0) {
    $gros = $langData->result_array();
    $action = 'update';
}
echo form_hidden('action', $action);
echo form_hidden('item_data', serialize($gros));
foreach ($gros as $gro) {
    if ($gro[field('groId')] == $itemId) {
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
                <td width="100" valign="middle">
                    <label for="name-1"><?php echo $this->lang->line('description'); ?></label>
                    <?php echo form_textarea('txt_gro_des', $this->input->post('txt_gro_dec') ? $this->input->post('txt_gro_dec') : $gro[field('groDes')], 'id="name-1"'); ?>
                </td>
            </tr>
        </table>
        <?php
        break;
    }
}
?>
<?php echo form_close(); ?>