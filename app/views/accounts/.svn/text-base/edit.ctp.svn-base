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

label {
	display:inline-block;
	line-height:1.8;
	vertical-align:top;
	width:130px;
}

	

</style>


<?php if(isset($_SESSION['Auth']['Account'])){
	

?>



<p style="font-size:16px;font-weight:bolder;margin:60px 0 0 0;">
    	<p style="color:#000;font-size:16px;">Modifica le tue informazioni</p>	
	<p style="font-size:12px"><?php echo "<strong>username:    ".$_SESSION['Auth']['Account']['username']."</strong></br><br/>"; ?></p>
</p>
<br/>


<div class="accounts form">
<?php echo $form->create('Account');?>
	
	<?php
		
		//echo $form->input('nome');
		//echo $form->input('cognome');
		//echo $form->input('username');
		echo $form->input('password', array('value' => ''));
		echo $form->input('email');
		
	?>
	
<?php 
echo $form->submit('/img/icons/save.png', array('div'=>'false'));
echo $form->end();?>
</div>

<p align="right" style="font-size:12px;color:#B01;">
			
			<?php echo $html->image('/img/icons/edit.png', array('url' => array('controller' => 'accounts', 'action' => 'edit', $_SESSION['Auth']['Account']['id']),"heigth"=>"30","width"=>"30")); ?>
			
			<?php echo $html->image('/img/icons/delete.png', array('url' => array('controller' => 'accounts', 'action' => 'delete', $_SESSION['Auth']['Account']['id']),"heigth"=>"30","width"=>"30")); ?>
			
</p>
<?php }  else {?>


<p style="font-size:16px;font-weight:bolder;margin:60px 0 0 0;">
    	<p style="color:#000;font-size:16px;">
		
		<h2><img style="display:inline"; src="/img/icons/warning.png" width="40" height="40"/> Attenzione - non sei registrato</h2>
		
		</p>
		
<br/>
<?php
}?>

