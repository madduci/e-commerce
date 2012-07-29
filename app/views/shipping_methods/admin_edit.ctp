<script type="text/javascript">
	$(document).ready(function() {
		$(".submitform").live('click',function(e) {
			$("#ShippingMethodEditForm").submit();
		});
		
		$('#floatingtop').html($('#titolo').html());
	});
</script>
<div id="floatingtop"></div>
<div class="shippingMethods form">
<?php echo $form->create('ShippingMethod');?>
	<div id="titolo">
		<span style="float:right" class="crud">
			<li class="save"><a href="javascript:void(0);" class="submitform">Salva</a></li>
			<li class="cancel"><?php echo $html->link("Annulla", array('action' => 'index'));?></li>
			<li class="delete"><?php echo $html->link('Elimina', array('action' => 'delete', $form->value('ShippingMethod.id')), null, sprintf("Sei sicuro di voler eliminare il metodo di spedizione %s?", $form->value('ShippingMethod.descrizione'))); ?></li>
		</span>
		<h2>Modifica Metodo di spedizione: <?php echo $this->data['ShippingMethod']['descrizione']; ?></h2>
		<div style="clear:both"></div>
	</div>
	<?php echo $form->input('id'); ?>
	<table class="admintables">
		<tbody>
			<tr>
				<td width="10%">Descrizione</td>
				<td><?php echo $form->input('descrizione', array('label' => '')); ?></td>
			</tr>
			<tr>
				<td width="10%">Costo (&euro;)</td>
				<td><?php echo $form->input('costo', array('label' => '')); ?></td>
			</tr>
		</tbody>
	</table>
<?php echo $form->end(); ?>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
</div>