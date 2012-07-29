<?php 
$javascript->link('jquery/jquery', false);

$javascript->link('jquery/plugins/jquery.popup', false);
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
		<?php
	
		 if(!isset($_SESSION['Customer']) && isset($_SESSION['Auth']['Account']))
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

if(empty($products)){?>
<table style="width: 100%;">
<div>
    <h2>Non ci sono prodotti disponibili</h2>
</div>
</table>
<?php } 
    
else
   { ?>

<div style="margin:40px 0 0 0;width:600px;height:500px;" >
<h2>Galleria Prodotti</h2>
<div id="galleriafoto">
	<ul id="portfolio">	
		<?php  
		foreach($products as $product){?>
		<li><a href="/Products/view/<?php echo $product['Product']['id'];?>">
			<?php if(isset($product['Product']['foto_default'])){?>
			<img src="/img/<?php echo $product['Product']['foto_default'];?>" alt="<?php echo $product['Product']['nome'];?>"/>
			<?php }else if(!empty($product['Product']['ProductFilesystem'])){ ?>
			<img height="200" title=" <?php echo $product['Product']['nome']; ?> " alt="<?php echo $product['Product']['nome']; ?>" src="/img/<?php echo $product['Product']['ProductFilesystem'][0]['id']; ?>" />
			<?php } else {?><img src="/img/00" alt="<?php echo $product['Product']['nome'];?>"/>
			 <?php } ?>
			</a></li>
		<?php } ?>
	</ul>
</div>
</div>
<table style="width: 100%;">  <br/>
<div>
    <h2>Prodotti in evidenza</h2><br/>
		<?php if(isset($idcat)){?>
    	<h4 style="text-align:right;display:inline;">
    		<a href="/Products/index_categorized/<?php echo $idcat; ?>">Visualizza tutti i prodotti</a></h4>
		<?php } ?>
</div>
<br/>
<?php

$i = 0;
foreach ($products as $product){
	
 	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>

<div class="gallery">

	<div class="product_box_addition">
		<div class="product_box_name" style="color:	#A00000;font-size:16px;font-weight:bolder;text-align:center;">
			<div class="indent" style="color:#A00000;font-size:16px;font-weight:bolder;text-align:center;">
				<a href="/Products/view/<?php echo $product['Product']['id']; ?>"><?php echo $product['Product']['nome']; ?></a><br/>
			</div>
	    </div>
		 
		 <div style="text-align: center;width:300px; height:200px;" class="img_box1" > 
				<a href="/Products/view/<?php echo $product['Product']['id']; ?>">
					<?php if(!empty($product['Product']['foto_default'])){?>
					<img height="200" title=" <?php echo $product['Product']['nome']; ?> " alt="<?php echo $product['Product']['nome']; ?>" src="/img/<?php echo $product['Product']['foto_default']; ?>" />
					<?php }else if(!empty($product['Product']['ProductFilesystem'])){ ?>
					<img height="200" title=" <?php echo $product['Product']['nome']; ?> " alt="<?php echo $product['Product']['nome']; ?>" src="/img/<?php echo $product['Product']['ProductFilesystem'][0]['id']; ?>" />
					 <?php }else { ?> 
					 <img height="200" title=" <?php echo $product['Product']['nome']; ?> " alt="<?php echo $product['Product']['nome']; ?>" src="/img/00" />
					 <?php } ?>
					</a><br/>
		 </div><br/>	
		 <div style="display:inline;">
		 
	
		 <div style="float:left;display:inline;color:#FF0000;text-align: right; padding-left: 50px;font-size:14px;font-weight:bolder;" class="product_box_price">
				<div class="indent">
					<strong><?php echo "Prezzo: ".$product['Product']['prezzo'].' €'; ?></strong><br/>
					<br/>
				</div>
  		</div>
		</div>	
		<div style="text-align: right; padding-right: 29px;"><a href="/Products/view/<?php echo $product['Product']['id']; ?>">
			<img width="30" height="30" title=" Info Prodotto " alt="Info Prodotto" src="/img/icons/info.png"/></a><br/>
		</div>
	</div>
              
</div>
<?php } ?>
</table>

 <?php } ?>
