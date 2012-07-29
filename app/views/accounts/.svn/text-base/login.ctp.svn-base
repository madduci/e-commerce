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


<?php if(!isset($user)){
	
	
?>

<p style="font-size:16px;font-weight:bolder;margin:60px 0 0 0;">
    	<p style="color:#000;font-size:16px;">Effettua il <u>Login</u> oppure <a href="/Accounts/add"><u>Registrati</u></a></p>
</p>
<br/>
<div style="font-size:14px;margin:0 0 0 70px;">
<br/><br/>
<strong><legend>Inserisci username e password</legend></strong><br/><br/><br/><br/>
			
			<?php
			echo $form->create('Account', array('url' => array('controller' => 'accounts', 'action' =>'login')));
			echo $form->input('Account.username');
			echo $form->input('Account.password').'<br/><br/><br/>';
			?>
			<div style="float:left;margin:0 0 0 120px;">
			<?php echo $form->end('Login');	?></div>
</div>

<?php } else {?>

<p style="font-size:16px;font-weight:bolder;margin:60px 0 0 0;">
    	<p style="color:#000;font-size:16px;">Sei gi&agrave; loggato!</p>
</p>
<br/>
		
<?php
}?>


