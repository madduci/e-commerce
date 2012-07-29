<?php
	foreach ($css as $style) {
		echo $html->css($style, 'stylesheet', false);
	}

	foreach ($scriptjs as $js) {
		$javascript->link($js, false);
	}
	
	echo $script;
?>
<script type="text/javascript">
	$(document).ready(function() {
		$(".submitform").live('click',function(e) {
			$("#GroupEditForm").submit();
		});
		
		$('#floatingtop').html($('#titolo').html());
		
	});
</script>
<div id="floatingtop"></div>
<div class="groups form">
<?php echo $form->create('Group'); ?>
	<div id="titolo">
		<span style="float:right" class="crud">
			<li class="save"><a href="javascript:void(0);" class="submitform">Salva</a></li>
			<li class="cancel"><?php echo $html->link("Annulla", array('action' => 'index'));?></li>
			<li class="delete"><?php echo $html->link('Elimina',  array('action' => 'delete', $form->value('Group.id')), null, sprintf("Sei sicuro di voler eliminare il gruppo %s?", $form->value('Group.gruppo'))); ?></li>
		</span>
		<h2>Modifica gruppo: <?php echo $this->data['Group']['gruppo']; ?></h2>
		<div style="clear:both"></div>
	</div>
	<?php echo $form->input('id'); ?>
	<?php echo $form->hidden('filesystem_id'); ?>
		<table class="admintables">
			<tbody>
				<tr>
					<td width="10%">Gruppo:</td>
					<td><?php echo $form->input('gruppo', array('label' => "")); ?></td>
				</tr>
				<tr>
					<td>Partita IVA:</td>
					<td><?php echo $form->input('partita_iva', array('label' => "")); ?></td>
				</tr>
				<tr>
					<td>Insegna:</td>
					<td>
					<?php if (isset($filesystem['Filesystem']['id'])): ?>
					<?php 
						echo $html->image($filesystem['Filesystem']['id'], array('width' => '300px')); 
						echo $form->input(null, array('type' => 'checkbox', 'label' => 'elimina insegna', 'name' => 'data[deleteFile]', 'value' => $filesystem['Filesystem']['id'], 'checked' => false));
					?>
					<?php else: ?>
					<?php echo $upload_form; ?>
					<?php endif ?>
					</td>
				</tr>
			</tbody>
		</table>
<?php echo $form->end(); ?>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
</div>
