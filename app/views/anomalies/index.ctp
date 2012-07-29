
<p style="font-size:14px;color:#000;display:inline;">
<p style="margin:40px 0 0 0;">

<h2>Anomalie segnalate
</h2>

</p>

</p>

<h4 style="text-align:right;"><?php echo $html->link(__('Aggiungi Segnalazione', true), array('action' => 'add')); ?></h4>

<br/>

<table id="mytable" cellspacing="0" summary="" style="margin:10px 0 0 0">
<tr>
	
	<th><?php echo $paginator->sort('Tipo Anomalia','anomaly_type_id');?></th>
	<th><?php echo $paginator->sort('oggetto');?></th>
	<th><?php echo $paginator->sort('descrizione');?></th>
	<th><?php echo $paginator->sort('order_id');?></th>
	<th style="color:#fff;"><?php echo "Azioni";?></th>
</tr>
<?php
$i = 0;

foreach ($anomalies as $anomaly):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		
		<td>
			<?php echo $anomalyTypes[$anomaly['Anomaly']['anomaly_type_id']]; ?>
		</td>
		<td>
			<?php echo $anomaly['Anomaly']['oggetto']; ?>
		</td>
		<td>
			<?php echo $anomaly['Anomaly']['descrizione']; ?>
		</td>
		<td>
			<?php echo $anomaly['Anomaly']['order_id']; ?>
		</td>
		<td>
			<?php echo $html->link(__('Esamina', true), array('action' => 'view', $anomaly['Anomaly']['id']),array('style'=>'color:#000')); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>

<div class="paging">
	<?php echo $paginator->prev('<< precedente', array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next('successivo >>', array(), null, array('class' => 'disabled'));?>
</div>



