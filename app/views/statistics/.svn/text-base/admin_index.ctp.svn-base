<?php
$javascript->link("jquery/plugins/flot/jquery.flot.js", false);
?>
<!--[if IE]><?php $javascript->link("jquery/plugins/flot/excanvas.js", false); ?><![endif]-->
<script id="source" language="javascript" type="text/javascript">
$(function () {
	function formatDate(d) {
		var formatDate = new Date();
		formatDate.setTime(parseInt(d));
		return formatDate.getDate() + "/" + (formatDate.getMonth()+1) + "/" + formatDate.getFullYear();
	}
	
	var series = <?php echo $statistiche; ?>;
	var postData = {}
	postData.intervallo = 1;

	var options = {
		lines: { show: true },
		points: { show: true },
		legend: { noColumns: 2 },
		xaxis: { mode: 'time' },
		yaxis: { min: 0 },
		selection: { mode: "xy" },
		grid: { hoverable: true, clickable: true }
	};

	var zoomopts = '';
	var placeholder = $("#placeholder");
	var confronto = $("#plotConfronto");
	var choiceContainer = $("#toggleSeries");
	var choiceContainerConfronto = $("#toggleSeriesConfronto");

	placeholder.bind("plotselected", function (event, ranges) {
		$("#selection").text(formatDate(ranges.xaxis.from.toFixed(0)) + " to " + formatDate(ranges.xaxis.to.toFixed(0)));
		zoomopts = {xaxis: { min: ranges.xaxis.from, max: ranges.xaxis.to , mode: 'time'}};
		plotAccordingToChoices();
	});

	function showTooltip(x, y, contents) {
		$('<div id="tooltip">' + contents + '</div>').css( {
			position: 'absolute',
			display: 'none',
			top: y + 5,
			left: x + 5,
			border: '1px solid #fdd',
			padding: '2px',
			'background-color': '#fee',
			opacity: 0.80
			}).appendTo("body").fadeIn(200);
		}

		var previousPoint = null;
		placeholder.bind("plothover", function (event, pos, item) {
			if (item) {
				if (previousPoint != item.datapoint) {
					previousPoint = item.datapoint;

					$("#tooltip").remove();
					var x = formatDate(item.datapoint[0]),
					y = item.datapoint[1].toFixed(2);

					showTooltip(item.pageX, item.pageY, x + ': ' + y);
				}
			}
			else {
				$("#tooltip").remove();
				previousPoint = null;            
			}
		});
		
		confronto.bind("plothover", function (event, pos, item) {
			if (item) {
				if (previousPoint != item.datapoint) {
					previousPoint = item.datapoint;

					$("#tooltip").remove();
					var x = formatDate(item.datapoint[0]),
					y = item.datapoint[1].toFixed(2);

					showTooltip(item.pageX, item.pageY, x + ': ' + y);
				}
			}
			else {
				$("#tooltip").remove();
				previousPoint = null;            
			}
		});

		$(".resetZoom").click(function() {
			zoomopts = '';
			plotAccordingToChoices();
		});

		$('#intervallo').bind('change', function() {
			postData.intervallo = $(this).val();
			refreshPlot();
		});
		
		$('#regione').bind('change', function() {
			postData.regione = $(this).val();
			refreshPlot();
		});
		
		$('#gruppogdo').bind('change', function() {
			if ($(this).val() != 0) 
				postData.gruppogdo = $(this).val();
			else
				postData.gruppogdo = 0;

			refreshPlot();
		});
		
		$('#fornitore').bind('change', function() {
			if ($(this).val() != 0) {
				$('#prodotto').val('');
				postData.prodotto = undefined;
				$('#prodotto').css('background', '#ccc');
				$('#prodotto').attr('disabled', 'disabled');
				
				postData.fornitore = $(this).val();
			} else {
				$('#prodotto').css('background', '#fff');
				$('#prodotto').removeAttr('disabled');
				postData.fornitore = undefined;
			}
			
			refreshPlot();
			
		});
		
		$('#prodotto').bind('keyup', function() {
			if ($(this).val() != '') {
				$("#fornitore option[selected]").removeAttr("selected");
				$("#fornitore option[value='0']").attr("selected", "selected");
				$('#fornitore').attr('disabled', 'disabled');
				
				postData.fornitore = undefined;
				postData.prodotto = $(this).val();
			} else {
				$('#fornitore').removeAttr('disabled');
				postData.prodotto = undefined;
			}
		});
		
		$('#prodotto').keydown(function(event){
			if (event.keyCode == 13) {
				refreshPlot();
			}
		});
		
		$('#assey').bind('change', function() {
			postData.assey = $(this).val();
			refreshPlot();
		});

		$('#confronto').bind('click', function() {
			if ($(this).attr('checked'))
				postData.confronto = 1;
			else {
				postData.confronto = 0;
				confronto.text('');
				choiceContainerConfronto.text('');
				
			}

			refreshPlot();
		});

		function refreshPlot() {
			$.ajax({
				type: "POST",
				url: "get_stats",
				data: postData,
				dataType: "json",
				
				success: function(data) {
					series = data;
					choiceContainer.text('');
					choiceContainerConfronto.text('');

					var i = 0;
					
					if (series.corrente.serie == undefined) {
						$.each(series.corrente, function(key, val) {
							val.color = i;
							++i;
							choiceContainer.append('<br/><input type="checkbox" name="' + key +
							'" checked="checked" >' + val.label + '</input>');
						});
					}
					
					plotAccordingToChoices();
				}
			});
		}

		var i = 0;

		$.each(series.corrente, function(key, val) {
			val.color = i;
			++i;
			choiceContainer.append('<br/><input type="checkbox" name="' + key +
			'" checked="checked" >' + val.label + '</input>');
		});
		
		choiceContainer.find("input").live('click', function() {
			plotAccordingToChoices();
		});
		
		choiceContainerConfronto.find("input").live('click', function() {
			plotAccordingToChoices();
		});
		
		function plotAccordingToChoices() {
			var data = [];

			if (series.corrente.serie == undefined) {
				choiceContainer.find("input:checked").each(function () {
					var key = $(this).attr("name");
					if (key && series.corrente[key])
					data.push(series.corrente[key]);
				});
			} else {
				data.push(series.corrente.serie);
			}
			
			if (data.length > 0) {
				$.plot(placeholder, data, $.extend(true, {}, options, zoomopts));
			}

			if (series.precedente != undefined) {
				var dataConfronto = [];

				if (series.precedente.serie == undefined) {
					if (choiceContainerConfronto.text() == '') {
						var i = 0;

						$.each(series.precedente, function(key, val) {
							val.color = i;
							++i;
							choiceContainerConfronto.append('<br/><input type="checkbox" name="' + key +
							'confronto" checked="checked" >' + val.label + '</input>');
						});
					}
				
					choiceContainerConfronto.find("input:checked").each(function () {
						var key = $(this).attr("name").substring(0, $(this).attr("name").indexOf('confronto'));
						if (key && series.precedente[key])
						dataConfronto.push(series.precedente[key]);
					});
				} else {
					dataConfronto.push(series.precedente.serie);
				}

				if (dataConfronto.length > 0) {
					if (zoomopts.xaxis != undefined) {
						var zoomconfrontoopts = zoomopts;
						zoomconfrontoopts.xaxis.min -= 31536000000;
						zoomconfrontoopts.xaxis.max -= 31536000000;
					}
						
					$.plot(confronto, dataConfronto, $.extend(true, {}, options, zoomconfrontoopts));
				}
			}
		}

		plotAccordingToChoices();
});
</script>
<div id="plotContainer">
	<div id="titolo">
		<h2>Statistiche</h2>
	</div>
	<div id="funzioni">
		<?php echo $form->input('intervallo', array('type' => 'select', 'options' => array('1' => '1 mese', '3' => '3 mesi', '6' => '6 mesi', '12' => '1 anno'),'id' => 'intervallo', 'default' => '1')); ?>
		<?php echo $form->input('regione', array('type' => 'select', 'options' => array('all' => 'tutte le regioni', 'puglia' => 'puglia', 'campania' => 'campania', 'molise' => 'molise', 'calabria' => 'calabria'),'id' => 'regione', 'default' => '1')); ?>
		<?php echo $form->input('assey', array('type' => 'select', 'options' => array('f' => 'Fatturato', 'q' => 'Quantità'), 'label' => 'criterio')); ?>
		<label>Gruppi GDO</label>
		<select name="gruppogdo" id="gruppogdo">
			<option value="0">---Seleziona un'opzione---</option>
			<option value="all">Tutti i gruppi</option>
		<?php foreach ($gruppigdo as $key => $value): ?>
			<option value="<?php echo $value['Group']['id']; ?>"><?php echo $value['Group']['gruppo']; ?></option>
		<?php endforeach ?>
		</select>
		<label>Fornitori</label>
		<select name="fornitore" id="fornitore">
			<option value="0">---Seleziona fornitore---</option>
		<?php foreach ($fornitori as $key => $value): ?>
			<option value="<?php echo $value['Supplier']['id']; ?>"><?php echo $value['Supplier']['ragione_sociale']; ?></option>
		<?php endforeach ?>
		</select>
		<?php echo $form->input('codice_prodotto', array('type' => 'text', 'id' => 'prodotto', 'div' => false))?>
		<?php echo $form->input('confronto', array('type' => 'checkbox', 'label' => 'confronta con stesso periodo anno precedente', 'value' => '1')); ?>
		<?php echo $html->link('Ripristina Zoom', 'javascript:void(0)', array('class' => 'resetZoom')); ?>
		<div class="description">Per ingrandire cliccare e trascinare col mouse sull'area del grafico</div>
	</div>
	<div id="placeholder" style="width:795px;height:300px;"></div>
	<div id="toggleSeries">
	</div>
	<div id="plotConfronto" style="width:795px;height:300px;"></div>
	<div id="toggleSeriesConfronto"></div>
	<div id="selection">
		
	</div>
	
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
</div>

