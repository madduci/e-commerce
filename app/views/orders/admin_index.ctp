<script type="text/javascript">
	$(document).ready(function() {
		$('#floatingtop').html($('#titolo').html());
		
		var search = $('input[name=search]');
		
		search.keydown(function(event) {
			if (event.keyCode == 13) {
				if ($(this).val() == '')
					url = '/admin/Orders/index/';
				else
					url = '/admin/Orders/index/search:';
					
				window.location.href = url + $(this).val();
			}
		});
	});
</script>
<div id="floatingtop"></div>
<div class="orders index">
	<div id="titolo">
		<span style="float:right" class="crud">
			<li class="search"><input type="text" name="search" value="" id="search" placeholder='cerca...' /></li>
		</span>
		<h2>Ordini</h2>
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
				<th><?php echo $paginator->sort('#', 'id');?></th>
				<th><?php echo $paginator->sort('Cliente', 'Customer.ragione_sociale');?></th>
				<th><?php echo $paginator->sort('Data ordine', 'data_ordine');?></th>
				<th><?php echo $paginator->sort('Stato', 'OrderStatus.stato');?></th>
				<th><?php echo $paginator->sort('Data evasione', 'data_evasione');?></th>
				<th><?php echo $paginator->sort('totale'); ?></th>
				<th><?php echo $paginator->sort('tracking'); ?></th>
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
		<?php foreach ($orders as $order): ?>
		<?php
			$class = null;
	
			if ($i++ % 2 == 0) {
				$class = ' class="odd"';
			}
		?>
			<tr<?php echo $class;?> title="/admin/orders/edit/<?php echo $order['Order']['id']; ?>" style="cursor:pointer">
				<td>
					<?php echo $order['Order']['id']; ?>
				</td>
				<td>
					<?php echo $order['Customer']['ragione_sociale']; ?>
				</td>
				<td>
					<?php echo date('d/m/Y', strtotime($order['Order']['data_ordine'])); ?>
				</td>
				<td>
					<?php echo $order['OrderStatus']['stato']; ?>
				</td>
				<td>
					<?php if (!empty($order['Order']['data_evasione'])) echo date('d/m/Y', strtotime($order['Order']['data_evasione'])); ?>
				</td>
				<td>
					<?php echo number_format($order['Order']['totale'], 2, '.', ' '); ?> &euro;
				</td>
				<td>
					<?php echo $order['Order']['tracking']; ?>
				</td>
				<td class="actions">
					<?php echo $html->link('Modifica', array('action' => 'edit', $order['Order']['id'])); ?>
				</td>
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>
	<p>&nbsp;</p>
</div>
