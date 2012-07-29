<?php 
$javascript->link('jquery/jquery', false);
$javascript->link('jquery/plugins/jquery.lightbox', false);
echo $html->css('jquery.lightbox.css');
?>
<style type="text/css">
	/* jQuery lightBox plugin - Gallery style */
	#gallery {
		background-color: #fff;
		
		width: 600px;
	}
	#gallery ul { list-style: none; width:300px; }
	#gallery ul li { display: inline;width:300px; }
	#gallery ul img {
		/*border: 5px solid #fff;
		//border-width: 5px 5px 20px;*/width:300px;
	}
	#gallery ul a:hover img {
		/*border: 5px solid #fff;
		border-width: 5px 5px 20px;*/
		color: #fff;
	}
	#gallery ul a:hover { color: #fff; }
</style>

<script type="text/javascript">
	$(document).ready(function(){
		var $totadd=<?php echo $offersProducts['Product']['qta_minima_ordinabile'];?>;
	
	 $("form").submit(function(event) {
	 	event.preventDefault();
       url="/Carts/addoffer/"+$('#ricercaprodotto').val()+'/'+$totadd;
	   
	   $.get(url, function(data){
	   
	   	if(data[0] == "0")
	   	    alert("Impossibile aggiungere il prodotto. Quantità non sufficiente")
		else
			alert("Prodotto aggiunto con successo")
			
	   })
    });
	
 	var $qtaplus=<?php echo $offersProducts['Product']['qta_incremento'];?>;
	
	$(".add").click(function(){
		
		$totadd=$totadd+$qtaplus;
		$newqta = $totadd;
		$("#qta").val($newqta)
		$("#quant").text($newqta);
	});
	
	
	$(".sub").click(function(){
		
		if ($totadd >= $qtaplus) {
			$totadd = $totadd - $qtaplus;
			$newqta = $totadd;
			
			$("#qta").val($newqta)
			$("#quant").text($newqta);
		}
		
		
	});
	
	 $(function() {
        $('#gallery a').lightBox();
    });
	}
	
	);

</script>


<p style="font-size:14px;color:#000;display:inline;">
<p style="margin:40px 0 0 0;">

<h2>
<?php
	
	echo "<a href=\"/Products/index_categorized/".$offersProducts['Product']['ProductCategory']['id']."\">";
	echo $offersProducts['Product']['ProductCategory']['name']; 
	echo "</a>";
	echo" > <u>".$offersProducts['Product']['nome']."</u>";

?>
</h2>

</p>
<br><br/>

</p>

<div>

<div style="overflow: hidden; float: left; margin-right: 0pt;" id="gallery">
<ul>
 	<li>
 		
<?php if(!empty($offersProducts['Product']['foto_default'])){?>
<a href="/img/<?php echo $offersProducts['Product']['foto_default']; ?>" title="<?php echo $offersProducts['Product']['nome'];?>" class="thickbox" rel="gallery">
	

<img width="300" height="300" title="<?php echo $offersProducts['Product']['nome'];?>" 
	 alt="<?php echo $offersProducts['Product']['nome'];?>" 
	 src="/img/<?php echo $offersProducts['Product']['foto_default']; ?>"/>
	 	</a> 
<?php } else if(!empty($foto)){ ?> 
	 
	 <a href="/img/<?php echo $foto[0]['ProductFilesystem']['filesystem_id']; ?>" title="<?php echo $product['Product']['nome'];?>" class="thickbox" rel="gallery">
	<img width="300" height="250" title="<?php echo $offersProducts['Product']['nome'];?>" 
	 alt="<?php echo $offersProducts['Product']['nome'];?>" 
	 src="/img/<?php echo $foto[0]['ProductFilesystem']['filesystem_id']; ?>"/>
	 </a> 
	 <?php } else {?>
	 	<a href="/img/00"><img src="/img/00" alt="<?php echo $offersProducts['Product']['nome'];?>"/></a>
	 <?php } ?>
		
		
		</li>
<?php foreach($foto as $fotos){
	
	if($fotos['filesystem_id']!=$offersProducts['Product']['foto_default']){
	?>


<li><a href="/img/<?php echo $fotos['filesystem_id'];?>" title="<?php echo $offersProducts['Product']['nome'];?>" class="thickbox" rel="gallery"></a>
	 </li>
<?php
	
}
}?>
</div>
  

<strong><h3 class="productGeneral" id="productPrices" align="center">
	<strong>Prezzo Normale: </strong><strike>
<?php echo '€ '.$offersProducts['Product']['prezzo'];?></strike>
</h3></strong>

<strong><h2 class="productGeneral" id="productPrices" align="center">
	<strong >Prezzo Promozionale: </strong></h2>
<h2 style="color:#E00000;" id="productPrices" align="center"><?php echo $offersProducts['OffersProduct']['prezzo'];?> € !!!</h2>
</strong>

<p style="text-align:right;">
<strong>Disponibilit&agrave;: </strong><?php if($offersProducts['Product']['qta_disponibile']>0){ ?>
	<img style="display:inline;margin:50px 0 0 10px;" src="/img/icons/accept.png" /><?php } ?>
  </p>
<br style="clear:none"/> 
  
  

<p style="font-size:12px;float:left;">
<div style="font-size:12px;float:left;">
<strong>Descrizione Prodotto:</strong><br/>
<br/>

<?php echo $offersProducts['Product']['descrizione']; ?>

<br/><br/>
<br/>
<strong>Dettagli Tecnici:</strong>
<ul>
<?php 
if(!empty($details))
foreach($details as $detail)
{
	echo "<li>".$detail['DetailType']['descrizione'].": ".$detail['ProductTechnicalDetail']['valore_dettaglio']."</li>";

 } 
?>
</ul>
</div>
</p>
<?php

$today=date("Y-m-d");

if($today<=$finepromo){?>
<table style="float:left;display:inline;">

<th></th><th></th><th></th><th></th><th></th>
<form method="post" action="">
    <td>
	<input type="hidden" value="0" name="data[<?php echo $offersProducts['Product']['id']; ?>][quantita][]" id="qta" size="2"/>
	<input type="hidden" id="ricercaprodotto" value="<?php echo $offersProducts['OffersProduct']['id']; ?>"/>		
	<input type="image" title=" Aggiungi " alt="Aggiungi" src="/img/icons/shopapply.png" width="70" height="70"/>
</td></form> 
	<td>Quantit&agrave; da aggiungere al carrello: 
	<a style="display:inline;" href="javascript:void(0);" class="add"><img src="/img/icons/ok.png" width="25" height="25"/>
	</a>
	</td>
	<td>
	<div style="display:inline;" id="quant">
	<?php echo $offersProducts['Product']['qta_minima_ordinabile']; ?> 
	</div></td>
	<td><a style="display:inline;" href="javascript:void(0);" class="sub">
	<img src="/img/icons/min.png" width="25" height="25"/>
	</a></td>

	
</table>
<?php }else{?>

<strong><u>Il termine ultimo per prenotare il prodotto &egrave; scaduto.</u></strong>

<?php } ?>


<div class="clearBoth"/>

</div>
<br style="clear:none">

</div>
<!--bof Additional Product Images -->

<br/>
 
