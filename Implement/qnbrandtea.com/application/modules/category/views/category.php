<div id="translation_form">
    <div class="holder">
        <div class="sub-title"> <?php echo $this->session->userdata('ms') ? $this->session->userdata('ms') : '';
$this->session->unset_userdata('ms');
?>
            <div class="translation">
                <?php
                echo form_open('translation/translate', 'translate');
                $opts[' '] = '--Translate--';
                foreach ($langs->result_array() as $lang) {
                    $opts[$lang[field('langId')]] = $lang[field('langName')];
                }
                echo form_dropdown('dro_translate', $opts, ' ', 'class="dro_translate"');

                echo form_close();
                $rules = array(
                    'view' => 'category/category_translation',
                    'data' => serialize($cats->result_array())
                );
                ?>
                <label style="display: none" class="translation_rule"><?php echo serialize($rules); ?></label>
            </div>
        </div>

        <div class="action"><?php echo anchor('category/addnew', $this->lang->line('new'), 'class="button add"'); ?></div>
        <div style="clear:both"></div>
    </div>
    <table class="tablesorter" cellspacing="0"> 
        <thead> 
            <tr> 
                <th  width="10">T</th>
                <th  width="25">Nº</th> 
                <th>Name</th> 
                <th>Description</th>
                <th  width="150">Field</th> 
                <th>Action</th>
            </tr> 
        </thead> 
        <tbody> 
            <?php
            $i = 0;
            foreach ($cats->result_array() as $cat) {
                $i++;
                ?>
                <tr> 
                    <td><input type="checkbox" name="ch_translate" value="<?php echo $cat[field('catId')] ?>" class="ch_translate" /></td>
                    <td><?php echo $i; ?></td> 
                    <td><?php echo $cat[field('catName')]; ?></td> 
                    <td><?php echo $cat[field('catDes')]; ?></td> 
                    <td width="100">
                        <?php
                        $fields = unserialize($cat[field('catField')]);
                        if (is_array($fields['label']) && count($fields['label'])>0) {
//                        print_r($fields);
                            $k = 0;
                            
                            foreach ($fields['label'] as $field) {
//                            print_r($field);
                                ?>
                                <div>
                                    <?php 
                                    echo 'Label: ';
                                    echo $fields['label'][$k];
                                    echo '<br />'.$this->lang->line('value').': ';
                                    echo $fields['field'][$k],'<br /><br />';
                                    ?>
                                </div>
                                <?php
                                $k++;
                            }
                        }
                        ?>
                    </td>
                    <td width="100" align="center">
                        <?php echo anchor('category/edit/' . $cat[field('catId')], 'Edit'); ?>
                        |
    <?php echo anchor('category/delete/' . $cat[field('catId')], 'Delete', 'onclick="return confirm(\'Are you sure want to delete?\n Data can not return back!\');"'); ?>
                    </td>
                </tr> 
                <?php
            }
            ?>

        </tbody> 
    </table>
    <div class="pagination"><?php echo $this->pagination->create_links(); ?></div>
</div>