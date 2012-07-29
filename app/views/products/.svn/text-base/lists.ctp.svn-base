<?php 
	$javascript->link('jquery/jquery', false);
	$javascript->link('jquery/plugins/jquery.slider', false);
?>

<br>
<p style="font-size:14px;color:#000;display:inline;">
<p style="margin:40px 0 0 0;">

<h2>Elenco Prodotti
</h2>

</p>
<p style=text-align:right";>
	<a href="/Products/makepdf">Scarica il listino</a>
</p>
</p>



<table id="mytable" cellspacing="0" summary="" style="margin:30px 0 0 0">

	<tr>
	<th scope="col" ><?php echo $paginator->sort('codice_prodotto');?></th>
	<th scope="col" ><?php echo $paginator->sort('nome');?></th>
	<th scope="col" ><?php echo $paginator->sort('categoria');?></th>
	<th scope="col" ><?php echo $paginator->sort('disponibilità');?></th>
	<th scope="col" ><?php echo $paginator->sort('prezzo unitario');?></th>
	
	</tr>
	

<?php

$i = 0;
foreach ($products as $product):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>

	<tr<?php echo $class;?>>
		
		<td>
			<?php echo $product['Product']['codice_prodotto']; ?>
		</td>
		<td>
			<a style="color:#BC1B32;" href="/Products/view/<?php echo $product['Product']['id'];?>">
			<?php echo "<u>".$product['Product']['nome']."</u>"; ?>
			</a>
		</td>
		<td>
			<a style="color:#BC1B32;" href="/Products/index_categorized/<?php echo $product['ProductCategory']['id'];?>">
			<?php echo "<u>".$product['ProductCategory']['name']."</u>"; ?>
			</a>
		</td>
		
		<td>
			<?php if($product['Product']['product_status_id']>0){
			 ?>
			 <img style="margin:0 0 0 50px;" src="/img/icons/accept.png" width="20" height="20"/>
			 <?php } else {?>
			 <img style="margin:0 0 0 50px;" src="/img/icons/delete.png" width="20" height="20"/>
			 <?php } ?>
		</td>
		<td>
			<?php echo $product['Product']['prezzo'].' €'; ?>
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

<div class="clear"/>


