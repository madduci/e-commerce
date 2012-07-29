<?php 
	$javascript->link('jquery/jquery', false);
	$javascript->link('jquery/plugins/jquery.slider', false);
	if(isset($Promos)){	
		$Promos=$Promos[0]['Product'];
		}

?>

<br>

<?php if(!empty($Customers)) {
	if(isset($Promos)){?>

<p style="font-size:14px;color:#000;display:inline;">
<p style="margin:40px 0 0 0;">

<h2>Elenco Prodotti in Offerta
</h2>

</p>

</p>

<br/>

<table id="mytable" cellspacing="0" summary="" style="margin:30px 0 0 0">

	<tr>
	<th scope="col" ><?php echo $paginator->sort('codice_prodotto');?></th>
	<th scope="col" ><?php echo $paginator->sort('nome');?></th>
	<th scope="col" ><?php echo $paginator->sort('disponibilità');?></th>
	<th scope="col" ><?php echo $paginator->sort('prezzo originale');?></th>
	<th scope="col" ><?php echo $paginator->sort('prezzo scontato');?></th>
	
	</tr>
	

<?php

$i = 0;
foreach ($Promos as $promo):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>

	<tr<?php echo $class;?>>
		
		<td>
			<?php echo $promo['codice_prodotto']; ?>
		</td>
		<td>
			<a style="color:#BC1B32;" href="/OffersProducts/view/<?php echo $promo['OffersProduct']['id'];?>">
			<?php echo "<u>".$promo['nome']."</u>"; ?>
			</a>
		</td>
			
		<td>
			<?php if($promo['product_status_id']>0){
			 ?>
			 <img style="margin:0 0 0 50px;" src="/img/icons/accept.png"/>
			 <?php } else {?>
			 <img style="margin:0 0 0 50px;" src="/img/icons/delete.png"/>
			 <?php } ?>
		</td>
		<td>
			<strike><?php echo $promo['prezzo'].' €'; ?></strike>
		</td>
		<td style="color:#0000FF">
			<?php echo $promo['OffersProduct']['prezzo'].' €'; ?>
		</td>
			
		
	</tr>
<?php endforeach; ?>
</table>



<div class="paging">
	<?php echo $paginator->prev('<< precedente', array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next('successivo >>', array(), null, array('class' => 'disabled'));?>
</div>
<?php } else { ?>

<p style="font-size:14px;color:#000;display:inline;">
<p style="margin:40px 0 0 0;">

<h2>Non &egrave; disponibile alcun prodotto in offerta
</h2>

</p>
</p>
<p><a href="/">Torna alla pagina principale</a></p>

<?php

} }else {?>
<p style="font-size:14px;color:#000;display:inline;">
<p style="margin:40px 0 0 0;">

<h2>Il tuo Gruppo non rientra nelle offerte proposte
</h2>

</p>

</p>
<p><a href="/">Torna alla pagina principale</a></p>
<?php } ?>



