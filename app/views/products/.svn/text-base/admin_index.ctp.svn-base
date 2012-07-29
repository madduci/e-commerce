<script type="text/javascript">
	$(document).ready(function() {
		$('#floatingtop').html($('#titolo').html());
		
		var search = $('input[name=search]');
		
		search.keydown(function(event) {
			if (event.keyCode == 13) {
				if ($(this).val() == '')
					url = '/admin/Products/index/';
				else
					url = '/admin/Products/index/search:';
					
				window.location.href = url + $(this).val();
			}
		});
	});
</script>
<div id="floatingtop"></div>
<div class="products index">
	<div id="titolo">
		<span style="float:right" class="crud">
			<li class="add"><?php echo $html->link('Nuovo', array('action' => 'add')); ?></li>
			<li class="search"><input type="text" name="search" value="" id="search" placeholder='cerca...' /></li>
		</span>
		<h2>Prodotti</h2>
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
				<th><?php echo $paginator->sort('id'); ?></th>
				<th><?php echo $paginator->sort('Codice', 'codice_prodotto'); ?></th>
				<th><?php echo $paginator->sort('nome'); ?></th>
				<th><?php echo $paginator->sort('Categoria', 'product_category_id'); ?></th>
				<th><?php echo $paginator->sort('Stato', 'product_status_id'); ?></th>
				<th><?php echo $paginator->sort('Qta', 'qta_disponibile'); ?></th>
				<th><?php echo $paginator->sort('prezzo'); ?></th>
				<th><?php echo $paginator->sort('vetrina'); ?></th>
				<th><?php echo $paginator->sort('pubblica'); ?></th>
				<th><?php echo $paginator->sort('Fornitore', 'supplier_id'); ?></th>
				<th class="actions">Azioni</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td scope="col" colspan="11">
					<span style="float:right; display:inline">
						<div class="paging">
							<?php echo $paginator->prev('<< precedente', array(), null, array('class' => 'disabled'));?>
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
		<?php foreach ($products as $product): ?>
		<?php
			$class = null;
	
			if ($i++ % 2 == 0) {
				$class = ' class="odd"';
			}
		?>
			<tr<?php echo $class;?> title="/admin/products/edit/<?php echo $product['Product']['id']; ?>" style="cursor:pointer">
				<td>
					<?php echo $product['Product']['id']; ?>
				</td>
				<td>
					<?php echo $product['Product']['codice_prodotto']; ?>
				</td>
				<td>
					<?php echo $product['Product']['nome']; ?>
				</td>
				<td>
					<?php echo $product['ProductCategory']['name']; ?>
				</td>
				<td>
					<?php echo $product['ProductStatus']['descrizione']; ?>
				</td>
				<td>
					<?php echo $product['Product']['qta_disponibile']; ?>
				</td>
				<td>
					<?php echo $product['Product']['prezzo']; ?>
				</td>
				<td>
				<?php if ($product['Product']['pubblica']): ?>
				<?php echo $html->image("messages/yes.png"); ?>
				<?php else: ?>
				<?php echo $html->image("messages/no.png"); ?>
				<?php endif ?>
				</td>
				<td>
				<?php if ($product['Product']['vetrina']): ?>
				<?php echo $html->image("messages/yes.png"); ?>
				<?php else: ?>
				<?php echo $html->image("messages/no.png"); ?>
				<?php endif ?>
				</td>
				<td>
					<?php echo $product['Supplier']['ragione_sociale']; ?>
				</td>
				<td class="actions">
					<?php echo $html->link('Modifica', array('action' => 'edit', $product['Product']['id'])); ?>
				</td>
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>
	<p>&nbsp;</p>
</div>