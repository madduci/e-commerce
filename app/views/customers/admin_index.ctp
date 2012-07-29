<script type="text/javascript">
	$(document).ready(function() {
		$('#floatingtop').html($('#titolo').html());
		
		var search = $('input[name=search]');
		
		search.keydown(function(event) {
			if (event.keyCode == 13) {
				if ($(this).val() == '')
					url = '/admin/Customers/index/';
				else
					url = '/admin/Customers/index/search:';
					
				window.location.href = url + $(this).val();
			}
		});
	});
</script>
<div id="floatingtop"></div>
<div class="customers index">
	<div id="titolo">
		<span style="float:right" class="crud">
			<li class="search"><input type="text" name="search" value="" id="search" placeholder='cerca...' /></li>
		</span>
		<h2>Clienti</h2>
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
				<th><?php echo $paginator->sort('ragione_sociale');?></th>
				<th><?php echo $paginator->sort('group_id'); ?></th>
				<th><?php echo $paginator->sort('account_id');?></th>
				<th><?php echo $paginator->sort('regione');?></th>
				<th><?php echo $paginator->sort('email');?></th>
				<th><?php echo $paginator->sort('telefono');?></th>
				<th><?php echo $paginator->sort('fax');?></th>
				<th class="actions">Azioni</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td scope="col" colspan="9">
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
		<?php foreach ($customers as $customer): ?>
		<?php
			$class = null;
	
			if ($i++ % 2 == 0) {
				$class = ' class="odd"';
			}
		?>
			<tr<?php echo $class;?> title="/admin/customers/edit/<?php echo $customer['Customer']['id']; ?>" style="cursor:pointer">
				<td>
					<?php echo $customer['Customer']['id']; ?>
				</td>
				<td>
					<?php echo $customer['Customer']['ragione_sociale']; ?>
				</td>
				<td>
					<?php echo $customer['Group']['gruppo']; ?>
				</td>
				<td>
					<?php echo $customer['Account']['username']; ?>
				</td>
				<td>
					<?php echo $customer['Customer']['regione']; ?>
				</td>
				<td>
					<?php echo $html->link($customer['Account']['email'], 'mailto:'.$customer['Account']['email']); ?>
				</td>
				<td>
					<?php echo $customer['Customer']['telefono']; ?>
				</td>
				<td>
					<?php echo $customer['Customer']['fax']; ?>
				</td>
				<td class="actions">
					<?php echo $html->link('Modifica', array('action' => 'edit', $customer['Customer']['id'])); ?>
				</td>
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>
	<p>&nbsp;</p>
</div>
