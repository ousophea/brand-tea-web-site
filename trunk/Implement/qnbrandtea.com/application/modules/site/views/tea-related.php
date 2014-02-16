<h3 class="page-head"><?php echo $this->lang->line('men_teaknowledge'); ?></h3><br>
<table border="0" class="event sidebar-content">
<?php
$i=1;
if(isset($teas) && $teas->num_rows() >  0):
	foreach ($teas->result_array() as $row): 	
		$tea_desc = $row[field('teaDesc')];
?>
<?php					
	echo'<tr>
			<td valign="top">';
			echo '<img src="'.base_url() . FRONTEND_TEMPLATE.'/img/content/teaknow.png" width="20" height="20"/>';
			echo anchor('site/tearelated/detail/' . $row[field('teaId')], $row[field('teaTitle')]); 
			echo "<div style='margin-left:25px'>".word_limiter($tea_desc,14)."<div>";		   
		echo '</td>    									
		</tr>';
?>
<?php	
	endforeach; 
else: 		
?>	
    <tr>
        <td><?php echo $this->lang->line('ms_no_data_display'); ?></td>
    </tr>
<?php endif; ?>
</table>