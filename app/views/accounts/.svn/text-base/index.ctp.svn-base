<?php 
$javascript->link('jquery/jquery', false);

?>

<?php if(isset($user)){
	
?>


<p style="font-size:16px;font-weight:bolder;margin:60px 0 0 0;">
    	<p style="color:#000;font-size:16px;"><h2>Il tuo account</h2></p>
		<?php if($user['account_type_id']==3){?>
		<p style="display:inline;font-weight:bolder;margin:0 0 0 500px">Dati Cliente <?php echo $html->image('/img/icons/next.png', array('url' => array('controller' => 'customers', 'action' => 'index', $user['id']),"heigth"=>"20","width"=>"20")); ?>
			</p><?php } ?>
</p>
<br/>
<table cellspacing="5" style="font-size:14px;color:#000000;">
	
	<tr>
	<?php /*<td>
	<strong>Id utente:</strong>
	<?php echo $user['id']; ?>
	</td>
	</tr>
	<td><strong>Nome:</strong>
	<?php echo $user['nome']; ?>
	</td>
	</tr>
	<td><strong>Cognome:</strong>
	<?php echo $user['cognome']; ?>
	</td>
	</tr>*/ ?>
	<td><strong>Username:</strong>
	<?php echo $user['username']; ?>
	</td>
	</tr>
	<td><strong>E-mail:</strong>
	<?php echo $user['email']; ?>	
	</td></tr>
</table>

<p align="right" style="font-size:12px;color:#B01;">
			
			
			<?php echo $html->image('/img/icons/edit.png', array('url' => array('controller' => 'accounts', 'action' => 'edit', $_SESSION['Auth']['Account']['id']),"heigth"=>"30","width"=>"30")); ?>
			
			<?php echo $html->image('/img/icons/delete.png', array('url' => array('controller' => 'accounts', 'action' => 'delete', $_SESSION['Auth']['Account']['id']),"heigth"=>"30","width"=>"30")); ?>
			
</p>
<?php } else {?>

<p style="font-size:16px;font-weight:bolder;margin:60px 0 0 0;">
    	<p style="color:#000;font-size:16px;">
		
		
		<h2><img style="display:inline"; src="/img/icons/error.png" width="40" height="40"/> Non sei registrato</h2>
		</p>
		
<br/>
		
<?php
}?>



