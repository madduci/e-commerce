<style type="text/css">
	
#hor-minimalist-a th {
border-bottom:2px solid #6678B1;
color:#003399;
font-size:16px;
font-weight:normal;
padding:40px 0px 20px 0px;
margin:40px 0 0 0;
width: 620px;
}

#hor-minimalist-a td {
font-size:14px;
padding:25px 0 0 20px;

}


#hor-minimalist-a tbody tr:hover td {
color:#000099;

}
	
</style>



<?php 

if(isset($_SESSION['Cart']))
	{		
	
?>

<p style="font-size:14px;color:#000;display:inline;">
<p style="margin:40px 0 0 0;">

<h2>Riepilogo Ordine
</h2>

</p>

</p>    


<table id="hor-minimalist-a">
	<thead >
	<tr>
	<th scope="col" ><?php echo 'codice prodotto';?></th>
	<th scope="col" ><?php echo 'nome prodotto';?></th>
	<th scope="col" ><?php echo 'quantità';?></th>
	<th scope="col" ><?php echo 'prezzo';?></th>
	
	
	</tr>
	</thead>

<?php
$totale=0;
$i = 0;


foreach ($carts as $cart):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
	$totale=$totale+$cart['prezzo'];
?>


<tbody>
	
	<tr<?php echo $class;?>>
		
		<td>
			<a href="/Products/view/<?php echo $cart['id']; ?>"><?php echo $cart['codice_prodotto']; ?></a>
		</td>
		<td>
			<?php echo $cart['nome']; ?>
		</td>
		<td>
			
			<?php echo $cart['quantita']; ?>
			
			
			
		</td>
		
		<td>
			<?php echo '€ '.$cart['prezzo']; ?>
			
		</td>
		
		
		
		
	</tr>
	

	
</tbody>
<?php endforeach; 
$_SESSION['TotCart']=$totale;?>
<br/><br/>
<tr>
	<th  style="margin:60px 0 0 20px;"><strong><?php echo "Totale Parziale";?></strong></th>
	


		<td><strong><?php echo "€ ".$totale;?></strong></td>
		
</tr>
<?php if(isset($_SESSION['DiscountCode'])){?>
<tr>	
	<th style="margin:60px 0 0 20px;" ><strong><?php echo "Codice di Sconto";?></strong></th>
		

	<td><strong><?php echo $_SESSION['DiscountCode']." %";?></strong></td>
		
</tr>
<?php } ?>
<tr>	
	<th style="margin:60px 0 0 20px;" ><strong><?php echo "Costo Spedizione";?></strong></th>
		

	<td><strong><?php echo "€ ".$_SESSION['ShippingMethod']['costo'];?></strong></td>
		
</tr>

<tr>	
	
	<th style="margin:60px 0 0 20px;"><strong><?php echo "Totale";?></strong></th>
	

<?php 
if(isset($_SESSION['DiscountCode'])){
$tot=($totale*(100-$_SESSION['DiscountCode']))/100;
$tot=$tot+$_SESSION['ShippingMethod']['costo'];

}
else
$tot=$totale+$_SESSION['ShippingMethod']['costo'];

?>
	
		<td><strong><?php echo "€ ".$tot;?></strong></td>

</tr>	

</table>

<br/><br/><br/>


<form style="float:right; display:inline;" method="post" action="/OrderProducts/add"> 
<?php echo $form->submit('/img/icons/next.png'); ?>
</form>

<?php } else 
 if(isset($_SESSION['Auth']) && isset($_SESSION['Reservation']))
	{		
	
?>
<p style="font-size:14px;color:#000;display:inline;">
<p style="margin:40px 0 0 0;">

<h2>Riepilogo Ordine
</h2>

</p>

</p>    


<table id="hor-minimalist-a">
	<thead >
	<tr>
	<th scope="col" ><?php echo 'codice prodotto';?></th>
	<th scope="col" ><?php echo 'nome prodotto';?></th>
	<th scope="col" ><?php echo 'quantità';?></th>
	<th scope="col" ><?php echo 'prezzo';?></th>
	
	
	</tr>
	</thead>

<?php
$totale=0;
$i = 0;

foreach ($carts as $cart):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
	$totale=$totale+$cart['ProductReservation']['prezzo'];
?>


<tbody>
	
	<tr<?php echo $class;?>>
		
		<td>
			<a href="/Products/view/<?php echo $cart['OffersProduct']['id']; ?>"><?php echo $cart['Product']['codice_prodotto']; ?></a>
		</td>
		<td>
			<?php echo $cart['Product']['nome']; ?>
		</td>
		<td>
			
			<?php echo $cart['ProductReservation']['quantita']; ?>
			
			
			
		</td>
		
		<td>
			<?php echo '€ '.$cart['ProductReservation']['prezzo']; ?>
			
		</td>
		
		
		
		
	</tr>
	

	
</tbody>
<?php endforeach; 
$_SESSION['TotCart']=$totale;?>
<br/><br/>
<tr>
	<th  style="margin:60px 0 0 20px;"><strong><?php echo "Totale Parziale";?></strong></th>
	


		<td><strong><?php echo "€ ".$totale;?></strong></td>
		
</tr>
<?php if(isset($_SESSION['DiscountCode'])){?>
<tr>	
	<th style="margin:60px 0 0 20px;" ><strong><?php echo "Codice di Sconto";?></strong></th>
		

	<td><strong><?php echo $_SESSION['DiscountCode']." %";?></strong></td>
		
</tr>
<?php } ?>
<tr>	
	<th style="margin:60px 0 0 20px;" ><strong><?php echo "Costo Spedizione";?></strong></th>
		

	<td><strong><?php echo "€ ".$_SESSION['ShippingMethod']['costo'];?></strong></td>
		
</tr>

<tr>	
	
	<th style="margin:60px 0 0 20px;"><strong><?php echo "Totale";?></strong></th>
	
<?php 
if(isset($_SESSION['DiscountCode'])){
$tot=($totale*(100-$_SESSION['DiscountCode']))/100;
$tot=$tot+$_SESSION['ShippingMethod']['costo'];

}
else
$tot=$totale+$_SESSION['ShippingMethod']['costo'];

?>

		<td><strong><?php echo "€ ".$tot;?></strong></td>

</tr>	

</table>

<br/><br/><br/>


<form style="float:right; display:inline;" method="post" action="/OrderProducts/add"> 
<?php echo $form->submit('/img/icons/next.png'); ?>
</form>
<?php } ?>
