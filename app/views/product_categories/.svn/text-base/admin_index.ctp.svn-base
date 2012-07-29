<?php
	echo $html->css("jquery_file_tree.css", 'stylesheet', false);
	$javascript->link("jquery/plugins/jquery.tree.js", false);
?>
<script type="text/javascript">
	$(document).ready( function() {
	    $('#tree').fileTree({ root: "1", script: '/admin/ProductCategories/getTreeDirectChildren' }, function(item) {});
		$("#action").bind("click", function(e) {
			if ($("#cat_id").val() != "1") {
				if ($(this).text() == "MODIFICA") {
					$(this).text("ANNULLA");
					$("#addRow").hide();
					$("#editRow").show();
				}
				else if ($(this).text() == "ANNULLA") {
					$(this).text("MODIFICA");
					$("#addRow").show();
					$("#editRow").hide();
				}
			} else
				alert("Categoria non selezionata.");
		});
		$("#deleteButton").bind("click", function(e) {
			if (confirm("Questa azione eliminerà la categoria selezionata, le sue sottocategorie e i prodotti ad essa associata. Continuare?")) {
				$("#deleteCategoria").val("1");
				//$("#categorieForm").submit();
			}
		});
		$("#removeSelection").bind("click", function(e) {
			$('#cat_id').val("1");
			$('#categoria').text("");
			$('#action').text("MODIFICA");
			$("#addRow").show();
			$("#editRow").hide();
		});
	});
</script>
<h2>Categorie prodotto</h2>
<div id="tree"></div>
<div>
	<form action="/admin/product_categories/" method="post" id="categorieForm">
		<table border="0" cellspacing="5" cellpadding="5">
			<tr>
				<td>Categoria selezionata: </td>
				<td><div id="categoria"></div></td>
				<td><a href="#" id="action">MODIFICA</a></td>
				<td><a href="#" id="removeSelection">RIMUOVI SELEZIONE</a></td>
			</tr>
			<tr>

			</tr>
			<tr id="addRow">
				<td><input type="text" name="data[ProductCategory][add][name]" value="" id="ProductCategoryName"/><br /><span class="description">massimo 100 caratteri</span></td>
				<td><input type="submit" name="data[ProductCategory][action][add]" value="Aggiungi categoria..." id="addCategoria"></td>
				<td></td>
			</tr>
			<tr id="editRow" style="display:none">
				<td><input type="text" name="data[ProductCategory][edit][name]" value=""><br /><span class="description">massimo 100 caratteri</span></td>
				<td><input type="submit" name="data[ProductCategory][action][edit]" value="Modifica categoria..." id="editCategoria"></td>
				<td><input type="submit" name="data[ProductCategory][action][delete]" value="Elimina categoria..." id="deleteButton"></td>
				<td></td>
			</tr>
			<tr>
				<td><input type="hidden" name="data[ProductCategory][cat_id]" value="1" id="cat_id" /><input type="hidden" name="data[ProductCategory][confirmDelete]" value="0" id="deleteCategoria" /></td>
			</tr>
			<tr>
				<td colspan="4" class="description">
					- Per aggiungere una nuova sottocategoria, selezionare la categoria madre e immettere nel campo di testo il nome della nuova categoria e cliccare Aggiungi categoria...<br />
					- Per aggiungere una nuova macrocategoria, cliccare su RIMUOVI SELEZIONE e aggiungere una nuova categoria.<br />
					- Per modificare o eliminare una categoria esistente cliccare su MODIFICA.
				</td>
			</tr>

		</table>
	</form>
</div>

<br />
<br />
<?php echo $html->link("Riordina categorie per nome", array('controller' => 'productCategories', 'action' => 'sortCategories')); ?>