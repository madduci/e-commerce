<?php 
$javascript->link('jquery/jquery', false);

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
<script type="text/javascript">
	$(document).ready(function() {
		$(".submitform").click(function(e) {
			$("#CustomerEditForm").submit();
		});
	});
</script>

<style type="text/css">
 

input, select, textarea{
	clear:left;
	color:#000000;
	font-family:Tahoma,Lucida Grande,sans-serif;
	font-size:100%;
	margin:5px 0 0;
	padding:1px 3px;
}

label {
	display:inline-block;
	line-height:1.8;
	vertical-align:top;
	width:130px;
}

	

</style>


<p style="font-size:16px;font-weight:bolder;margin:40px 0 0 0;">
    	<p style="color:#000;font-size:16px;">Modifica le tue informazioni</p>
</p>
<br/>


<div class="customers form">
<?php echo $form->create('Customer');?>
	<?php
		echo $form->hidden('filesystem_id');
		echo $form->input('ragione_sociale');
		echo $form->input('group_id', array('label' => 'Gruppo'));
		echo $form->input('codice_fiscale', array('error' => 'Codice fiscale non valido'));
		echo $form->input('indirizzo');
		echo $form->input('cap', array('label' => 'CAP'));
		echo $form->input('citta');
		echo $form->input('provincia');
		echo $form->input('regione', array('type' => 'select', 'options' => array('0' => 'Seleziona una regione', 'Puglia' => 'Puglia', 'Calabria' => 'Calabria', 'Campania' => 'Campania', 'Molise' => 'Molise')));
		echo $form->input('telefono');
		echo $form->input('fax');
		
		echo 'Insegna<br />';
		if (isset($filesystem['Filesystem']['id'])):
			echo $html->image($filesystem['Filesystem']['id'], array('width' => '300px')); 
						echo $form->input(null, array('type' => 'checkbox', 'label' => 'elimina insegna', 'name' => 'data[deleteFile]', 'value' => $filesystem['Filesystem']['id'], 'checked' => false));
		else:
			echo $upload_form;
		endif
		
	?>
	
	

<?php
echo $form->submit('/img/icons/save.png', array('div'=>'false'));
echo $form->end();?>
</div>

<p align="right" style="font-size:12px;color:#B01;">
			
			<?php echo $html->link('Torna alla vista principale', array('action' => 'index', $_SESSION['Auth']['Account']['id'])); ?>
			
</p>

