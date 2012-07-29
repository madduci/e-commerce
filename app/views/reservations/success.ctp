<?php 
$javascript->link('jquery/jquery', false);


?>

<p style="font-size:14px;color:#000;display:inline;">
<p style="margin:40px 0 0 0;">

<h2>Prenotazione inoltrata con successo
</h2>

</p>


<p style="font-size:14px">
	<strong>
<?php 

if(isset($_SESSION['CodicePrenotazione']))
	echo "<br/>Codice di Prenotazione: ".$_SESSION['CodicePrenotazione']."<br/><br/>";
?>
</strong>
</p>
			

<br/><br/>
<div style="display:inline;">
<div style="font-size:12px;color:#B01;display:inline;">
<a href="/">Torna alla Pagina Iniziale</a>
</div>

</div>
