<?php 
$javascript->link('jquery/jquery', false);
$javascript->link('jquery/plugins/jquery.popup', false);

?>

<style type="text/css">
	
#hor-minimalist-a th {
border-bottom:2px solid #6678B1;
color:#003399;
font-size:16px;
font-weight:normal;
padding:10px 8px;
width:630px;
margin:20px 0 0 0;

}

#hor-minimalist-a td {
font-size:14px;
padding:25px 0 0 30px;

}


#hor-minimalist-a tbody tr:hover td {
color:#000099;
}

ul{list-style:none;}

ul#portfolio li img{
	border: 0px solid #ccc;
	padding: 0px;}
</style>


<p style="font-size:16px;font-weight:bolder;margin:60px 0 0 0;">
    	<p style="color:#000;font-size:16px;">Prodotti da prenotare</p>
</p>
<br/>

<?php 

if(empty($carts)) 
		echo "<strong>Il tuo carrello è ancora vuoto</strong>"; 
		
	else {
		
		?>

<form method="post" action="/Reservations/add" style="float:left; display:inline;"> 
<table id="hor-minimalist-a" style="width:700px;">

	

	<thead>
	<tr>
	<th scope="col"><?php echo 'codice prodotto';?></th>
	<th scope="col"><?php echo 'nome prodotto';?></th>
	<th scope="col"><?php echo 'quantità';?></th>
	<th scope="col"><?php echo 'prezzo';?></th>
	<th scope="col"></th>
	<th scope="col"></th>
	
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
			<a href="/OffersProducts/view/<?php echo $cart['id']; ?>"><?php echo $cart['codice_prodotto']; ?></a>
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
		
		<td>
					
		</td>
		
	</tr>
	

	
</tbody>
<?php endforeach; 
$_SESSION['TotCart']=$totale;?>
<thead>
	<tr>
	<th scope="col"></th>
	<th scope="col"></th>
	<th scope="col"></th>
	<th scope="col"></th>
	<th scope="col"></th>
	<th scope="col"><?php echo "Totale";?></th>
	
	</tr>
	</thead>

<br/><br/>
<tbody>
	<tr<?php echo $class;?>>
		
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		
		<td><strong><?php echo "€ ".$totale;?></strong></td>
		
	</tr>
	
</tbody>
</table>

<br/><br/><br/>


<?php echo $form->submit('/img/icons/next.png', array('width'=>'40', 'height'=>'40','div'=>'false'));
 ?>  </form>

<div style="margin:0 0 0 500px;float:left;">
<form style="float:left; display:inline;" method="post" action="/Carts/freereserve"> 
<?php echo $form->submit('/img/icons/delete.png', array('width'=>'40', 'height'=>'40','div'=>'false')); ?> 
</form>
</div>

<?php } ?>

