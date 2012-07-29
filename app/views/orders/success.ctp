<?php 
$javascript->link('jquery/jquery', false);

?>

<p style="font-size:14px;color:#000;display:inline;">
<p style="margin:40px 0 0 0;">

<h2>Ordine Inoltrato con successo
</h2>

</p>

<p style="font-size:14px;margin:30px 0 0 0;">
	<strong>Numero ordine: <?php echo $_SESSION['NumeroOrdine'];?> </strong><br/><br/>
<?php if($_SESSION['Order']['Order']['shipping_method_id']==2){?>
	<strong>Effettua il pagamento con Paypal </strong><br/><br/>
	<a href="http://www.paypal.com">Checkout</a>
	<?php }else { ?>
	<strong>Cordinate Bonifico: </strong><br/><br/>
	Codice ABI: 01-12141411<br/>
	Intestato a: Basket S.R.L.
	<?php } ?>
</p>

<br/><br/>
<div style="display:inline;">
<div style="font-size:12px;color:#B01;display:inline;">
<a href="/">Torna alla Pagina Iniziale</a>
</div>

</div>
