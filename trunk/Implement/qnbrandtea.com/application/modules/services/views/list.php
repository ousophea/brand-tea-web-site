<div id="translation_form">
    <div class="holder">
        <div class="sub-title"> <?php echo $this->session->userdata('ms') ? $this->session->userdata('ms') : '';
$this->session->unset_userdata('ms'); ?>
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
                    'view' => 'services/service_translation',
                    'data' => (serialize($tearelated->result_array()))
                );
                ?>
                <label style="display: none" class="translation_rule"><?php echo base64_encode(serialize($rules)); ?></label>
            </div>
        </div>
        <div class="action"><?php echo anchor('services/addnew', $this->lang->line('new'), 'class="button add"'); ?></div>
        <div style="clear:both"></div>
    </div>
    <table class="tablesorter" cellspacing="0"> 
        <thead> 
            <tr> 
                <th  width="10">T</th>
                <th  width="25">Nº</th> 
                <th colspan="2">Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Action</th> 
            </tr> 
        </thead> 
        <tbody> 
            <?php
            $i = 0;
            foreach ($tearelated->result_array() as $tea) {
                $i++;
                ?>
                <tr> 
                    <td><input type="checkbox" name="ch_translate" value="<?php echo $tea[field('serId')] ?>" class="ch_translate" /></td>
                    <td><?php echo $i; ?></td> 
                    <td><?php echo $tea[field('serTitle')]; ?></td>
                    <td width="100" id="translate-<?php echo $tea[field('serId')]; ?>">
                        <input type="hidden" value="<?php echo table('serLang'); ?>" name="table-translate-<?php echo $tea[field('serId')]; ?>" />
                        <input type="hidden" value="<?php echo field('serId'); ?>" name="field-translate-<?php echo $tea[field('serId')]; ?>" />
                    </td>
                    <td><?php echo substr($tea[field('serDesc')], 0, 150) . '...'; ?></td>
                    <td><?php
                        if ($tea[field('serStatus')] == 1) {
                            echo 'Active';
                        } else {
                            echo 'Inactive';
                        }
                        ?></th>
                    <td width="100" align="center">
                        <?php echo anchor('services/edit/' . $tea[field('serId')], 'Edit'); ?>
                        |
    <?php echo anchor('services/delete/' . $tea[field('serId')], 'Delete', 'onclick="return confirm(\'Are you sure want to delete?\n Data can not return back!\');"'); ?>
                    </td>
                </tr> 
                <?php
            }
            ?>
        </tbody> 
    </table>
    <div class="pagination"><?php echo $this->pagination->create_links(); ?></div>
</div>