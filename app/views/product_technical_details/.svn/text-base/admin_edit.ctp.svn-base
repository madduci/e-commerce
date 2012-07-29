<div class="productTechnicalDetails form">
<?php echo $form->create('ProductTechnicalDetail');?>
	<fieldset>
 		<legend><?php __('Edit ProductTechnicalDetail');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('detail_type_id');
		echo $form->input('valore_dettaglio');
		echo $form->input('product_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link('Elimina', array('action' => 'delete', $form->value('ProductTechnicalDetail.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('ProductTechnicalDetail.id'))); ?></li>
		<li><?php echo $html->link("Torna all'elenco", array('action' => 'index'));?></li>
	</ul>
</div>
