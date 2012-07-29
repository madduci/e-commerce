<script type="text/javascript">
	$(document).ready(function() {
		$('#floatingtop').html($('#titolo').html());
		
		var search = $('input[name=search]');
		
		search.keydown(function(event) {
			if (event.keyCode == 13) {
				if ($(this).val() == '')
					url = '/admin/Accounts/index/';
				else
					url = '/admin/Accounts/index/search:';
					
				window.location.href = url + $(this).val();
			}
		});
	});
</script>
<div id="floatingtop"></div>
<div class="accounts index">
	<div id="titolo">
		<span style="float:right" class="crud">
			<li class="add"><?php echo $html->link('Nuovo', array('action' => 'add')); ?></li>
			<li class="search"><input type="text" name="search" value="" id="search" placeholder='cerca...' /></li>
		</span>
		<h2>Account</h2>
		<div style="border-bottom: 1px dotted #FF9006">
			<span style="float:right; display:inline;">
				<div class="paging">
					<?php echo $paginator->prev('<< precedente', array(), null, array('class'=>'disabled'));?>
				 | 	<?php echo $paginator->numbers();?>
					<?php echo $paginator->next('successivo >>', array(), null, array('class' => 'disabled'));?>
				</div>
			</span>
			<?php echo $paginator->counter(array('format' => 'Pagina %page% di %pages%, mostrati %current% record su %count% totali')); ?>
		</div>
	</div>
	<table class="admintables">
		<thead>
			<tr>
				<th><?php echo $paginator->sort('id');?></th>
				<th><?php echo $paginator->sort('username');?></th>
				<th><?php echo $paginator->sort('attivo');?></th>
				<th><?php echo $paginator->sort('email');?></th>
				<th><?php echo $paginator->sort('Gruppo', 'account_type_id'); ?></th>
				<th><?php echo $paginator->sort('nome');?></th>
				<th><?php echo $paginator->sort('cognome');?></th>
				<th class="actions">Azioni</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td scope="col" colspan="8">
					<span style="float:right; display:inline">
						<div class="paging">
							<?php echo $paginator->prev('<< precedente', array(), null, array('class'=>'disabled'));?>
						 | 	<?php echo $paginator->numbers();?>
							<?php echo $paginator->next('successivo >>', array(), null, array('class' => 'disabled'));?>
						</div>
					</span>
					<?php echo $paginator->counter(array('format' => 'Pagina %page% di %pages%, mostrati %current% record su %count% totali')); ?>
				</td>
			</tr>
		</tfoot>
		<tbody>
		<?php $i = 0; ?>
		<?php foreach ($accounts as $account): ?>
		<?php
			$class = null;
	
			if ($i++ % 2 == 0) {
				$class = ' class="odd"';
			}
		?>
			<tr<?php echo $class;?> title="/admin/accounts/edit/<?php echo $account['Account']['id']; ?>" style="cursor:pointer">
				<td>
					<?php echo $account['Account']['id']; ?>
				</td>
				<td>
					<?php echo $account['Account']['username']; ?>
				</td>
				<td>
				<?php if ($account['Account']['attivo']): ?>
				<?php echo $html->image("messages/yes.png"); ?>
				<?php else: ?>
				<?php echo $html->image("messages/no.png"); ?>
				<?php endif ?>
				</td>
				<td>
					<?php echo $account['Account']['email']; ?>
				</td>
				<td>
					<?php echo $account['AccountType']['descrizione']; ?>
				</td>
				<td>
					<?php echo $account['Account']['nome']; ?>
				</td>
				<td>
					<?php echo $account['Account']['cognome']; ?>
				</td>
				<td class="actions">
					<?php echo $html->link('Modifica', array('action' => 'edit', $account['Account']['id'])); ?>
				</td>
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>
	<p>&nbsp;</p>
</div>