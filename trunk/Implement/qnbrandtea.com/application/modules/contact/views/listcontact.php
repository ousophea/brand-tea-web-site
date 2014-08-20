<div id="translation_form">
    <div class="holder">
        <div class="sub-title">
            <div class="sub_title_text"> <?php
echo $this->session->userdata('ms') ? $this->session->userdata('ms') : '';
$this->session->unset_userdata('ms');
?>
            </div>
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
                    'view' => 'contact/contact_translation',
                    'data' => (serialize($contact->result_array()))
                );
                ?>
                <label style="display: none" class="translation_rule"><?php echo base64_encode(serialize($rules)); ?></label>
            </div>
        </div>
        <div style="clear:both"></div>
    </div>
    <table class="tablesorter" cellspacing="0"> 
        <thead> 
            <tr>     
                <th  width="10">T</th>
                <th>Contact</th>

                <th>Action</th> 
            </tr> 
        </thead> 
        <tbody> 
            <?php
            foreach ($contact->result_array() as $con) {
                ?>
                <tr>           
                    <td><input type="checkbox" name="ch_translate" value="<?php echo $con[field('conId')] ?>" class="ch_translate" /></td>
                    <td><?php echo $con[field('conDes')]; ?></td>
                    <td width="100" align="center">
                        <?php echo anchor('contact/editcontact/' . $con[field('conId')], 'Edit'); ?>
                    </td>
                </tr> 
                <?php
            }
            ?>
        </tbody> 
    </table>
</div>