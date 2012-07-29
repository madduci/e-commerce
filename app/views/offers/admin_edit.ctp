<?php 
	echo $html->css('datepicker.css', 'stylesheet', false);
	$javascript->link('jquery/plugins/jquery.datepicker', false); 
?>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
		if ($('#OfferInizio').val() == "")
			var currentdata = <?php echo date("d/m/Y"); ?>;
		else
			var currentdata = $('#OfferInizio').val();
		
		$('#OfferInizio').DatePicker({
			format:'d/m/Y',
			date: $('#OfferInizio').val(),
			current: $('#OfferInizio').val(),
			starts: 1,
			position: 'right',
			onBeforeShow: function(){
				if ($('#OfferInizio').val() == "")
					var currentdata = '<?php echo date("d/m/Y"); ?>';
				else
					var currentdata = $('#OfferInizio').val();
					
				$('#OfferInizio').DatePickerSetDate(currentdata, true);
			},
			onChange: function(formated, dates){
				$('#OfferInizio').val(formated);
				$('#OfferInizio').DatePickerHide();
			}
		});
		
		if ($('#OfferFine').val() == "")
			var currentdata = <?php echo date("d/m/Y"); ?>;
		else
			var currentdata = $('#OfferFine').val();
			
		$('#OfferFine').DatePicker({
			format:'d/m/Y',
			date: $('#OfferFine').val(),
			current: $('#OfferFine').val(),
			starts: 1,
			position: 'right',
			onBeforeShow: function(){
				if ($('#OfferFine').val() == "")
					var currentdata = '<?php echo date("d/m/Y"); ?>';
				else
					var currentdata = $('#OfferFine').val();
					
				$('#OfferFine').DatePickerSetDate(currentdata, true);
			},
			onChange: function(formated, dates){
				$('#OfferFine').val(formated);
				$('#OfferFine').DatePickerHide();
			}
		});
		
		$(".submitform").live('click',function(e) {
			$("#OfferEditForm").submit();
		});
		
		$('#floatingtop').html($('#titolo').html());
		
		$('.addProdotto').click(function() {
			$('#prodotti').append('<tr>'+$('tr[class=new]').html()+'</tr>');
		})
	});
</script>
<div id="floatingtop"></div>
<div class="offers form">
<?php echo $form->create('Offer');?>
	<div id="titolo">
		<span style="float:right" class="crud">
			<li class="save"><a href="javascript:void(0);" class="submitform">Salva</a></li>
			<li class="cancel"><?php echo $html->link("Annulla", array('action' => 'index'));?></li>
			<li class="delete"><?php echo $html->link('Elimina', array('action' => 'delete', $form->value('Offer.id')), null, sprintf('Sicuro di eliminare %s %s?', $offerTypes[$this->data['Offer']['offer_type_id']], $form->value('Offer.id'))); ?></li>
		</span>
		<h2>Modifica Offerta: <?php echo $offerTypes[$this->data['Offer']['offer_type_id']]; ?> <?php echo $this->data['Offer']['id']; ?></h2>
		<div style="clear:both"></div>
	</div>
	<?php echo $form->input('id'); ?>
	<?php echo $form->hidden('offer_type_id'); ?>
	<table class="admintables">
		<tbody>
			<tr>
				<td width="10%">Tipo offerta</td>
				<td><?php echo $offerTypes[$this->data['Offer']['offer_type_id']]; ?></td>
			</tr>
			<tr>
				<td>Data inizio</td>
				<td><?php echo $form->input('inizio', array('type' => 'text', 'value' => date('d/m/Y', strtotime($this->data['Offer']['inizio'])), 'label' => '')); ?></td>
			</tr>
			<tr>
				<td>Data fine</td>
				<td><?php echo $form->input('fine', array('type' => 'text', 'value' => date('d/m/Y', strtotime($this->data['Offer']['fine'])), 'label' => '')); ?></td>
			</tr>
			<tr>
				<td>Gruppo</td>
				<td><?php echo $form->input('groups_id', array('label' => '')); ?></td>
			</tr>
			<tr>
				<td colspan="2"><h3 style="color:#000">Prodotti in offerta</h3></td>
			</tr>
			<tr>
				<td colspan="2">
					<form action="/admin/offers/add_offer_products" method="post" id="offerProductsForm">
						<input type="hidden" name="data[Offer][offer_type_id]" value="<?php echo $this->data['Offer']['offer_type_id']; ?>" id="some_name">
						<table border="0" cellspacing="5" cellpadding="5" id="prodotti">
							<tr>
								<th>prodotto</th>
								<?php if ($this->data['Offer']['offer_type_id'] == 1): ?>
								<th>prezzo promo</th>
								<?php endif ?>
								<th>canc</th>
							</tr>
							<?php if (!empty($offerProducts)): ?>
							<?php foreach ($offerProducts as $offerProduct): ?>
							<tr>
								<td>
									<input type="hidden" name="data[OfferProduct][edit][id][]" value="<?php echo $offerProduct['OffersProduct']['id']?>">
									<select name="data[OfferProduct][edit][product_id][]" id="OfferProductId">
										<option value="0">--- Seleziona un prodotto ---</option>
									<?php foreach ($products as $prodotto): ?>
										<option value="<?php echo $prodotto['Product']['id']; ?>" <?php if ($prodotto['Product']['id'] == $offerProduct['OffersProduct']['product_id']) echo 'selected'; ?>><?php echo $prodotto['Product']['nome']; ?> (<?php echo $prodotto['Product']['codice_prodotto']; ?>)</option>
									<?php endforeach ?>
									</select>
								</td>
								<?php if ($this->data['Offer']['offer_type_id'] == 1): ?>
								<td><input type="text" name="data[OfferProduct][edit][prezzo][]" value="<?php echo $offerProduct['OffersProduct']['prezzo']; ?>" id="OfferProductPrezzo"></td>
								<?php endif ?>

								<td><input type="checkbox" name="data[OfferProduct][delete][]" value="<?php echo $offerProduct['OffersProduct']['id']; ?>" id="OfferProductDelete"></td>
							</tr>
							<?php endforeach ?>
							<?php endif ?>
							<tr class='new'>
								<td>
									<select name="data[OfferProduct][add][product_id][]" id="OfferProductId">
									<option value="0">--- Seleziona un prodotto ---</option>
									<?php foreach ($products as $prodotto): ?>
										<option value="<?php echo $prodotto['Product']['id']; ?>"><?php echo $prodotto['Product']['nome']; ?> (<?php echo $prodotto['Product']['codice_prodotto']; ?>)</option>
									<?php endforeach ?>
									</select>
								</td>
								<?php if ($this->data['Offer']['offer_type_id'] == 1): ?>
								<td><input type="text" name="data[OfferProduct][add][prezzo][]" value="0.0" id="OfferProductPrezzo"></td>
								<?php endif ?>
								<td></td>
							</tr>
						</table>
						<table border="0" cellspacing="5" cellpadding="5">
							<tr>
								<td colspan="2">
									<div><a href="javascript:void(0)" class='addProdotto'><?php echo $html->image('icons/add.png'); ?> Aggiungi una nuova riga </a></div>
								</td>
							</tr>
						</table>
					</form>
				</td>
			</tr>
		</tbody>
	</table>
<?php echo $form->end(); ?>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
</div>