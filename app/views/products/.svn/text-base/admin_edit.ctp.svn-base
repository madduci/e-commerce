<?php
	echo $html->css("jquery-ui-1.7.2.custom.css", 'stylesheet', false);
	echo $html->css("jquery_thickbox.css", 'stylesheet', false);
	$javascript->link("jquery/plugins/jquery.thickbox.js", false);
	$javascript->link("jquery/plugins/jquery.tree.js", false);
	$javascript->link("tiny_mce/tiny_mce.js", false);
	$javascript->link("jquery/plugins/jquery-ui-1.7.2.custom.min.js", false);
?>
<?php
	foreach ($css as $style) {
		echo $html->css($style, 'stylesheet', false);
	}

	foreach ($scriptjs as $js) {
		$javascript->link($js, false);
	}
	
	echo $script;
?>
<style type="text/css" media="screen">
	.foto {
		float:left;
		padding: 5px;
		width: 90px;
		text-align: center;
	}
</style>
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
	$(document).ready( function() {
		var $tabs = $('#tabs').tabs();
		
		$('.addDettaglioTecnico').click(function() {
			$('#dettaglitecnici').append('<tr>'+$('tr[class=new]').html()+'</tr>');
		})
				
		$(".submitform").live('click',function(e) {
			$("#ProductEditForm").submit();
		});
		
		$(".submitDettagliTecniciForm").live('click', function(e) {
			$("#dettagliTecniciForm").submit();
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
			<li class="delete"><?php echo $html->link('Elimina', array('action' => 'delete', $form->value('Product.id')), null, sprintf('Sicuro di voler eliminare il prodotto %s e i dati ad esso associati?', $form->value('Product.id'))); ?></li>
		</span>
		<h2>Modifica prodotto: <?php echo $this->data['Product']['codice_prodotto']." ".$this->data['Product']['nome']; ?></h2>
		<div style="clear:both"></div>
	</div>
	<?php echo $form->input('id'); ?>
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
	<table class="admintables">
		<tr>
			<td colspan="2">
				<div id="tabs">
					<ul style="height:40px;">
						<li><a href="#tabs-1">Foto</a></li>
						<li><a href="#tabs-2">Dettagli tecnici</a></li>
					</ul>
					<div id="tabs-1">
						<span class="description">
							- <strong>D</strong>: Foto di default.<br />
							- <strong>E</strong>: Elimina foto.
						</span>
						<?php echo $form->create('ProductTechnicalDetail', array('url' => '/admin/products/edit_gallery/'.$this->data['Product']['id'])); ?>
							<div id="foto">
							<?php foreach ($filesystem as $file): ?>
								<div class="foto"><img height="60" src="/img/<?php echo $file['ProductFilesystem']['filesystem_id']; ?>"/><br/>D: <input type="radio" value="<?php echo $file['ProductFilesystem']['filesystem_id']; ?>" name="data[Product][foto_default]" <?php if ($file['ProductFilesystem']['filesystem_id'] == $this->data['Product']['foto_default']) echo 'checked'; ?>>E: <input type="checkbox" id="delete" value="<?php echo $file['ProductFilesystem']['filesystem_id']; ?>" name="data[Filesystem][id][]"/></div>
							<?php endforeach ?>
							</div>
							<div style="clear:both"></div>
							<?php echo $upload_form; ?>
							<div class="description">
								- Clicca su <strong>Scegli immagini</strong> per caricare uno o pi&ugrave; file insieme. Per selezionare pi&ugrave; file tieni premuto ctrl (windows) oppure cmd (mac).<br />
								- Puoi caricare solo immagini <strong>.jpg</strong> o <strong>.jpeg</strong> con un limite di <strong>2048 KB</strong> per immagine.
							</div>
							<table border="0" cellspacing="5" cellpadding="5">
								<tr>
									<td>
										<div class="submit">
											<?php echo $html->image("crud/save.png"); ?> <?php echo $form->submit("Salva galleria fotografica", array('div' => false)); ?>
										</div>
									</td>
								</tr>
							</table>
							
						<?php echo $form->end(); ?>
					</div>
					<div id="tabs-2">
						<?php echo $form->create('ProductTechnicalDetail', array('url' => '/admin/products/add_technical_detail', 'id' => 'dettagliTecniciForm')); ?>
							<table border="0" cellspacing="5" cellpadding="5" id="dettaglitecnici">
								<tr>
									<th>tipo dettaglio</th>
									<td>valore</td>
									<td>canc.</td>
								</tr>
								<?php foreach ($technicalDetails as $dt): ?>
								<tr>
									<td>
										<?php echo $form->hidden(null, array('name' => 'data[ProductTechnicalDetail][edit][id][]', 'value' => $dt['ProductTechnicalDetail']['id'])); ?>
										<?php echo $form->input('detail_type_id', array('name' => 'data[ProductTechnicalDetail][edit][detail_type_id][]', 'selected' => $dt['ProductTechnicalDetail']['detail_type_id'], 'label' => '', )); ?>
									</td>
									<td>
										<?php echo $form->input('valore_dettaglio', array('name' => 'data[ProductTechnicalDetail][edit][valore_dettaglio][]', 'label' => '', 'value' => $dt['ProductTechnicalDetail']['valore_dettaglio'])); ?>
									</td>
									<td>
										<?php echo $form->checkbox(null, array('name' => 'data[ProductTechnicalDetail][delete][]', 'value' => $dt['ProductTechnicalDetail']['id'])); ?>
									</td>
								</tr>
								<?php endforeach ?>
								<tr class="new">
									<td>
										<?php echo $form->input('detail_type_id', array('name' => 'data[ProductTechnicalDetail][add][detail_type_id][]', 'label' => '')); ?>
									</td>
									<td>
										<?php echo $form->input('valore_dettaglio', array('name' => 'data[ProductTechnicalDetail][add][valore_dettaglio][]', 'label' => '')); ?>
									</td>
								</tr>
							</table>
							<table border="0" cellspacing="5" cellpadding="5">
								<tr>
									<td>
										<div><a href="javascript:void(0)" class='addDettaglioTecnico'><?php echo $html->image('icons/add.png'); ?> Aggiungi una nuova riga </a></div>
									</td>
									<td>
										<div class="submit">
											<?php echo $form->hidden('product_id', array('value' => $this->data['Product']['id'])); ?>
											<a href="javascript:void(0)" class="submitDettagliTecniciForm"><?php echo $html->image("crud/save.png"); ?> Salva dettagli tecnici</a>
										</div>
									</td>
								</tr>
							</table>
						<?php echo $form->end(); ?>
					</div>
				</div>
			</td>
		</tr>
	</table>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
</div>
