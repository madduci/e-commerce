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


<script type="text/javascript">
	
	$(document).ready(function(){
		
		
		var $totadd=Array();
		var $qtaplus=Array();
		var $qtamin=Array();	
		<?php foreach($carts as $cart): ?>
		
		$qtamin['<?php echo $cart['id']; ?>']=<?php echo $cart['qta_minima_ordinabile']; ?>;
		
		$totadd['<?php echo $cart['id']; ?>'] = <?php echo $cart['quantita']; ?>;
		$qtaplus['<?php echo $cart['id']; ?>'] = <?php echo $cart['qta_incremento']; ?>;
		<?php endforeach ?>
		
	
	
 	
	$(".add").click(function(){
		
		
		if ($totadd[$(this).attr('rel')] < 0) {
			$totadd[$(this).attr('rel')]=0;			
		}
		$totadd[$(this).attr('rel')]=$totadd[$(this).attr('rel')]+$qtaplus[$(this).attr('rel')];
		
		$('#'+$(this).attr('rel')).text($totadd[$(this).attr('rel')]);
		$('#input-'+$(this).attr('rel')).val($totadd[$(this).attr('rel')]);
	});
	
	
	$(".sub").click(function(){
		
		
		$totadd[$(this).attr('rel')]=$totadd[$(this).attr('rel')]-$qtaplus[$(this).attr('rel')];
		if ($totadd[$(this).attr('rel')] > $qtamin[$(this).attr('rel')]) {
		
			$('#' + $(this).attr('rel')).text($totadd[$(this).attr('rel')]);
			$('#input-' + $(this).attr('rel')).val($totadd[$(this).attr('rel')]);
			
		}
		
		else {
				$('#' + $(this).attr('rel')).text(0);
				$.popup.show("Attenzione", "<img style=\"margin:0 0 0 140px\" src=\"/img/icons/warning.png\" height=\"50\" width=\"50\"/><br/>La quantità da lei richiesta per uno dei suoi prodotti non è valida. <br/><br/>Il prodotto sarà eliminato dal carrello.");
       
				$('#input-' + $(this).attr('rel')).val(0);
			}
	});
	
	$('ul#portfolio').innerfade({
						speed: 1000,
						timeout: 5000,
						type: 'sequence',
						containerheight: '220px'
					});
	}
	
	);

	
	
</script>


<p style="font-size:16px;font-weight:bolder;margin:60px 0 0 0;">
    	<p style="color:#000;font-size:16px;">Il tuo carrello</p>
</p>
<br/>
<p style="margin:20px 0 0 0;text-align:right;color:#BC1B32;">
	<strong>Hai un codice di prenotazione? Clicca <u><a href="/Reservations/index">qui</a></u></strong>
</p>
<?php 

if(empty($carts)) 
		echo "<strong>Il tuo carrello è ancora vuoto</strong>"; 
		
	else {
		
		?>

<form method="post" action="/Carts/update" style="float:left; display:inline;"> 
<table id="hor-minimalist-a" style="width:700px;">

	

	<thead>
	<tr>
	<th scope="col"><?php echo 'codice prodotto';?></th>
	<th scope="col"><?php echo 'nome prodotto';?></th>
	<th scope="col"><?php echo 'quantità';?></th>
	<th scope="col"><?php echo 'prezzo';?></th>
	<th scope="col"><?php echo 'azione';?></th>
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
			<a href="/Products/view/<?php echo $cart['id']; ?>"><?php echo $cart['codice_prodotto']; ?></a>
		</td>
		<td>
			<?php echo $cart['nome']; ?>
		</td>
		<td>
			<a style="display:inline;" href="javascript:void(0)" class="add" rel="<?php echo $cart['id']; ?>">+</a>
			<div style="display:inline;" id="<?php echo $cart['id']; ?>" >
			<?php echo $cart['quantita']; ?>
			</div>
			<a style="display:inline;" href="javascript:void(0)" class="sub" rel="<?php echo $cart['id']; ?>">-</a>
			
			<input type="hidden"  id="input-<?php echo $cart['id']; ?>" value="<?php echo $cart['quantita']; ?>" name="data[<?php echo $cart['id']; ?>][quantita][]"  size="2"/>
			<input type="hidden"  id="input-<?php echo $cart['id']; ?>" value="<?php echo $cart['qta_minima_ordinabile']; ?>" name="data[<?php echo $cart['id']; ?>][qta_minima_ordinabile][]"  size="2"/>
			
			
		</td>
		
		<td>
			<?php echo '€ '.$cart['prezzo']; ?>
			
		</td>
		
		<td>
			<a href="/Carts/delete/<?php echo $cart['id']; ?>">
			<img src="/img/icons/delete.png" width="20" height="20"/>
			</a>
			
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


<?php echo $form->submit('/img/icons/aggiorna.png', array('width'=>'40', 'height'=>'40','div'=>'false'));
 ?>  </form>
<br/><br/>
<form style="float:left; display:inline;" method="post" action="/Carts/free"> 
<?php echo $form->submit('/img/icons/empty.png', array('width'=>'40', 'height'=>'40','div'=>'false')); ?> 
</form>

<form style="margin:0 0 0 370px;float:left; display:inline;" method="post" action="/Orders/add"> 
<?php echo $form->submit('/img/icons/next.png', array('width'=>'40', 'height'=>'40','div'=>'false')); ?> 
</form>

<?php } ?>

