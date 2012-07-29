<script type="text/javascript">
	$(document).ready(function() {
		$(".submitform").live('click',function(e) {
			$("#AccountAddForm").submit();
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
		</span>
		<h2>Nuovo Account</h2>
		<div style="clear:both"></div>
	</div>
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
			<tr>
				<td>Attivo</td>
				<td><?php echo $form->input('attivo', array('label' => '')); ?></td>
			</tr>
			<tr>
				<td>Gruppo</td>
				<td><?php echo $form->input('account_type_id', array('label' => '')); ?></td>
			</tr>
		</tbody>
	</table>
<?php echo $form->end(); ?>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
</div>
