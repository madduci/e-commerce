<?php 
	$javascript->link('jquery/jquery', false);
?>

<br>
<?php 

if(isset($products) && !empty($products)){?>
<p style="font-size:14px;color:#000;display:inline;">
<p style="margin:40px 0 0 0;">

<h2>Volantino offerte
</h2>

</p>

</p>

<br/>

<table id="mytable" cellspacing="0" summary="" style="margin:30px 0 0 0">

	<tr>
	<th scope="col" ><?php echo $paginator->sort('codice_prodotto');?></th>
	<th scope="col" ><?php echo $paginator->sort('nome prodotto');?></th>
	<th scope="col" ><?php echo $paginator->sort('disponibilità');?></th>
	<th scope="col" ><?php echo $paginator->sort('prezzo');?></th>

	
	</tr>
	

<?php

$products=$products[0]['Product'];

$i = 0;
foreach ($products as $product):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>

	<tr<?php echo $class;?>>
		
		<td>
			<?php echo $product['codice_prodotto']; ?>
		</td>
		<td>
			<a style="color:#BC1B32;" href="/Products/view/<?php echo $product['id'];?>">
			<?php echo "<u>".$product['nome']."</u>"; ?>
			</a>
		</td>
			
		<td>
			<?php if($product['product_status_id']>0){
			 ?>
			 <img style="margin:0 0 0 50px;" src="/img/icons/accept.png" height="20" width="20"/>
			 <?php } else {?>
			 <img style="margin:0 0 0 50px;" src="/img/icons/delete.png" height="20" width="20"/>
			 <?php } ?>
		</td>
		<td>
			<?php echo $product['prezzo'].' €'; ?>
		</td>
		
			
		
	</tr>
<?php endforeach; ?>
</table>



<div class="paging">
	<?php echo $paginator->prev('<< precedente', array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next('successivo >>', array(), null, array('class' => 'disabled'));?>
</div>
<?php } else {?>
<p style="font-size:14px;color:#000;display:inline;">
<p style="margin:40px 0 0 0;">

<h2>Non &egrave; disponibile un volantino al momento
</h2>

</p>
</p>
<p><a href="/">Torna alla pagina principale</a></p>
<?php } ?>

