<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<?php echo $html->charset(); ?>
<title>Progetto Ingegneria del Software - Portale e-commerce - Area amministrativa</title>
<?php
	echo $html->meta('icon');
	echo $html->css("admin", "stylesheet");
	echo $html->css("menu_style", "stylesheet");
	echo $javascript->link('jquery/jquery.js');
	echo $scripts_for_layout;
?>
<script type="text/javascript">
	$(document).ready(function() {
		$('tr[title]').click(function() {
			window.location = $(this).attr('title');
		});
		
		$(window).scroll(function() {
			var top;
			
			if ($('#flashMessage').length)
				top = 146;
			else
				top = 85;

			if ($(window).scrollTop() >= top) {
				$("#floatingtop").fadeIn(500);
			} else {
				$("#floatingtop").fadeOut(500);
			}
		});
	});
</script>
</head>
<body>
<div id="struttura">
	<div id="header">
		<?php if (isset($_SESSION['Auth']['Account'])): ?>
		<span class="logininfo">
			Benvenuto <?php echo $_SESSION['Auth']['Account']['nome']." ".$_SESSION['Auth']['Account']['cognome']; ?><br />
			<a href="/logout">logout</a>
		</span>
		<?php endif ?>
		Area Amministrativa
	</div>
	<?php if (isset($_SESSION['Auth']['Account'])): ?>
	<div class="menu">
		<ul>
			<li><a href="/admin/">Dashboard</a></li>
			<li><a href="#" id="current">Utenti</a>
				<ul>
					<li><?php echo $html->link('Clienti', array('controller' => 'Customers', 'action' => 'admin_index')); ?></li>
					<li><?php echo $html->link('Gruppi GDO', array('controller' => 'Groups', 'action' => 'admin_index')); ?></li>
					<li><?php echo $html->link('Codici di sconto', array('controller' => 'DiscountCodes', 'action' => 'admin_index')); ?></li>
					<li><?php echo $html->link('Account', array('controller' => 'Accounts', 'action' => 'admin_index')); ?></li>
				</ul>
			</li>
			<li><?php echo $html->link('Categorie', array('controller' => 'ProductCategories', 'action' => 'admin_index')); ?></li>
			<li><?php echo $html->link('Prodotti', array('controller' => 'Products', 'action' => 'admin_index')); ?>
				<ul>
					<li><?php echo $html->link('Tipologie Dettaglio Tecnico', 	array('controller' => 'DetailTypes', 'action' => 'admin_index')); ?></li>
					<li><?php echo $html->link('Fornitori', array('controller' => 'Suppliers', 'action' => 'admin_index')); ?></li>
				</ul>
			</li>
			<li><?php echo $html->link('Offerte', array('controller' => 'Offers', 'action' => 'admin_index')); ?>
				<ul>
					<li><?php echo $html->link('Prenotazioni', array('controller' => 'Reservations', 'action' => 'admin_index')); ?></li>
				</ul>
			</li>
			<li><?php echo $html->link('Ordini', array('controller' => 'Orders', 'action' => 'admin_index')); ?>
				<ul>
					<li><?php echo $html->link('Metodi di spedizione', array('controller' => 'ShippingMethods', 'action' => 'admin_index')); ?></li>
				</ul>
			</li>
			<li><?php echo $html->link('Anomalie', array('controller' => 'Anomalies', 'action' => 'admin_index')); ?>
				<ul>
					<li><?php echo $html->link('Tipologie Anomalia', array('controller' => 'AnomalyTypes', 'action' => 'admin_index')); ?></li>
				</ul>
			</li>
			<li><?php echo $html->link('Statistiche', array('controller' => 'Statistics', 'action' => 'admin_index')); ?></li>
			<li><?php echo $html->link('Mailing List', array('controller' => 'Mails', 'action' => 'admin_add')); ?></li>
		</ul>
	</div>
	<?php endif ?>
	<div id="content">
		<?php $session->flash(); ?>
		<?php $session->flash('auth'); ?>
		<?php echo $content_for_layout; ?>
	</div>
</div>
<div id="footer">
	<span style="float:right">release</span
	<span style="float:left">basket 1.0 rev.27</span>
</div>
<div style="clear:both;"></div>

</body>
</html>
