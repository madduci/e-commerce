<?php 
$javascript->link('jquery/jquery', false);
$javascript->link('jquery/plugins/jquery.innerfade', false);
?>
<script>
    $(document).ready( function(){
		$('ul#portfolio').innerfade({
						speed: 1000,
						timeout: 5000,
						type: 'sequence',
						containerheight: '220px'
					});
		
     function popup(){
	 	
		$.popup.show("Attenzione", "<img style=\"margin:0 0 0 140px\" src=\"/img/icons/warning.png\" height=\"50\" width=\"50\"/><br/>Non hai inserito i dati del tuo punto vendita. <br/>Clicca <a style=\"color:#FFFFFF\" href=\"/Customers/add\">qui</a> per inserire i dati.");
       
           }
		<?php if(!isset($_SESSION['Customer']) && isset($_SESSION['Auth']))
			echo "popup();"; ?>
    });
 </script>
 <style type="text/css">
  		
.gallery{

	float:left;
}

.content{
	
	float:left;
}


.product_box_addition{
	
	width:300px;
	height:300px;
	float:left;
	margin:20px 0 0 0;
	border:none;
}
ul{list-style:none;}

ul#portfolio li img{
	border: 0px solid #ccc;
	padding: 0px;
}
</style>



<?php 

if(empty($offersProducts)){?>
<p style="font-size:14px;color:#000;display:inline;">
<p style="margin:40px 0 0 0;">

<h2>Non ci sono prodotti in offerta
</h2>

</p>
</p>
<p><a href="/">Torna alla pagina principale</a></p>
<?php } 
    
else
   {  ?>
   
   
<div style="margin:40px 0 0 0;width:600px;height:500px;" >
<h2>Galleria Offerte</h2>
<div id="galleriafoto">
	<ul id="portfolio">	
		<?php foreach($offersProducts as $offersProduct){?>
		<li><a href="/OffersProducts/view/<?php echo $offersProduct['OffersProduct']['id'];?>">
			<?php if(isset($offersProduct['Product']['foto_default'])){?>
			<img src="/img/<?php echo $offersProduct['Product']['foto_default'];?>" alt="<?php echo $offersProduct['Product']['nome'];?>"/>
			<?php }else if(!empty($offersProduct['Product']['ProductFilesystem'])){ ?>
			<img height="200" title=" <?php echo $product['Product']['nome']; ?> " alt="<?php echo $offersProduct['Product']['nome']; ?>" src="/img/<?php echo $offersProduct['Product']['ProductFilesystem'][0]['id']; ?>" />
			<?php } else {?><img src="/img/00" alt="<?php echo $offersProduct['Product']['nome'];?>"/>
			 <?php } ?>
			 </a></li>
		<?php } ?>
	</ul>
</div>
</div>
<table style="width: 100%;">  <br/>
<div>
  <h2>Offerte in evidenza</h2>
<h4 style="text-align:right;display:inline;">
<a href="/Offers">Visualizza tutti i prodotti</a>
</h4>
</div>
<br/>
			

<?php

$i = 0;
foreach ($offersProducts as $offersProduct){
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
	
	
?>

<div class="gallery">

	<div class="product_box_addition">
		<div class="product_box_name" style="color:	#A00000;font-size:16px;font-weight:bolder;text-align:center;">
			<div class="indent" style="color:#A00000;font-size:16px;font-weight:bolder;text-align:center;">
				
				<a href="/OffersProducts/view/<?php echo $offersProduct['OffersProduct']['id']; ?>"><?php echo $offersProduct['Product']['nome']; ?></a><br/>
			</div>
	  </div>
		 <div style="text-align: center;" class="img_box1"> 
		 
				<a href="/OffersProducts/view/<?php echo $offersProduct['OffersProduct']['id']; ?>">
					<?php if(!empty($offersProduct['Product']['foto_default'])){?>
					<img height="200" title=" <?php echo $offersProduct['Product']['nome']; ?> " alt="<?php echo $offersProduct['Product']['nome']; ?>" src="/img/<?php echo $offersProduct['Product']['foto_default']; ?>" />
					<?php }else { ?> 
					 <img height="200" title=" <?php echo $offersProduct['Product']['nome']; ?> " alt="<?php echo $offersProduct['Product']['nome']; ?>" src="/img/00" />
					 <?php } ?>
					</a><br/>
		 </div><br/>	
		 <div style="display:inline;">
		 
	
		 <div style="float:left;display:inline;color:#FF0000;text-align: right; padding-left: 50px;font-size:14px;font-weight:bolder;" class="product_box_price">
				<div class="indent">
					<strong><?php echo "Prezzo: ".$offersProduct['OffersProduct']['prezzo'].' €'; ?></strong><br/><br/>
					</div>
  
		</div>	
		</div>
		<div style="text-align: right; padding-right: 29px;"><a href="/OffersProducts/view/<?php echo $offersProduct['OffersProduct']['id']; ?>">
			<img width="30" height="30" title=" Info Prodotto " alt="Info Prodotto" src="/img/icons/info.png"/></a><br/>
		</div>
	</div>
              
</div>
<?php }?>
</table>

 <?php } ?>
