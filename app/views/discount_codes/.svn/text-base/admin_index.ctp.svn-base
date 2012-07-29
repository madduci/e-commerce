<script type="text/javascript">
	$(document).ready(function() {
		$('#floatingtop').html($('#titolo').html());
	});
</script>
<div id="floatingtop"></div>
<div class="discountCodes index">
	<div id="titolo">
		<span style="float:right" class="crud">
			<li class="add"><?php echo $html->link('Nuovo', array('action' => 'add')); ?></li>
		</span>
		<h2>Codici di sconto</h2>
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
				<th><?php echo $paginator->sort('codice');?></th>
				<th class="actions">azioni</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<td scope="col" colspan="3">
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
		<?php foreach ($discountCodes as $discountCode): ?>
		<?php
			$class = null;
	
			if ($i++ % 2 == 0) {
				$class = ' class="odd"';
			}
		?>
			<tr<?php echo $class;?> title="/admin/DiscountCodes/edit/<?php echo $discountCode['DiscountCode']['id']; ?>" style="cursor:pointer">
				<td>
					<?php echo $discountCode['DiscountCode']['id']; ?>
				</td>
				<td>
					<?php echo $discountCode['DiscountCode']['codice']; ?>%
				</td>
				<td class="actions">
					<?php echo $html->link("Modifica", array('action' => 'edit', $discountCode['DiscountCode']['id'])); ?>
				</td>
			</tr>
		<?php endforeach ?>
		</tbody>
	</table>
	<p>&nbsp;</p>
</div>
