<?php 
$javascript->link('jquery/jquery', false);
?>


<style type="text/css">
.error-message {
	color:red;
}

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

if(!isset($_SESSION['Auth']['Account'])){
	
	
?>

<p style="font-size:16px;font-weight:bolder;margin:60px 0 0 0;">
    	<p style="color:#000;font-size:16px;">Registra un nuovo account</p>
</p>
<br/>



<div style="margin:30px 0 0 0;" class="accounts form">
<?php echo $form->create('Account');?>
	
	<?php
		
		//echo $form->input('nome');
		//echo $form->input('cognome');
		echo $form->input('username');
		echo $form->input('password', array('value' => ''));
		echo $form->input('email');
		
	?>
		
	
	
<?php  echo $form->submit('/img/icons/save.png', array('div'=>'false'));
echo $form->end();

 ?>
</div>

<p style="font-size:12px;color:#B01;display:inline;margin:0 0 0 600px">
			
		<a style="display:inline;" href="/"><img src="/img/icons/exit.png" alt="Annulla"/></a>
			
</p>
<?php } else {?>


<p style="font-size:16px;font-weight:bolder;margin:60px 0 0 0;">
    	<p style="color:#000;font-size:16px;">
		
		<h2><img style="display:inline"; src="/img/icons/warning.png" width="40" height="40"/> Attenzione - sei gi&agrave; registrato</h2>
		
		</p>
		
<br/>
<?php
}?>
