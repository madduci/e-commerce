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
			$("#CustomerEditForm").submit();
		});
		
		$('#floatingtop').html($('#titolo').html());
		
	});
</script>
<div id="floatingtop"></div>
<div class="customers form">
<?php echo $form->create('Customer');?>
	<div id="titolo">
		<span style="float:right" class="crud">
			<li class="save"><a href="javascript:void(0);" class="submitform">Salva</a></li>
			<li class="cancel"><?php echo $html->link("Annulla", array('action' => 'index'));?></li>
			<li class="delete"><?php echo $html->link('Elimina', array('action' => 'delete', $form->value('Customer.id')), null, sprintf('Sei sicuro di voler eliminare il cliente %s?', $form->value('Customer.ragione_sociale'))); ?></li>
		</span>
		<h2>Modifica cliente: <?php echo $this->data['Customer']['ragione_sociale']; ?></h2>
		<div style="clear:both"></div>
	</div>
	<?php echo $form->input('id'); ?>
	<?php echo $form->hidden('filesystem_id'); ?>
		<table class="admintables">
			<tbody>
				<tr>
					<td>Account:<?php echo $form->hidden('account_id'); ?></td>
					<td><?php echo $html->link($account['Account']['username'], array('controller' => 'accounts', 'action' => 'admin_edit', 'id' => $this->data['Customer']['account_id'])); ?></td>
				</tr>
				<tr>
					<td width="10%">Gruppo GDO:</td>
					<td><?php echo $form->input('group_id', array('label' => "")); ?></td>
				</tr>
				<tr>
					<td>Ragione Sociale:</td>
					<td><?php echo $form->input('ragione_sociale', array('label' => "")); ?></td>
				</tr>
				<tr>
					<td>Codice Fiscale:</td>
					<td><?php echo $form->input('codice_fiscale', array('label' => '')); ?></td>
				</tr>
				<tr>
					<td>Codice sconto:</td>
					<td><?php echo $form->input('discount_code_id', array('label' => "%")); ?></td>
				</tr>
				<tr>
					<td>Indirizzo:</td>
					<td><?php echo $form->input('indirizzo', array('label' => "")); ?></td>
				</tr>
				<tr>
					<td>CAP</td>
					<td><?php echo $form->input('cap', array('label' => '')); ?></td>
				</tr>
				<tr>
					<td>Citt&agrave;:</td>
					<td><?php echo $form->input('citta', array('label' => "")); ?></td>
				</tr>
				<tr>
					<td>Provincia:</td>
					<td><?php echo $form->input('provincia', array('label' => "")); ?></td>
				</tr>
				<tr>
					<td>Regione:</td>
					<td><?php echo $form->input('regione', array('type' => 'select', 'options' => array('0' => 'Seleziona una regione', 'Puglia' => 'Puglia', 'Calabria' => 'Calabria', 'Campania' => 'Campania', 'Molise' => 'Molise'), 'label' => '')); ?></td>
				</tr>
				<tr>
					<td>Telefono:</td>
					<td><?php echo $form->input('telefono', array('label' => "")); ?></td>
				</tr>
				<tr>
					<td>FAX:</td>
					<td><?php echo $form->input('fax', array('label' => "")); ?></td>
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
