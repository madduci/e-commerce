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
			$("#OfferAddForm").submit();
		});
		
		$('#floatingtop').html($('#titolo').html());
	});
</script>
<div id="floatingtop"></div>
<div class="offers form">
<?php echo $form->create('Offer');?>
	<div id="titolo">
		<span style="float:right" class="crud">
			<li class="save"><a href="javascript:void(0);" class="submitform">Salva</a></li>
			<li class="cancel"><?php echo $html->link("Annulla", array('action' => 'index'));?></li>
		</span>
		<h2>Nuova Offerta</h2>
		<div style="clear:both"></div>
	</div>
	<table class="admintables">
		<tbody>
			<tr>
				<td width="10%">Tipo offerta</td>
				<td><?php echo $form->input('offer_type_id', array('label' => '')); ?></td>
			</tr>
			<tr>
				<td>Data inizio</td>
				<td><?php echo $form->input('inizio', array('type' => 'text', 'value' => date('d/m/Y', strtotime('+ 17days')), 'label' => '')); ?></td>
			</tr>
			<tr>
				<td>Data fine</td>
				<td><?php echo $form->input('fine', array('type' => 'text', 'value' => date('d/m/Y', strtotime('+ 32days')), 'label' => '')); ?></td>
			</tr>
			<tr>
				<td>Gruppo</td>
				<td><?php echo $form->input('groups_id', array('label' => '')); ?></td>
			</tr>
		</tbody>
	</table>
<?php echo $form->end(); ?>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
</div>