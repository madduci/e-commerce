<?php
	//include '../../../includes/admin_page.php';
	require_once '../../../../apps/prodotti/Prodotti.php';

	try {
		$p = new Prodotti();
		
		$categorie = $p->getTreeCategoria($_POST['dir']);

	} catch (Exception $e) {
		$errore = $e->getMessage();
	}
?>

<ul class="jqueryFileTree" style="display: none;">
<?php foreach ($categorie as $c): ?>
	<li class="directory collapsed"><a href="#" rel="<?php echo $c->getId(); ?>"><?php echo $c->getDescrizione(); ?></a></li>
<?php endforeach ?>
</ul>
