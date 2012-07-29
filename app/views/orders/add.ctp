<?php 
$javascript->link('jquery/jquery', false);
?>

<style type="text/css">
 

input, select, textarea{
	clear:left;
	color:#000000;
	font-family:Tahoma,Lucida Grande,sans-serif;
	font-size:100%;
	margin:5px 0 0;
	padding:1px 3px;
}
textarea{
	
	width:300px;
}
label {
	display:inline-block;
	line-height:1.8;
	vertical-align:top;
	width:130px;
}

	

</style>
<?php 

if(isset($_SESSION['Cart']) || isset($_SESSION['Reservation']))
	{		
	
?>

<p style="font-size:16px;font-weight:bolder;margin:60px 0 0 0;">
    	<p style="color:#000;font-size:16px;">Nuovo Ordine</p>
</p>
<br/>

<div class="orders form">
<?php echo $form->create('Order');?>
	
	<?php
		
		echo $form->input('payment_method_id', array('label' => 'Metodo di Pagamento'));
		echo $form->input('shipping_method_id', array('label' => 'Metodo di Spedizione'));
		echo $form->input('note');
		
	?>
	
<?php 
echo $form->submit('/img/icons/next.png');
echo $form->end();?>
</div>


<p align="right" style="font-size:12px;color:#B01;">
			
		<a href="/Carts"><img src="/img/icons/shoppingcart.png" width="30" height="30"/></a> | 
		<a href="/"><img src="/img/icons/exit.png" width="30" height="30"/></a>
			
</p>
<?php } else {?>

<p style="ont-size:16px;font-weight:bolder;margin:60px 0 0 0;">
    	<p style="color:#000;font-size:16px;">Il tuo carrello &egrave; vuoto</p>
</p>
<br/>
<p align="right" style="font-size:12px;color:#B01;font-weight:bold;">
			
		<a href="/"><img src="/img/icons/exit.png" width="30" height="30"/></a>
			
</p>

<?php } ?>
