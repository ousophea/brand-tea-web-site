<div id="translation_form">
    <div class="holder">
        <div class="sub-title red">
            <p><?php echo $this->session->userdata('ms')?$this->session->userdata('ms'):''; $this->session->unset_userdata('ms');?></p>
            
            <div class="translation">
            	<input type="checkbox" style="display:none;" checked name="ch_translate" value="<?php echo $services->row()->cont_id; ?>" class="ch_translate" />
                <?php
                echo form_open('translation/translate', 'translate');
                $opts[' '] = '--Translate--';
                foreach ($langs->result_array() as $lang) {
                    $opts[$lang[field('langId')]] = $lang[field('langName')];
                }
                echo form_dropdown('dro_translate', $opts, ' ', 'class="dro_translate"');

                echo form_close();
                $rules = array(
                    'view' => 'content/services/services_translation',
                    'data' => (serialize($services->result_array()))
                );
                ?>
                <label style="display: none" class="translation_rule"><?php echo base64_encode(serialize($rules)); ?></label>
            </div>
        </div>
    
        <div class="action"><?php echo anchor('content/services/edit', $this->lang->line('edit'), 'class="button edit"'); ?></div>
        <div style="clear:both"></div>
    </div>
    <br>
    <div class="holder">
        <h3><?php echo $this->lang->line('title'); ?>: <?php echo $services->row()->cont_name; ?></h3>
        <p><?php echo $services->row()->cont_description; ?></p>
        <br>
    </div>
</div>