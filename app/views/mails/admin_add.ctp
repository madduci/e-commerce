<script type="text/javascript">
	$(document).ready(function() {
		$(".submitform").live('click',function(e) {
			$("#MailAddForm").submit();
		});
		
		$('#floatingtop').html($('#titolo').html());
	});
</script>
<div id="floatingtop"></div>
<div id="floatingtop"></div>
<div class="mails form">
<?php echo $form->create('Mail');?>
	<div id="titolo">
		<span style="float:right" class="crud">
			<li class="save"><a href="javascript:void(0);" class="submitform">Invia</a></li>
			<li class="cancel"><?php echo $html->link("Annulla", "/admin");?></li>
		</span>
		<h2>Nuovo Messaggio</h2>
		<div style="clear:both"></div>
	</div>
	<table class="admintables">
		<tbody>
			<tr>
				<td width="10%">Oggetto</td>
				<td <?php if (isset($erroreOggetto)) echo 'class="error"'; ?>>
				<?php 
					echo $form->input('oggetto', array('label' => '', 'type' => 'text')); 
				?>
				</td>
			</tr>
			<tr>
				<td width="10%">Testo</td>
				<td <?php if (isset($erroreMessaggio)) echo 'class="error"'; ?>>
				<?php 
					echo $form->input('messaggio', array('label' => '', 'type' => 'textarea')); 
				?>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<div style="color:red">
						ATTENZIONE!!! Il database contiene dati di test, pertanto l'invio delle email potrebbe non funzionare correttamente poichè gli indirizzi di posta elettronica non sono validi
					</div>
				</td>
			</tr>
		</tbody>
	</table>
	
<?php echo $form->end(); ?>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
</div>
