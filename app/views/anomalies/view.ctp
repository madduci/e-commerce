

<p style="font-size:16px;font-weight:bolder;margin:60px 0 0 0;">
<p style="color:#000;font-size:16px;">Esamina anomalia</p>
		
<br/>
<table cellspacing="5" style="font-size:14px;color:#000000;">


<tr>
	<td>
	<strong>Tipo Anomalia:</strong>
	<?php echo $anomalyTypes[$anomaly['Anomaly']['anomaly_type_id']]; ?>
	</td>
	</tr>
	
	<tr>
	<td>
	<strong>Oggetto Anomalia:</strong>
	<?php echo $anomaly['Anomaly']['oggetto']; ?>
	</td>
	</tr>
	
	<tr>
	<td>
	<strong>Descrizione:</strong>
	<?php echo $anomaly['Anomaly']['descrizione']; ?>
	</td>
	</tr>
	<tr>
	
	<td>
	<strong>Numero Ordine:</strong>
	<?php echo $anomaly['Anomaly']['order_id']; ?>
	</td>
	</tr>
</tr>
</table>
<p align="right" style="font-size:12px;color:#B01;">
			
			
	<a href="/Anomalies">Torna all'elenco delle anomalie.</a>
</p>



