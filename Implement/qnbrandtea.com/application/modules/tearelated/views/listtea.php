<div id="translation_form">
<div class="holder">
    <div class="sub-title"> <?php echo $this->session->userdata('ms')?$this->session->userdata('ms'):''; $this->session->unset_userdata('ms');?>
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
                    'view' => 'tearelated/tea_translation',
                    'data' => (serialize($tearelated->result_array()))
                );
                ?>
                <label style="display: none" class="translation_rule"><?php echo base64_encode(serialize($rules)); ?></label>
            </div>
    </div>
    <div class="action"><?php echo anchor('tearelated/addnewtea', $this->lang->line('new'), 'class="button add"'); ?></div>
    <div style="clear:both"></div>
</div>
<table class="tablesorter" cellspacing="0"> 
    <thead> 
        <tr> 
           <th  width="10">T</th>
              <th  width="25">Nº</th> 
            <th>Title</th>
			 <th>Description</th>
			 <th>Status</th>
            <th>Action</th> 
        </tr> 
    </thead> 
    <tbody> 
        <?php
        $i=0;
        foreach ($tearelated->result_array() as $tea) {
            $i++;
            ?>
            <tr> 
                 <td><input type="checkbox" name="ch_translate" value="<?php echo $tea[field('teaId')] ?>" class="ch_translate" /></td>
                <td><?php echo $i;?></td> 
               <td><?php echo   $tea[field('teaTitle')];?></td>
			   <td><?php echo substr($tea[field('teaDesc')],0,150).'...';?></td>
			   <td><?php    			   			   
			   if($tea[field('teaStatus')] == 1){
			      echo 'Active';
			   }else{
			      echo 'Inactive';
			   }
			   ?></th>
              <td width="100" align="center">
                    <?php echo anchor('tearelated/edit/'.$tea[field('teaId')],'Edit'); ?>
                    |
                    <?php echo anchor('tearelated/delete/'.$tea[field('teaId')] ,'Delete','onclick="return confirm(\'Are you sure want to delete?\n Data can not return back!\');"'); ?>
                </td>
            </tr> 
            <?php
        }
        ?>
    </tbody> 
</table>
<div class="pagination"><?php echo $this->pagination->create_links(); ?></div>
</div>