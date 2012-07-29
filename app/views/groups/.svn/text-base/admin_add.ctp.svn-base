<script type="text/javascript">
	$(document).ready(function() {
		$(".submitform").live('click',function(e) {
			$("#GroupAddForm").submit();
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
		</span>
		<h2>Nuovo gruppo GDO</h2>
		<div style="clear:both"></div>
	</div>
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
		</tbody>
	</table>
<?php echo $form->end(); ?>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
</div>

