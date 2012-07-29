<?php 
$javascript->link('jquery/jquery', false);


?>

<?php 

if(isset($customer)){
	
	
?>
<p style="font-size:16px;font-weight:bolder;margin:40px 0 0 0;">
    	<p style="color:#000;font-size:16px;"><h2>Le tue informazioni</h2></p>
		
</p>
<p style="text-align:right;font-weight:bolder;"><a href="/Orders">I tuoi ordini</a></p>		
<br/>
<table cellspacing="5" style="font-size:14px;color:#000000;">

	<?php /* <tr>
	<td><strong>Nome:</strong>
	<?php echo $customer['Account']['nome']; ?>
	</td>
	</tr>
	<td><strong>Cognome:</strong>
	<?php echo $customer['Account']['cognome']; ?>
	</td>
	</tr>
	<td><strong>Username:</strong>
	<?php echo $customer['Account']['username']; ?>
	</td>
	</tr>
	<td><strong>E-mail:</strong>
	<?php echo $customer['Account']['email']; ?>	
	</td></tr>
	*/?>
	<tr>
	<td>
	<strong>Ragione Sociale:</strong>
	<?php echo $customer['Customer']['ragione_sociale']; ?>
	</td>
	</tr>
	
	<tr>
	<td>
	<strong>Codice Fiscale:</strong>
	<?php echo $customer['Customer']['codice_fiscale']; ?>
	</td>
	</tr>
	
	<tr>
	<td>
	<strong>Gruppo di Appartenenza:</strong>
	<?php echo $customer['Group']['gruppo']; ?>
	</td>
	</tr>
	
	<tr>
	<td>
	<strong>Indirizzo:</strong>
	<?php echo $customer['Customer']['indirizzo']; ?>
	</td>
	</tr>
	
	<tr>
	<td>
	<strong>Cap:</strong>
	<?php echo $customer['Customer']['cap']; ?>
	</td>
	</tr>
	
	<tr>
	<td>
	<strong>Citta:</strong>
	<?php echo $customer['Customer']['citta']; ?>
	</td>
	</tr>
	
	<tr>
	<td>
	<strong>Provincia:</strong>
	<?php echo $customer['Customer']['provincia']; ?>
	</td>
	</tr>
	
	<tr>
	<td>
	<strong>Regione:</strong>
	<?php echo $customer['Customer']['regione']; ?>
	</td>
	</tr>
	
	<?php if(isset($customer['Customer']['telefono'])) {?>
	<tr>
	<td>
	<strong>telefono:</strong>
	<?php echo $customer['Customer']['telefono']; ?>
	</td>
	</tr>
	<?php } ?>
	
	
	<?php if(isset($customer['Customer']['fax'])) {?>
	<tr>
	<td>
	<strong>fax:</strong>
	<?php echo $customer['Customer']['fax']; ?>
	</td>
	</tr>
	<?php } ?>
	
	<?php if (isset($customer['Customer']['filesystem_id'])) {?>
	<tr>
	<td>
	<strong>Insegna:</strong><br/>
	<?php 
	
	echo $html->image($customer['Customer']['filesystem_id'], array('width' => '300px')); ?>
	</td>
	</tr>
	<?php } ?>
	
	
</table>

<p align="right" style="font-size:12px;color:#B01;">
			
			<?php echo $html->image('/img/icons/edit.png', array('url' => array('controller' => 'customers', 'action' => 'edit', $customer['Customer']['id']),"heigth"=>"30","width"=>"30")); ?>
			
</p>
<?php } else {?>

<p style="font-size:16px;font-weight:bolder;margin:40px 0 0 0;">
    	<p style="color:#000;font-size:16px;">
		
		<h2><img style="display:inline"; src="/img/icons/error.png" width="40" height="40"/> Non sei registrato</h2>
		
</p>
		
<br/>
<?php
}?>
