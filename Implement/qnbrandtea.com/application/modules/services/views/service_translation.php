<?php
echo form_open('services/service_translation/' . $itemId . '/' . $langId);
echo form_hidden('lan_title', $langTitle);
echo form_hidden('ser_id', $itemId);
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
        <?php echo anchor('services', $this->lang->line('cancel'), 'class="button cancel"'); ?>
    </div>
    <div style="clear:both"></div>
</div>
<?php
 $teas = unserialize($items);
$action = 'insert';
// Check existing data
$this->load->model('services/mod_services');
$langData = $this->mod_services->checkLang($itemId, $langId);
if ($langData->num_rows() > 0) {
    $teas = $langData->result_array();
    $action = 'update';
}
echo form_hidden('action', $action);
echo form_hidden('item_data', serialize($teas));
foreach ($teas as $tea) :
    if ($tea[field('serId')] == $itemId) :
        //$fields = unserialize($cat[field('catField')]);
        // Create hidden for categery name to check existing name
       // echo form_hidden('hid_cat_name', $cat[field('catName')]);
        ?>
      <table cellspacing="0" > 
    <tr> 
        <td width="100" valign="middle">
            <label for="tea-1"><?php echo $this->lang->line('tea_name'),$this->lang->line('require'); ?></label>
             <?php echo form_input('txt_title', $this->input->post('txt_title') ? $this->input->post('txt_title') : $tea[field('serTitle')], 'id="tea-1"'); ?>
        </td>
    </tr>
    <tr> 
        <td width="100" valign="middle">
             <label for="tea-2"><?php echo $this->lang->line('description'); ?></label>
             <?php echo form_textarea('txt_dec', $this->input->post('txt_dec') ? $this->input->post('txt_dec') : $tea[field('serDesc')], 'id="tea-2"'); ?>          
        </td>
    </tr>
	 <tr> 
        <td width="100" valign="middle">
             <label for="tea-2"><?php echo $this->lang->line('men_status'); ?></label>		 
			 <?php
             $dd_list = array(
			      ''. $tea[field('serStatus')].'' => ''.$tea[field('serStatus')].'',
                  '1'   => 'Active',
                  '0'   => 'Inactive'
                );
             echo form_dropdown('dd_status', $dd_list, '2');   
			?>          
        </td>
    </tr>
</table>
<?php 
	endif;
endforeach;
?>
<?php echo form_close(); ?>
<script type="text/javascript">
    tinymce.init({
        selector: "textarea",
        plugins: [
            "advlist autolink lists link image charmap preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste"
        ],
        toolbar: "insertfile undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    });
</script>
<script>
    // Wait until the DOM has loaded before querying the document
    $(document).ready(function() {
        $('ul.tabs').each(function() {
            // For each set of tabs, we want to keep track of
            // which tab is active and it's associated content
            var $active, $content, $links = $(this).find('a');

            // If the location.hash matches one of the links, use that as the active tab.
            // If no match is found, use the first link as the initial active tab.
            $active = $($links.filter('[href="' + location.hash + '"]')[0] || $links[0]);
            $active.addClass('active');
            $content = $($active.attr('href'));

            // Hide the remaining content
            $links.not($active).each(function() {
                $($(this).attr('href')).hide();
            });

            // Bind the click event handler
            $(this).on('click', 'a', function(e) {
                // Make the old tab inactive.
                $active.removeClass('active');
                $content.hide();

                // Update the variables with the new link and content
                $active = $(this);
                $content = $($(this).attr('href'));

                // Make the tab active.
                $active.addClass('active');
                $content.show();
                // Prevent the anchor's default click action
                e.preventDefault();
            });
        });
    });
</script>