<script type="text/javascript">
	$(document).ready(function() {
		$("#toggleOrdini").click(function() {
			$("#ordini").slideToggle();
		});
		
		$("#togglePrenotazioni").click(function() {
			$("#prenotazioni").slideToggle();
		});
		
		$("#toggleAccount").click(function() {
			$("#account").slideToggle();
		});
		
		$("#toggleProdotti").click(function() {
			$("#prodotti").slideToggle();
		});
	});
</script>
<div id="titolo">
	<h2>Dashboard</h2>
</div>
<?php if ($_SESSION['Auth']['Account']['account_type_id'] != 4): ?>
<div id="toggleOrdini" style="background-color: #999; color:#fff; font-size:14px; padding-left: 10px; height:30px; line-height:30px; margin:20px 20px 0 20px; ; cursor:pointer">Ordini in attesa: <?php if (count($ordini) != 0): ?><span style="background-color:#C80402; color:white; padding-left:2px; padding-right:2px"><?php endif ?><?php echo count($ordini); ?><?php if (count($ordini) != 0): ?></span><?php endif ?></div>
<div id="ordini" style="overflow:auto; height:300px; margin:0px 20px 20px 20px; border: 1px solid #999;">
	<table class="admintables">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Data</th>
				<th scope="col">Cliente</th>
				<th scope="col">Totale</th>
			</tr>
		</thead>
		<tbody>
			<?php if (empty($ordini)): ?>
			<tr>
				<td colspan="4">Nessun ordine in attesa di completamento.</td>
			</tr>
			<?php else: ?>
			<?php $i = 0; ?>
			<?php foreach ($ordini as $ordine): ?>
			<?php
				$class = null;

				if ($i++ % 2 == 0) {
					$class = ' class="odd"';
				}
			?>
			<tr <?php echo $class;?>>
				<td><?php echo $html->link($ordine['orders']['id'], array('controller' => 'Orders', 'action' => 'edit', 'id' => $ordine['orders']['id'])); ?></th>
				<td><?php echo date('d/m/Y', strtotime($ordine['orders']['data_ordine'])); ?></th>
				<td><?php echo $html->link($ordine['customers']['ragione_sociale'], array('controller' => 'Customers', 'action' => 'edit', 'id' => $ordine['customers']['id'])); ?></th>
				<td>&euro; <?php echo $ordine['orders']['totale']; ?></th>
			</tr>
			<?php endforeach ?>
			<?php endif ?>
		</tbody>
	</table>
</div>
<div id="togglePrenotazioni" style="background-color: #999; color:#fff; font-size:14px; padding-left: 10px; height:30px; line-height:30px; margin:20px 20px 0 20px; cursor:pointer">Prenotazioni promozione: <?php if (count($prenotazioni) != 0): ?><span style="background-color:#C80402; color:white; padding-left:2px; padding-right:2px"><?php endif ?><?php echo count($prenotazioni); ?><?php if (count($prenotazioni) != 0): ?></span><?php endif ?></div>
<div id="prenotazioni" style="overflow:auto; height:300px; margin:0px 20px 20px 20px; border: 1px solid #999; display:none">
	<table class="admintables">
		<thead>
			<tr>
				<th scope="col">Codice prentoazione</th>
				<th scope="col">Cliente</th>
				<th scope="col">Data prenotazione</th>
			</tr>
		</thead>
		<tbody>
			<?php if (empty($prenotazioni)): ?>
			<tr>
				<td colspan="3">Nessuna prenotazione effettuata.</td>
			</tr>
			<?php else: ?>
			<?php $i = 0; ?>
			<?php foreach ($prenotazioni as $prenotazione): ?>
			<?php
				$class = null;

				if ($i++ % 2 == 0) {
					$class = ' class="odd"';
				}
			?>
			<tr <?php echo $class;?>>
				<td><?php echo $html->link($prenotazione['reservations']['codice'], array('controller' => 'reservations', 'action' => 'view', 'id' => $prenotazione['reservations']['id'])); ?></td>
				<td><?php echo $html->link($prenotazione['customers']['ragione_sociale'], array('controller' => 'customers', 'action' => 'edit', 'id' => $prenotazione['customers']['id'])); ?></td>
				<td><?php echo date('d/m/Y', strtotime($prenotazione['reservations']['data'])); ?></td>
			</tr>
			<?php endforeach ?>
			<?php endif ?>
		</tbody>
	</table>
</div>
<div id="toggleAccount" style="background-color: #999; color:#fff; font-size:14px; padding-left: 10px; height:30px; line-height:30px; margin:20px 20px 0 20px; cursor:pointer">Clienti in attesa di attivazione: <?php if (count($account) != 0): ?><span style="background-color:#C80402; color:white; padding-left:2px; padding-right:2px"><?php endif ?><?php echo count($account); ?><?php if (count($account) != 0): ?></span><?php endif ?></div>
<div id="account" style="overflow:auto; height:300px; margin:0px 20px 20px 20px; border: 1px solid #999; display:none">
	<table class="admintables">
		<thead>
			<tr>
				<th scope="col">Cliente</th>
				<th scope="col">Email</th>
				<th scope="col">Account</th>
			</tr>
		</thead>
		<tbody>
			<?php if (empty($account)): ?>
			<tr>
				<td colspan="3">Nessun utente in attesa di attivazione.</td>
			</tr>
			<?php else: ?>
			<?php $i = 0; ?>
			<?php foreach ($account as $a): ?>
			<?php
				$class = null;

				if ($i++ % 2 == 0) {
					$class = ' class="odd"';
				}
			?>
			<tr <?php echo $class;?>>
				<td><?php echo $html->link($a['customers']['ragione_sociale'], array('controller' => 'Customers', 'action' => 'edit', 'id' => $a['customers']['id'])); ?></td>
				<td><?php echo $html->link($a['accounts']['email'], 'mailto:'.$a['accounts']['email']); ?></td>
				<td><?php echo $html->link($a['accounts']['username'], array('controller' => 'Accounts', 'action' => 'edit', 'id' => $a['accounts']['id'])); ?></td>
			</tr>
			<?php endforeach ?>
			<?php endif ?>
		</tbody>
	</table>
</div>
<?php endif ?>
<?php if ($_SESSION['Auth']['Account']['account_type_id'] != 2): ?>
<div id="toggleProdotti" style="background-color: #999; color:#fff; font-size:14px; padding-left: 10px; height:30px; line-height:30px; margin:20px 20px 0 20px; cursor:pointer">Prodotti in esaurimento: <?php if (count($prodotti) != 0): ?><span style="background-color:#C80402; color:white; padding-left:2px; padding-right:2px"><?php endif ?><?php echo count($prodotti); ?><?php if (count($prodotti) != 0): ?></span><?php endif ?></div>
<div id="prodotti" style="overflow:auto; height:300px; margin:0px 20px 20px 20px; border: 1px solid #999; display:none">
	<table class="admintables">
		<thead>
			<tr>
				<th scope="col">Codice Prodotto</th>
				<th scope="col">Nome</th>
				<th scope="col">Quantit&agrave; residua</th>
			</tr>
		</thead>
		<tbody>
			<?php if (empty($prodotti)): ?>
			<tr>
				<td colspan="3">Nessun prodotto in esaurimento.</td>
			</tr>
			<?php else: ?>
			<?php $i = 0; ?>
			<?php foreach ($prodotti as $prodotto): ?>
			<?php
				$class = null;

				if ($i++ % 2 == 0) {
					$class = ' class="odd"';
				}
			?>
			<tr <?php echo $class;?>>
				<td><?php echo $html->link($prodotto['products']['codice_prodotto'], array('controller' => 'Product', 'action' => 'edit', 'id' => $prodotto['products']['id'])); ?></th>
				<td><?php echo $prodotto['products']['nome']; ?></th>
				<td><?php echo $prodotto['products']['qta_disponibile']; ?></th>
			</tr>
			<?php endforeach ?>
			<?php endif ?>
		</tbody>
	</table>
</div>
<?php endif ?>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

