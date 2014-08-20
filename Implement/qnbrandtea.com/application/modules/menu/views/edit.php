<?php echo form_open($this->uri->segment(1) . '/' . $this->uri->segment(2) . '/' . $this->uri->segment(3)); ?>
<div class="holder">
    <div class="sub-title">
        <?php
        echo validation_errors();
        ?>
    </div>

    <div class="action">
        <?php echo form_submit('update', $this->lang->line('update'), 'class="add"'); ?>
        <?php echo anchor('menu', $this->lang->line('cancel'), 'class="button cancel"'); ?>
    </div>
    <div style="clear:both"></div>
</div>
<?php
$html_manu = $html_footer = "";
$i=0;
foreach ($menus->result_array() as $menu) {
    if ($menu['men_mt_id'] == 1) {
        
        $html_manu.=form_input('menu_name', $menu['md_title'],'class="span4" ');

    } else {
//            echo form_hidden('hid_menu_name', $menu['md_title']);
        if($i < 3){
          echo form_hidden('hid_md_id[]', $menu['md_id']);
         $html_footer.= form_input('txt_menu_name[]', $menu['md_title'],'class="span4 fot_men" title= "'.$menu['md_id'].'"');
        }else{
            $html_footer.= '</div><br /><div class="controls controls-row">';
            echo form_hidden('hid_md_id[]', $menu['md_id']);
              $html_footer.= form_input('txt_menu_name[]', $menu['md_title'],'class="span4 fot_men"');
            $i=0;
        }
    $i++;
    }
    $html_manu.= "</div>";
}
?>          

<div>
    <div class=" controls-row menu_title">    
    <span class="span4"> English Menu</span>
     <span class="span4"> Khmer Menu</span>
      <span class="span4"> China Menu</span>
    </div>
    <div>
        <div class="controls controls-row">
            <?php echo $html_footer?>
        </div>
</div>


<?php echo form_close(); ?>