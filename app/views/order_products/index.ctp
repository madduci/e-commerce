<?php 
	$javascript->link('jquery/jquery', false);
	$javascript->link('jquery/plugins/jquery.slider', false);
	
?>


<p style="font-size:14px;color:#000;display:inline;">
<p style="margin:40px 0 0 0;">

<h2>Prodotti ordinati
</h2>

</p>

</p>



<table id="mytable" cellspacing="0" summary="" style="margin:30px 0 0 0">

	
	<tr>
	<th scope="col" ><?php echo 'codice ordine';?></th>
	<th scope="col" ><?php echo 'codice prodotto';?></th>
	<th scope="col" ><?php echo 'nome';?></th>
	<th scope="col" ><?php echo 'quantità';?></th>
	<th scope="col" ><?php echo 'prezzo unitario';?></th>
	<th scope="col" ><?php echo 'prezzo';?></th>
	
	</tr>
	

<?php

$i = 0;
foreach ($orderProducts as $orderProduct):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>

	<tr<?php echo $class;?>>
		
		<td>
			<a style="color:#BC1B32;" href="/Orders/view/<?php echo $orderProduct['Order']['id'];?>">
			<?php echo $orderProduct['Order']['id']; ?></a>
		</td>
		<td>
			<a style="color:#BC1B32;" href="/Products/view/<?php echo $orderProduct['Product']['id'];?>">
			<?php echo "<u>".$orderProduct['Product']['codice_prodotto']."</u>"; ?>
			</a>
		</td>
		<td>
			<?php echo "<u>".$orderProduct['Product']['nome']."</u>"; ?>
		</td>
		
		<td>
			<?php echo $orderProduct['OrderProduct']['qta'];?>
		</td>
		<td>
			<?php echo $orderProduct['OrderProduct']['unitario'].' €'; ?>
		</td>
		<td>
			<?php echo $orderProduct['OrderProduct']['totale'].' €'; ?>
		</td>
			
		
	</tr>
<?php endforeach; ?>
</table>

</div>

<div class="clear"/>


