<?php 
$javascript->link('jquery/jquery', false);

?>


<?php 

if(!isset($_SESSION['Cart'])){
	
	
?>

<p style="font-size:16px;font-weight:bolder;margin:60px 0 0 0;">
    	<p style="color:#000;font-size:16px;">Impossibile inoltrare l'ordine</p>
</p>
<br/>

<p style="font-size:14px;margin:20px 0 0 0;">
	Uno dei seguenti prodotti ha generato problemi:<br/>
			<?php 
				foreach($errors as $error){
					echo "Quantità disponibile insufficiente per il prodotto: <br/>";?>
					<strong><?php echo $error['codice_prodotto'];?></strong><br/>
			<?php		
				
						
						echo $error['nome'];
				}
			
			?>
</p>

<br/><br/>
<div style="display:inline;">
<div style="font-size:12px;color:#B01;display:inline;">
<a href="/Carts/index">Torna al Carrello</a>
</div>

</div>
<?php }?>


