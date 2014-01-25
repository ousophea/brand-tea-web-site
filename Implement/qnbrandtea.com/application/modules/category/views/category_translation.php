<?php 
echo form_open('category/category_translation/' . $itemId . '/' . $langId);
echo form_hidden('lan_title', $langTitle);
echo form_hidden('pro_id',$itemId);
echo form_hidden('lang_id',$langId);
?>
<div class="holder">
    <div class="sub-title"><h2>Translate to <?php echo $langTitle; ?></h2>
         <?php
            echo validation_errors();
        ?>
    </div>

    <div class="action">
        <?php echo form_submit('save', $this->lang->line('save'), 'class="add"'); ?>
        <?php echo anchor('category', $this->lang->line('cancel'), 'class="button cancel"'); ?>
    </div>
    <div style="clear:both"></div>
</div>
<?php
$cats = unserialize($items);
$action ='insert';
// Check existing data
$this->load->model('category/mod_category');
$langData = $this->mod_category->checkLang($itemId, $langId);
if($langData->num_rows()>0){
    $cats = $langData->result_array();
    $action='update';
}
echo form_hidden('action', $action);
echo form_hidden('item_data', serialize($cats));
foreach ($cats as $cat) {
    if ($cat[field('catId')] == $itemId) {
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
                <div id="category-add">
                    <?php
                    if (is_array($fields)) {
//                        print_r($fields);
                        $k=0;
                        foreach ($fields['label'] as $field) {
//                            print_r($field);
                            ?>
                            <div>
                                <br /><label><?php echo $this->lang->line('name');?> <input type="text" name="label[]" value="<?php echo $fields['label'][$k] ?>"></label>
                                <label><?php echo $this->lang->line('value');?> <input type="text" name="field[]" value="<?php echo $fields['field'][$k] ?>"></label>
                                
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
<?php }} ?>
<?php echo form_close(); ?>