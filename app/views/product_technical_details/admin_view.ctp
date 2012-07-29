<div class="productTechnicalDetails view">
<h2><?php  __('ProductTechnicalDetail');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $productTechnicalDetail['ProductTechnicalDetail']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Detail Type Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $productTechnicalDetail['ProductTechnicalDetail']['detail_type_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Valore Dettaglio'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $productTechnicalDetail['ProductTechnicalDetail']['valore_dettaglio']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Product Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $productTechnicalDetail['ProductTechnicalDetail']['product_id']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link('Modifica', array('action' => 'edit', $productTechnicalDetail['ProductTechnicalDetail']['id'])); ?> </li>
		<li><?php echo $html->link('Elimina', array('action' => 'delete', $productTechnicalDetail['ProductTechnicalDetail']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $productTechnicalDetail['ProductTechnicalDetail']['id'])); ?> </li>
		<li><?php echo $html->link("Torna all'elenco", array('action' => 'index')); ?> </li>
		<li><?php echo $html->link('Nuovo', array('action' => 'add')); ?> </li>
	</ul>
</div>
