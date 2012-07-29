<?php 
	echo $html->css('datepicker.css', 'stylesheet', false);
	$javascript->link('jquery/plugins/jquery.datepicker', false); 
?>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {
		if ($('#OrderDataEvasione').val() == "")
			var currentdata = <?php echo date("d/m/Y"); ?>;
		else
			var currentdata = $('#OrderDataEvasione').val();
			
		$('#OrderDataEvasione').DatePicker({
			format:'d/m/Y',
			date: $('#OrderDataEvasione').val(),
			current: $('#OrderDataEvasione').val(),
			starts: 1,
			position: 'right',
			onBeforeShow: function(){
				if ($('#OrderDataEvasione').val() == "")
					var currentdata = '<?php echo date("d/m/Y"); ?>';
				else
					var currentdata = $('#OrderDataEvasione').val();
					
				$('#OrderDataEvasione').DatePickerSetDate(currentdata, true);
			},
			onChange: function(formated, dates){
				$('#OrderDataEvasione').val(formated);
				$('#OrderDataEvasione').DatePickerHide();
			}
		});
			
		$(".submitform").live('click',function(e) {
			$("#OrderEditForm").submit();
		});
		
		$('#floatingtop').html($('#titolo').html());
	});
</script>
<div id="floatingtop"></div>
<div class="orders form">
<?php echo $form->create('Order');?>
	<div id="titolo">
		<span style="float:right" class="crud">
			<li class="save"><a href="javascript:void(0);" class="submitform">Salva</a></li>
			<li class="cancel"><?php echo $html->link("Annulla", array('action' => 'index'));?></li>
			<li class="delete"><?php echo $html->link('Elimina', array('action' => 'delete', $form->value('Order.id')), null, sprintf("Sei sicuro di voler eliminare l'ordine #%s e i dati ad esso associati?", $form->value('Order.id'))); ?></li>
		</span>
		<h2>Modifica Ordine: #<?php echo $this->data['Order']['id']; ?></h2>
		<div style="clear:both"></div>
	</div>
	<?php echo $form->input('id'); ?>
	<?php echo $form->hidden('customer_id'); ?>
	<table class="admintables">
		<tbody>
			<tr>
				<td width="10%">Cliente</td>
				<td><?php echo $html->link($order['Customer']['ragione_sociale'], array('controller' => 'Customers', 'action' => 'edit', 'id' => $order['Order']['customer_id']), array('target' => '_blank')); ?></td>
			</tr>
			<tr>
				<td>Data ordine</td>
				<td><?php echo date('d/m/Y', strtotime($order['Order']['data_ordine'])); ?>
				</td>
			</tr>
			<tr>
				<td>Metodo di pagamento</td>
				<td><?php echo $order['PaymentMethod']['metodo']; ?></td>
			</tr>
			<tr>
				<td>Metodo di spedizione</td>
				<td><?php echo $order['ShippingMethod']['descrizione']; ?>
				</td>
			</tr>
			<tr>
				<td>Totale</td>
				<td><span style="color:red">&euro; <?php echo number_format($order['Order']['totale'], 2, '.', ' '); ?></span></td>
			</tr>
			<tr>
				<td>Stato</td>
				<td><?php echo $form->input('order_status_id', array('label' => '')); ?></td>
			</tr>
			<tr>
				<td>Evaso</td>
				<td>
					<?php 
						if (!empty($this->data['Order']['data_evasione']))
							$data_evasione = date('d/m/Y', strtotime($this->data['Order']['data_evasione']));
						else
							$data_evasione = '';
						
						echo $form->input('data_evasione', array('type' => 'text', 'value' => $data_evasione, 'label' => ''));
					?>
				</td>
			</tr>
			<tr>
				<td>Tracking</td>
				<td><?php echo $form->input('tracking', array('label' => '')); ?></td>
			</tr>
			<tr>
				<td>Note</td>
				<td>
					<?php 
						if (!empty($order['Order']['note'])) {
							echo $order['Order']['note'];
						} else {
							echo "Nessuna nota &egrave; stata specificata in fase d'ordine";
						}
					?>
				</td>
			</tr>
			<tr>
				<td colspan="2"><h3 style="color:#000">Prodotti ordinati</h3></td>
			</tr>
			<tr>
				<td colspan="2">
					<table border="0" cellspacing="5" cellpadding="5" id="prodotti">
						<tr>
							<th>Prodotto</th>
							<th>Quantit&agrave;</th>
							<th>Unitario</th>
							<th>Totale (&euro;)</th>
						</tr>
						<?php if (!empty($order['OrderProduct'])): ?>
						<?php foreach ($orderProducts as $orderProduct): ?>
						<tr>
							<td><?php echo $html->link($orderProduct['Product']['codice_prodotto'], array('controller' => 'products', 'action' => 'edit', 'id' => $orderProduct['Product']['id']), array('target' => 'blank')); ?></td>
							<td><?php echo $orderProduct['OrderProduct']['qta']; ?></td>
							<td><?php echo $orderProduct['OrderProduct']['unitario']; ?></td>
							<td><?php echo $orderProduct['OrderProduct']['totale']; ?></td>
						</tr>
						<?php endforeach ?>
						<?php endif ?>
					</table>
				</td>
			</tr>
		</tbody>
	</table>
<?php echo $form->end(); ?>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
</div>
