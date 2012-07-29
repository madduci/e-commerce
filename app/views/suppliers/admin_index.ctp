<script type="text/javascript">
	$(document).ready(function() {
		$('#floatingtop').html($('#titolo').html());
		
		var search = $('input[name=search]');
		
		search.keydown(function(event) {
			if (event.keyCode == 13) {
				if ($(this).val() == '')
					url = '/admin/Suppliers/index/';
				else
					url = '/admin/Suppliers/index/search:';
					
				window.location.href = url + $(this).val();
			}
		});
	});
</script>
<div id="floatingtop"></div>
<div class="suppliers index">
	<div id="titolo">
		<span style="float:right" class="crud">
			<li class="add"><?php echo $html->link('nuovo', array('action' => 'add')); ?></li>
			<li class="search"><input type="text" name="search" value="" id="search" placeholder='cerca...' /></li>
		</span>
		<h2>Fornitori</h2>
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
				<th><?php echo $paginator->sort('partita_iva');?></th>
				<th><?php echo $paginator->sort('email');?></th>
				<th><?php echo $paginator->sort('telefono');?></th>
				<th><?php echo $paginator->sort('fax');?></th>
				<th class="actions">Azioni</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td scope="col" colspan="7">
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
		<?php foreach ($suppliers as $supplier): ?>
		<?php
			$class = null;
	
			if ($i++ % 2 == 0) {
				$class = ' class="odd"';
			}
		?>
			<tr<?php echo $class;?> title="/admin/suppliers/edit/<?php echo $supplier['Supplier']['id']; ?>" style="cursor:pointer">
				<td>
					<?php echo $supplier['Supplier']['id']; ?>
				</td>
				<td>
					<?php echo $supplier['Supplier']['ragione_sociale']; ?>
				</td>
				<td>
					<?php echo $supplier['Supplier']['partita_iva']; ?>
				</td>
				<td>
					<?php echo $html->link($supplier['Supplier']['email'], 'mailto:'.$supplier['Supplier']['email']); ?>
				</td>
				<td>
					<?php echo $supplier['Supplier']['telefono']; ?>
				</td>
				<td>
					<?php echo $supplier['Supplier']['fax']; ?>
				</td>
				<td class="actions">
					<?php echo $html->link('Modifica', array('action' => 'edit', $supplier['Supplier']['id'])); ?>
				</td>
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>
	<p>&nbsp;</p>
</div>