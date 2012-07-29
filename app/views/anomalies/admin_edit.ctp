<script type="text/javascript">
	$(document).ready(function() {
		$(".submitform").live('click',function(e) {
			$("#AnomalyEditForm").submit();
		});
		
		$('#floatingtop').html($('#titolo').html());
	});
</script>
<div id="floatingtop"></div>
<div class="anomalies form">
<?php echo $form->create('Anomaly');?>
	<div id="titolo">
		<span style="float:right" class="crud">
			<li class="save"><a href="javascript:void(0);" class="submitform">Salva</a></li>
			<li class="cancel"><?php echo $html->link("Annulla", array('action' => 'index'));?></li>
			<li class="delete"><?php echo $html->link('Elimina', array('action' => 'delete', $form->value('Anomaly.id')), null, sprintf("Sei sicuro di voler eliminare l'anomalia %s?", $form->value('Anomaly.oggetto'))); ?></li>
		</span>
		<h2>Modifica Anomalia: <?php echo $this->data['Anomaly']['oggetto']; ?></h2>
		<div style="clear:both"></div>
	</div>
	<?php echo $form->input('id'); ?>
	<table class="admintables">
		<tbody>
			<tr>
				<td width="10%">Ordine</td>
				<td>
					<?php echo $form->hidden('order_id'); ?>
					#<?php echo $html->link($this->data['Anomaly']['order_id'], array('controller' => 'Orders', 'action' => 'edit', 'id' => $this->data['Anomaly']['order_id']), array('target' => '_blank'));  ?>
				</td>
			</tr>
			<tr>
				<td>Oggetto</td>
				<td>
					<?php echo $form->hidden('oggetto'); ?>
					<?php echo $this->data['Anomaly']['oggetto']; ?>
				</td>
			</tr>
			<tr>
				<td>Descrizione</td>
				<td>
					<?php echo $form->input('descrizione', array('label' => '')); ?>
				</td>
			</tr>
		</tbody>
	</table>
<?php echo $form->end(); ?>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
</div>
