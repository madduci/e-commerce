<script type="text/javascript">
	$(document).ready(function() {
		$(".submitform").live('click',function(e) {
			$("#DiscountCodeEditForm").submit();
		});
		
		$('#floatingtop').html($('#titolo').html());
	});
</script>
<div id="floatingtop"></div>
<div class="discountCodes form">
<?php echo $form->create('DiscountCode'); ?>
	<div id="titolo">
		<span style="float:right" class="crud">
			<li class="save"><a href="javascript:void(0);" class="submitform">Salva</a></li>
			<li class="cancel"><?php echo $html->link("Annulla", array('action' => 'index'));?></li>
			<li class="delete"><?php echo $html->link('Elimina',  array('action' => 'delete', $form->value('DiscountCode.id')), null, sprintf('Sicuro di voler eliminare il codice sconto %s%%', $form->value('DiscountCode.codice'))); ?></li>
		</span>
		<h2>Modifica Codice di sconto: <?php echo $this->data['DiscountCode']['codice']; ?>%</h2>
		<div style="clear:both"></div>
	</div>
	<?php echo $form->input('id'); ?>
	<table class="admintables">
		<tbody>
			<tr>
				<td width="10%">Codice (%):</td>
				<td><?php echo $form->input('codice', array('label' => '')); ?></td>
			</tr>
		</tbody>
	</table>
<?php echo $form->end(); ?>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
</div>

