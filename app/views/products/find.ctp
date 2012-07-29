<?php 
	$javascript->link('jquery/jquery', false);
	$javascript->link('jquery/plugins/jquery.slider', false);

?>

<br>

<p style="font-size:14px;color:#000;display:inline;">
<p style="margin:40px 0 0 0;">

<h2>Corrispondenze trovate
</h2>

</p>

</p>

<br/>

<table id="mytable" cellspacing="0" summary="" style="margin:30px 0 0 0">

	<tr>
	<th scope="col" ><?php echo 'codice prodotto';?></th>
	<th scope="col" ><?php echo 'nome prodotto';?></th>
	<th scope="col" ><?php echo 'disponibilità';?></th>
	<th scope="col" ><?php echo 'prezzo';?></th>
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
			<?php if($product['Product']['product_status_id']>0){
			 ?>
			 <img style="margin:0 0 0 50px;" src="/img/icons/accept.png"/>
			 <?php } else {?>
			 <img style="margin:0 0 0 50px;" src="/img/icons/delete.png"/>
			 <?php } ?>
		</td>
		<td>
			<?php echo $product['Product']['prezzo'].' €'; ?>
		</td>
				
		
	</tr>
<?php endforeach; ?>
</table>

