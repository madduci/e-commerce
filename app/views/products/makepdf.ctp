
<?php	App::import('Vendor', 'dompdf', array('file' => 'dompdf' . DS . 'dompdf_config.inc.php'));
		debug($products);
		$pdf_file = 'listino.pdf';
		$prodotti='<table cellspacing="5" cellpadding="5" class="separate" style="margin:30px 0 0 0"><thead><tr>
	<th>codice_prodotto</th><th>nome</th><th>categoria</th><th>prezzo unitario</th></tr></thead>';
		

$count=1;
$i = 0;
foreach ($products as $product):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>

	<tr<?php echo $class;?>>
		
		<td>
			<?php 
					$prodotti .= '<tr><td><strong>'.$count.'.</strong> '.$product['Product']['codice_prodotto'].'</td>';					
			?>
		</td>
		<td>
			
			<?php 
					$prodotti .= '<td>'.$product['Product']['nome'].'</td>';			
			?>
			
		</td>
		<td>
			<?php 
					$prodotti .= '<td>'.$product['ProductCategory']['name'].'</td>';
			?>
			
		</td>
		
		
		<td>
			<?php 
				$prodotti .= '<td>'.$product['Product']['prezzo'].' euro</td></tr>';
			?>
		</td>
			
		
	</tr>
<?php  $count++; endforeach; 

	$html = '<html><body><p style="font-size:25px;font-weight:bolder;text-align:center;">Listino Prodotti</p><p style="text-align:center">'.$prodotti.'</table></p></body></html>';
		
		setlocale(LC_ALL,"it");
		$dompdf = new DOMPDF();
		$dompdf->load_html($html);
		$dompdf->render();
		
		//$dompdf->output();
		file_put_contents('listino.pdf', $dompdf->output());
		chmod("listino.pdf", 777);
		
		
		$dompdf->stream("listino.pdf");
		
		
?>
</table>

</div>


<div class="clear"/>


