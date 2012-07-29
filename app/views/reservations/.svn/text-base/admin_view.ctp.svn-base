<script type="text/javascript">
	$(document).ready(function() {
		$('#floatingtop').html($('#titolo').html());
	});
</script>
<div id="floatingtop"></div>
<div class="reservations view">
	<div id="titolo">
		<span style="float:right" class="crud">
			<li class="cancel"><?php echo $html->link("Torna all'elenco", array('action' => 'index')); ?> </li>
			<li class="delete"><?php echo $html->link('Elimina', array('action' => 'delete', $reservation['Reservation']['id']), null, sprintf("Sei sicuro di voler eliminare questa prenotazione?")); ?> </li>
		</span>
		<h2>Prenotazione <?php echo $reservation['Reservation']['id']; ?> a nome di <?php echo $reservation['Customer']['ragione_sociale']; ?></h2>
	</div>
	<table class="admintables">
		<tbody>
			<tr>
				<td width="20%">Codice prenotazione</td>
				<td>
					<?php echo $reservation['Reservation']['codice']; ?>
				</td>
			</tr>
			<tr>
				<td>Ragione Sociale</td>
				<td>
					<?php echo $reservation['Customer']['ragione_sociale']; ?>
				</td>
			</tr>
			<tr>
				<td>Data</td>
				<td>
					<?php echo date('d/m/Y', strtotime($reservation['Reservation']['data'])); ?>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<h3>Prodotti prenotati</h3>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<table border="0" cellspacing="5" cellpadding="5">
						<tr>
							<th>Prodotto</th>
							<th>Quantit&agrave;</th>
							<th>Prezzo</th>
						</tr>
						<?php foreach ($reservationProducts as $key => $value): ?>
						<tr>
							<td>
								<?php echo $html->link($value['Product']['codice_prodotto'], array('controller' => 'Products', 'action' => 'edit', $value['Product']['id'])); ?>
							</td>
							<td>
								<?php echo $value['ProductReservation']['quantita']; ?>
							</td>
							<td>
								<?php echo $value['ProductReservation']['prezzo']; ?>
							</td>
						</tr>
						<?php endforeach ?>
					</table>
					
				</td>
			</tr>
		</tbody>
	</table>
</div>
