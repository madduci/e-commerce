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
	width:220px;
}

label {
	display:inline-block;
	line-height:1.8;
	vertical-align:top;
	width:190px;
}


	

</style>
<p style="font-size:14px;color:#000;display:inline;">
<p style="margin:40px 0 0 0;">

<h2>
Invia una segnalazione
</h2>

</p>
<br><br/>

</p>

<div class="anomalies form">
<?php echo $form->create('Anomaly');?>
	
	<?php
		echo $form->input('anomaly_type_id', array('label' => 'Tipo Anomalia'));
		echo $form->input('oggetto', array('label' => 'Oggetto'));
		echo $form->input('descrizione', array('label' => 'Descrizione'));
		
		//echo $form->input('order_id', array('label' => 'Numero ordine'));
	?>

<input type="hidden" name="data[Anomaly][order_id]" value="<?php echo $order_id; ?>">
<?php echo $form->end('Invia');?>
</div>


