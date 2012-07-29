<?php
	echo $html->css("jquery_file_tree.css", 'stylesheet', false);
	$javascript->link("jquery/plugins/jquery.tree.js", false);
?>
<script type="text/javascript" charset="utf-8">
	$('#tree').fileTree({ root: "1", script: '/admin/ProductCategories/getTreeDirectChildren' }, function(item) {
		$('.selectedCategory').html(item);
	});
</script>
<div style="color:red">Categoria selezionata:</div>
<div id="categoria" style="font-weight:bold">&nbsp;</div>
<br />
<div id="tree"></div>
