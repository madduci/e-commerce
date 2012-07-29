<script type="text/javascript">
	$(document).ready(function() {
		$(".submitform").live('click',function(e) {
			$("#AccountEditForm").submit();
		});
		
		$('#floatingtop').html($('#titolo').html());
	});
</script>
<div id="floatingtop"></div>
<div class="accounts form">
<?php echo $form->create('Account');?>
	<div id="titolo">
		<span style="float:right" class="crud">
			<li class="save"><a href="javascript:void(0);" class="submitform">Salva</a></li>
			<li class="cancel"><?php echo $html->link("Annulla", array('action' => 'index'));?></li>
			<?php if ($this->data['Account']['account_type_id'] != 1): ?><li class="delete"><?php echo $html->link("Elimina", array('action' => 'delete', $form->value('Account.id')), null, sprintf("Sei sicuro di voler eliminare l'account %s?", $form->value('Account.username'))); ?></li><?php endif ?>
		</span>
		<h2>Modifica Account: <?php echo $this->data['Account']['username']; ?></h2>
		<div style="clear:both"></div>
	</div>
	<?php echo $form->input('id'); ?>
	<?php 
		if ($this->data['Account']['account_type_id'] != 1) {
			echo $form->hidden('attivo');
			echo $form->hidden('account_type_id');
		}
	?>
	<table class="admintables">
		<tbody>
			<tr>
				<td width="10%">Nome</td>
				<td><?php echo $form->input('nome', array('label' => '')); ?></td>
			</tr>
			<tr>
				<td>Cognome</td>
				<td><?php echo $form->input('cognome', array('label' => '')); ?></td>
			</tr>
			<tr>
				<td>Username</td>
				<td><?php echo $form->input('username', array('label' => '')); ?></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><?php echo $form->input('password', array('value' => '', 'label' => '')); ?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><?php echo $form->input('email', array('label' => '')); ?></td>
			</tr>
		<?php if ($this->data['Account']['account_type_id'] != 1): ?>
			<tr>
				<td>Attivo</td>
				<td><?php echo $form->input('attivo', array('label' => '')); ?></td>
			</tr>
			<tr>
				<td>Gruppo</td>
				<td><?php echo $form->input('account_type_id', array('label' => '')); ?></td>
			</tr>
		<?php endif ?>
		</tbody>
	</table>
<?php echo $form->end(); ?>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
</div>
