<?php 
$javascript->link('jquery/jquery', false);

?>



<style type="text/css">
 

input, select, textarea{
	clear:left;
	color:#000000;
	font-family:Tahoma,Lucida Grande,sans-serif;
	font-size:100%;
	margin:5px 0 0;
	padding:1px 3px;
	
}
textarea{
	width:220px;
}

label {
	display:inline-block;
	line-height:1.8;
	vertical-align:top;
	width:190px;
}

	

</style>


<?php 
if(isset($_SESSION['AccountId']) || isset($_SESSION['Auth']['Account']))
{
?>
<p style="font-size:16px;font-weight:bolder;margin:60px 0 0 0;">
    
	<p style="color:#000;font-size:16px;">
	<h2>Registrazione Punto Vendita</h2></p>
		
</p>
		
<br/>




<div style="margin:30px 0 0 0;" class="customers form">
<?php echo $form->create('Customer');?>
	
	<?php
		echo $form->input('ragione_sociale');
		echo $form->input('codice_fiscale', array('error' => 'Codice fiscale non valido'));
		echo $form->input('group_id', array('label' => 'Gruppo'));
		//echo $form->input('filesystem_id');
		echo $form->input('indirizzo');
		echo $form->input('cap', array('label' => 'CAP'));
		echo $form->input('citta');
		echo $form->input('provincia');
		echo $form->input('regione', array('type' => 'select', 'options' => array('0' => 'Seleziona una regione', 'Puglia' => 'Puglia', 'Calabria' => 'Calabria', 'Campania' => 'Campania', 'Molise' => 'Molise')));
		echo $form->input('telefono');
		echo $form->input('fax');
	?>
	
	
<?php  echo $form->submit('/img/icons/save.png', array('div'=>'false'));
echo $form->end();

 ?>
</div>


<p align="right" style="font-size:12px;color:#B01;">
			
		<a style="display:inline;" href="/"><img src="/img/icons/exit.png" alt="Annulla"/></a>
			
			
</p>
<?php } else {?> 


<p style="font-size:16px;font-weight:bolder;margin:60px 0 0 0;">
    	<p style="color:#000;font-size:16px;">
		
		<h2><img src="/img/icons/error.png" heigth="30" width="30"/> Registrazione Punto Vendita</h2>
		
</p>
		
<br/>

<div style="font-size:14px;margin:30px 0 0 0;">
	<strong>Errore nella registrazione del punto vendita: non sei registrato. </strong>
		
</div>
<br/><br/>
<div style="display:inline;">
<div style="font-size:12px;color:#B01;display:inline;">
<a href="/">Torna alla home page</a>
</div>

</div>

<?php }?>