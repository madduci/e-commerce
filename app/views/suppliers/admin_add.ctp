<script type="text/javascript">
	$(document).ready(function() {
		$(".submitform").live('click',function(e) {
			$("#SupplierAddForm").submit();
		});
		
		$('#floatingtop').html($('#titolo').html());
	});
</script>
<div id="floatingtop"></div>
<div class="suppliers form">
<?php echo $form->create('Supplier');?>
	<div id="titolo">
		<span style="float:right" class="crud">
			<li class="save"><a href="javascript:void(0);" class="submitform">Salva</a></li>
			<li class="cancel"><?php echo $html->link("Annulla", array('action' => 'index'));?></li>
		</span>
		<h2>Nuovo fornitore</h2>
		<div style="clear:both"></div>
	</div>
	<table class="admintables">
		<tbody>
			<tr>
				<td width="10%">Partita IVA:</td>
				<td><?php echo $form->input('partita_iva', array('label' => '')); ?></td>
			</tr>
			<tr>
				<td>Ragione Sociale:</td>
				<td><?php echo $form->input('ragione_sociale', array('label' => "")); ?></td>
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
				<td>Telefono:</td>
				<td><?php echo $form->input('telefono', array('label' => "")); ?></td>
			</tr>
			<tr>
				<td>FAX:</td>
				<td><?php echo $form->input('fax', array('label' => "")); ?></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><?php echo $form->input('email', array('label' => "")); ?></td>
			</tr>
		</tbody>
	</table>
<?php echo $form->end(); ?>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
</div>
