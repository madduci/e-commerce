<?php 
$javascript->link('jquery/jquery', false);


?>


<p style="font-size:16px;font-weight:bolder;margin:60px 0 0 0;">
    	<p style="color:#000;font-size:16px;"><h2>Ordine n.<?php echo $order['Order']['id']; ?><h2></h2></p>
</p>
<p style="text-align:right;font-weight:bolder;"><a href="/Anomalies/add/<?php echo $order['Order']['id']; ?>">Segnala Anomalia</a></p>
<br/>
<table cellspacing="5" style="font-size:14px;color:#000000;">

	<tr>
	<td>
	<strong>Data Ordine:</strong>
	<?php echo date("d-m-Y",strtotime($order['Order']['data_ordine'])); ?>
	</td>
	</tr>
	
	<tr>
	<td>
	<strong>Metodo di Pagamento:</strong>
	<?php echo $order['PaymentMethod']['metodo']; ?>
	</td>
	</tr>
	
	<tr>
	<td>
	<strong>Metodo di Spedizione:</strong>
	<?php echo $order['ShippingMethod']['descrizione']; ?>
	</td>
	</tr>
	
	<tr>
	<td>
	<strong>Costo Spedizione:</strong>
	<?php echo $order['ShippingMethod']['costo']; ?>
	</td>
	</tr>
	
	<tr>
	<td>
	<strong>Tracking Number:</strong>
	<?php if(isset($order['Order']['tracking number'])) {?>
		<?php echo $order['Order']['tracking number']; ?>
	</td>
	</tr>
		<?php } else {?>
		<?php echo "N/A"; ?>
	</td>
	</tr>
		<?php } ?>
	
	<tr>
	<td>	
	<strong>Data Evasione:</strong>
	<?php if(isset($order['Order']['data_evasione'])) {?>
		<?php echo  date("d-m-Y",strtotime($order['Order']['data_evasione'])); ?>
	</td>
	</tr>
		<?php } else {?>
		<?php echo "Non ancora evaso"; ?>
	</td>
	</tr>
		<?php } ?>
		
	<tr>
	<td>
	<strong>Stato Ordine:</strong>	
	<?php echo $order['OrderStatus']['stato']; ?>
	</td>
	</tr>
	
	<tr>
	<td>
	<strong>Note:</strong>
	<?php if(!isset($order['Order']['note'])) {?>
			<?php echo "Nessuna"; ?>
	</td>
	</tr>
		<?php } else {?>
		<?php echo $order['Order']['note']; ?>
	</td>
	</tr>
		<?php } ?>
		
	<tr>
	<td>
	<strong>Codice di Prenotazione:</strong>
	<?php if(isset($order['Reservation']['id'])) {?>
			<?php echo $order['Reservation']['id']; ?>
			</td>
	</tr>
		<?php } else {?>
			<?php echo "Non disponibile"; ?>
		</td>
	</tr>
		<?php } ?>
		<tr><td>
		<strong>	<a href="/OrderProducts/index/<?php echo $order['Order']['id'] ?>">Elenco prodotti ordinati</a>
			</strong>
		</td></tr>
		
	
		
		
</table>



<p align="right" style="font-size:12px;color:#B01;font-weight:bold;">
			
		<a href="/Orders/index">Torna Allo Storico Ordini</a>
			
</p>

