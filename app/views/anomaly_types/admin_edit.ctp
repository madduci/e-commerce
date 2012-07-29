<script type="text/javascript">
	$(document).ready(function() {
		$(".submitform").live('click',function(e) {
			$("#AnomalyTypeEditForm").submit();
		});
		
		$('#floatingtop').html($('#titolo').html());
	});
</script>
<div id="floatingtop"></div>
<div class="anomalyTypes form">
<?php echo $form->create('AnomalyType');?>
	<div id="titolo">
		<span style="float:right" class="crud">
			<li class="save"><a href="javascript:void(0);" class="submitform">Salva</a></li>
			<li class="cancel"><?php echo $html->link("Annulla", array('action' => 'index'));?></li>
			<li class="delete"><?php echo $html->link('Elimina', array('action' => 'delete', $this->data['AnomalyType']['id']), null, sprintf('Sei sicuro di voler eliminare la tipologia anomalia anomalia %s?', $this->data['AnomalyType']['descrizione'])); ?> </li>
		</span>
		<h2>Tipologia Anomalia: <?php echo $this->data['AnomalyType']['descrizione']; ?></h2>
		<div style="clear:both"></div>
	</div>
	<?php echo $form->input('id'); ?>
	<table class="admintables">
		<tbody>
			<tr>
				<td width="10%">Descrizione</td>
				<td><?php echo $form->input('descrizione', array('label' => '')); ?></td>
			</tr>
		</tbody>
	</table>
<?php echo $form->end(); ?>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
</div>
