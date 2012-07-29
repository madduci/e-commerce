<?php
	echo $html->css("jquery_thickbox.css", 'stylesheet', false);
	$javascript->link("jquery/plugins/jquery.thickbox.js", false);
	$javascript->link("jquery/plugins/jquery.tree.js", false);
	$javascript->link("tiny_mce/tiny_mce.js", false);
?>
<script type="text/javascript">
	tinyMCE.init({
		mode : "textareas",
		theme : "advanced",
		plugins : "inlinepopups",
		theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,bullist,numlist,|,link,unlink",
		theme_advanced_buttons2 : "",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left"
	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$(".submitform").live('click',function(e) {
			$("#ProductAddForm").submit();
		});
		
		$('#floatingtop').html($('#titolo').html());
	});
</script>
<div id="floatingtop"></div>
<div class="products form">
<?php echo $form->create('Product');?>
	<div id="titolo">
		<span style="float:right" class="crud">
			<li class="save"><a href="javascript:void(0);" class="submitform">Salva</a></li>
			<li class="cancel"><?php echo $html->link("Annulla", array('action' => 'index'));?></li>
		</span>
		<h2>Nuovo Prodotto</h2>
		<div style="clear:both"></div>
	</div>
	<table class="admintables">
		<tbody>
			<tr>
				<td width="10%">Fornitore</td>
				<td><?php echo $form->input('supplier_id', array('label' => '')); ?></td>
			</tr>
			<tr>
				<td>Codice prodotto</td>
				<td><?php echo $form->input('codice_prodotto', array('label' => '')); ?></td>
			</tr>
			<tr>
				<td>Nome</td>
				<td><?php echo $form->input('nome', array('label' => '')); ?></td>
			</tr>
			<tr>
				<td>Descrizione</td>
				<td><?php echo $form->input('descrizione', array('label' => '', 'cols' => '100', 'rows' => '20')); ?></td>
			</tr>
			<tr>
				<td>Categoria</td>
				<td>
					<div class="input text <?php if ($form->error('product_category_id') != '') echo 'error'; ?>">
						<a href="/admin/product_categories/showtree/?height=300&width=300" title="Selezionare una categoria e cliccare chiudi." class="thickbox">Seleziona categoria</a>: <span class="selectedCategory" style="font-weight:bold; color:#000"><?php if (isset($categoria)) echo $categoria['ProductCategory']['name']; ?></span>
						<?php echo $form->input('product_category_id', array('type' => 'hidden', 'id' => 'cat_id')); ?>
						<?php echo $form->error('product_category_id'); ?>
					</div>
				</td>
			</tr>
			<tr>
				<td>Stato prodotto</td>
				<td><?php echo $form->input('product_status_id', array('label' => '')); ?></td>
			</tr>
			<tr>
				<td>Prezzo (&euro;)</td>
				<td><?php echo $form->input('prezzo', array('label' => '', 'default' => '0.0')); ?></td>
			</tr>
			<tr>
				<td>Peso (Kg.)</td>
				<td><?php echo $form->input('peso', array('label' => '', 'default' => '0.0')); ?></td>
			</tr>
			<tr>
				<td colspan="2"><h3 style="color:black">Quantit&agrave;</h3></td>
			</tr>
			<tr>
				<td>minimo ordinabile</td>
				<td><?php echo $form->input('qta_minima_ordinabile', array('label' => '', 'default' => '0')); ?></td>
			</tr>
			<tr>
				<td>incremento</td>
				<td><?php echo $form->input('qta_incremento', array('label' => '', 'default' => '0')); ?></td>
			</tr>
			<tr>
				<td>disponibilit&agrave;</td>
				<td><?php echo $form->input('qta_disponibile', array('label' => '', 'default' => '0')); ?></td>
			</tr>
			<tr>
				<td colspan="2"><h3 style="color:black">Visibilit&agrave;<h3></td>
			</tr>
			<tr>
				<td>pubblica</td>
				<td><?php echo $form->input('pubblica', array('label' => '')); ?></td>
			</tr>
			<tr>
				<td>vetrina</td>
				<td><?php echo $form->input('vetrina', array('label' => '')); ?></td>
			</tr>
		</tbody>
	</table>
<?php echo $form->end(); ?>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
</div>
