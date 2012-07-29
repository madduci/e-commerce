<div class="productTechnicalDetails index">
<h2><?php __('ProductTechnicalDetails');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => 'Pagina %page% di %pages%, mostrati %current% record su %count% totali'
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('detail_type_id');?></th>
	<th><?php echo $paginator->sort('valore_dettaglio');?></th>
	<th><?php echo $paginator->sort('product_id');?></th>
	<th class="actions">Azioni</th>
</tr>
<?php
$i = 0;
foreach ($productTechnicalDetails as $productTechnicalDetail):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $productTechnicalDetail['ProductTechnicalDetail']['id']; ?>
		</td>
		<td>
			<?php echo $productTechnicalDetail['ProductTechnicalDetail']['detail_type_id']; ?>
		</td>
		<td>
			<?php echo $productTechnicalDetail['ProductTechnicalDetail']['valore_dettaglio']; ?>
		</td>
		<td>
			<?php echo $productTechnicalDetail['ProductTechnicalDetail']['product_id']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link('Visualizza', array('action' => 'view', $productTechnicalDetail['ProductTechnicalDetail']['id'])); ?>
			<?php echo $html->link('Modifica', array('action' => 'edit', $productTechnicalDetail['ProductTechnicalDetail']['id'])); ?>
			<?php echo $html->link('Elimina', array('action' => 'delete', $productTechnicalDetail['ProductTechnicalDetail']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $productTechnicalDetail['ProductTechnicalDetail']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< precedente', array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next('successivo >>', array(), null, array('class' => 'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link('Nuovo', array('action' => 'add')); ?></li>
	</ul>
</div>
