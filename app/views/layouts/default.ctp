<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<?php echo $html->charset(); ?>
	<title>Benvenuto sul portale di e-commerce - FrontOffice</title>
	<?php
		
		echo $html->meta('icon');
		$javascript->link('jquery/jquery',false);
		echo $html->css('newstyle.css');
		echo $scripts_for_layout;
	?>

</head>
<body>
<div id="wrapper">
	<div id="header">
		<div id="logo">
			<h1><a href="/"><img src="/img/icons/shopping-cart-128x128.png" title="BASKET" height="60" width="60" /> Basket</a></h1>
			
		</div>
		<div id="login">
		 <?php if(!isset($_SESSION['Auth']['Account'])){ ?>		                                
                <a href="/Accounts/add">Registrati</a>
				 oppure
				 <a href="/Accounts/login">Effettua il login</a> 
                 <?php } else{ ?>  
				 Benvenuto <a style="#BC1B32" href="/Accounts/index"><?php echo $_SESSION['Auth']['Account']['username']; ?></a> |       
                 <a style="#BC1B32" href="/Accounts/logout"><img style="display:inline;" width="15" height="15" src="/img/icons/exit.png"/></a>    
				 <?php }?>
		</div>
	</div>
	<!-- end #header -->
	<div id="menu">
		<ul id="nav">
			<li id="home"><a href="/Products/index">Home page</a></li>
			<li id="volantino"><a href="/Flyers">Volantino</a></li>
			<li id="offerte"><a href="/OffersProducts">Offerte</a></li>
			<li id="prodotti"><a href="/Products/lists">Tutti i Prodotti</a></li>			
			<li id="contatti"><a href="/Contacts">Contattaci</a></li>
			<li id="faq"><a href="/Faqs">F.A.Q.</a></li>
		</ul>
	</div>
	<!-- end #menu -->		  
	
	<div id="page">
	<div id="page-bgtop">
	<div style="margin:20px 0 0 0;" id="page-bgbtm">
		<div id="content">			
			 	<div class="post">
					
					<?php $session->flash(); ?>
					<?php $session->flash('auth'); ?>
					<?php echo $content_for_layout; ?>
			
				</div>
				<div style="clear: both;">&nbsp;</div>	
		</div>
		<!-- end #content -->
	
	
	<div id="sidebar">
		<ul>
			<li>
					<div id="search" >
						
					<form method="get" action="/Products/find">
						<strong>Ricerca</strong>
						<div>
							<input type="text" name="nome" id="search-text" value="" />
							<input type="submit" id="search-submit" value="Vai" />
							
						</div>
					</form>
					
					</div>
					<div style="clear: both;">&nbsp;</div>
				</li>
				<?php 
				$today=date("Y-m-d");
				if(isset($_SESSION['Offers']) && isset($_SESSION['Customer']))
					if($today<=$_SESSION['Offers']['Offer']['fineprenotazione'])
						{?>
				<li style="background:url(/img/icons/offerta.png) no-repeat top right;">
					<h2>Offerte</h2>
					<p style="text-align:left;"><a href="/Offers/index">Clicca qui per visualizzare le offerte</a>
					<?php if(isset($_SESSION['CartOffers'])){?>
					<a href="/Carts/reservation"><u>Prodotti da prenotare</u></a>
					<?php } ?>
					</p>
					
					</li>
				<?php }?>
				
				<li>
					<h2>Il tuo carrello</h2>
					<p><a href="/Carts/index">Clicca per visualizzare i prodotti</a></p>
				</li>
				<li>
					<h2>Categorie</h2>
					<ul>
						
					<?php
					
					$categories=$_SESSION['categories'];
					 if(isset($categories)){
					
					 foreach($categories as $category){ ?>
					
						<li>
						<a href="/Products/index/<?php echo $category['ProductCategory']['id'] ?>">
							<?php echo $category['ProductCategory']['name'] ;?>
						</a>
						</li>
						
						<?php	}
					 } 
					 ?>
					</ul>
						
				</li>
			</ul>
		</div>
		<!-- end #sidebar -->
		<div style="clear: both;">&nbsp;</div>
	</div>
	</div>
	</div>
	<!-- end #page -->
</div>
	<div id="footer">
		<p>Copyright (c) 2009 BasketINGSW.com. All rights reserved. Design by Gruppo IV Ing del Software.</p>
	</div>
	<!-- end #footer -->
</body>
</html>
