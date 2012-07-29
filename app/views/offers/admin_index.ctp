<script type="text/javascript">
	$(document).ready(function() {
		$('#floatingtop').html($('#titolo').html());
	});
</script>
<div id="floatingtop"></div>
<div class="offers index">
	<div id="titolo">
		<span style="float:right" class="crud">
			<li class="add"><?php echo $html->link('Nuovo', array('action' => 'add')); ?></li>
		</span>
		<h2>Offerte</h2>
		<div style="border-bottom: 1px dotted #FF9006">
			<span style="float:right; display:inline;">
				<div class="paging">
					<?php echo $paginator->prev('<< precedente', array(), null, array('class'=>'disabled'));?>
				 | 	<?php echo $paginator->numbers();?>
					<?php echo $paginator->next('successivo >>', array(), null, array('class' => 'disabled'));?>
				</div>
			</span>
			<?php echo $paginator->counter(array('format' => 'Pagina %page% di %pages%, mostrati %current% record su %count% totali')); ?>
		</div>
	</div>
	<table class="admintables">
		<thead>
			<tr>
				<th><?php echo $paginator->sort('id');?></th>
				<th><?php echo $paginator->sort('Tipo offerta', 'offer_type_id');?></th>
				<th><?php echo $paginator->sort('inizio');?></th>
				<th><?php echo $paginator->sort('fine');?></th>
				<th><?php echo $paginator->sort('Gruppo', 'groups_id');?></th>
				<th class="actions">Azioni</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td scope="col" colspan="6">
					<span style="float:right; display:inline">
						<div class="paging">
							<?php echo $paginator->prev('<< precedente', array(), null, array('class'=>'disabled'));?>
						 | 	<?php echo $paginator->numbers();?>
							<?php echo $paginator->next('successivo >>', array(), null, array('class' => 'disabled'));?>
						</div>
					</span>
					<?php echo $paginator->counter(array('format' => 'Pagina %page% di %pages%, mostrati %current% record su %count% totali')); ?>
				</td>
			</tr>
		</tfoot>
		<tbody>
		<?php $i = 0; ?>
		<?php foreach ($offers as $offer): ?>
		<?php
			$class = null;
	
			if ($i++ % 2 == 0) {
				$class = ' class="odd"';
			}
		?>
			<tr<?php echo $class;?> title="/admin/offers/edit/<?php echo $offer['Offer']['id']; ?>" style="cursor:pointer">
				<td>
					<?php echo $offer['Offer']['id']; ?>
				</td>
				<td>
					<?php echo $offer['OfferType']['descrizione']; ?>
				</td>
				<td>
					<?php echo date('d/m/Y', strtotime($offer['Offer']['inizio'])); ?>
				</td>
				<td>
					<?php echo date('d/m/Y', strtotime($offer['Offer']['fine'])) ?>
				</td>
				<td>
					<?php echo $offer['Groups']['gruppo']; ?>
				</td>
				<td class="actions">
					<?php echo $html->link('Modifica', array('action' => 'edit', $offer['Offer']['id'])); ?>
				</td>
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>
	<p>&nbsp;</p>
</div>
