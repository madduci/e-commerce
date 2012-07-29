<?php 
$javascript->link('jquery/jquery', false);


?>


<p style="font-size:14px;color:#000;display:inline;">
<p style="margin:40px 0 0 0;">

<h2>Storico Ordini
</h2>

</p>

</p>


<table id="mytable" cellspacing="0" summary="">

<tr>
	<th scope="col" ><?php echo $paginator->sort('id');?></th>
	<th scope="col" ><?php echo $paginator->sort('data_ordine');?></th>
	<th scope="col" ><?php echo $paginator->sort('data_evasione');?></th>
	<th scope="col" ><?php echo $paginator->sort('stato_ordine');?></th>
	<th scope="col" ><?php echo $paginator->sort('totale');?></th>
	<th scope="col" ><?php echo "Azione";?></th>
	
</tr>
	
<?php

$i = 0;
foreach ($orders as $order):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<a style="color:#BC1B32;" href="/Orders/view/<?php echo $order['Order']['id']; ?>">
			<?php echo $order['Order']['id']; ?></a>
		</td>
		
		<td>
			<?php echo date("d-m-Y",strtotime($order['Order']['data_ordine'])); ?>
		</td>
		
		<td>
			<?php if($order['Order']['data_evasione']!=NULL) echo date("d-m-Y",strtotime($order['Order']['data_evasione']));
				else echo "Non ancora evaso"; ?>
		</td>
		<td>
			<?php echo $order['OrderStatus']['stato']; ?>
		</td>
		
		<td>
			<?php echo "€ ".number_format($order['Order']['totale'],2,"."," "); ?>
		</td>
		
		<td class="actions">
			<a style="color:#BC1B32;" href="/Orders/view/<?php echo $order['Order']['id']; ?>">Visualizza</a>
			
		</td>
	</tr>
<?php endforeach; ?>
</table>
<div class="paging">
 		<?php echo $paginator->prev('<< precedente', array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $paginator->numbers();?>
		<?php echo $paginator->next('successivo >>', array(), null, array('class' => 'disabled'));?>
</div>


