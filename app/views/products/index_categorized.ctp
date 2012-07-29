<?php 
	$javascript->link('jquery/jquery', false);
	$javascript->link('jquery/plugins/jquery.slider', false);
?>

<br>
<p style="font-size:14px;color:#000;">


<?php
$total=count($percorso);

$index=$total-1;

 		
 		echo "<p style=\"margin: 60px 0 0 0px;display:inline;\">";
		foreach($percorso as $key=>$path){
			
			if($key==0){
				
				echo "<a href=\"/Products/index\"\">Prodotti</a>" ;
			
				
			}else{
				
				echo "<a href=\"/Products/index_categorized/".$path['ProductCategory']['id']."\"> ".$path['ProductCategory']['name']."</a>" ;
			}
			echo " > ";
		}
		echo "</p>";

echo "<h2>".$percorso[$index]['ProductCategory']['name']."</h2>";?>
</p>
<br><br/>
<?php 

if(isset($childrens)){ 
	echo "<p style=\"margin: 60px 0 0 0px;display:inline;\">";
	
 	foreach($childrens as $children){
 		
 		if($children['ProductCategory']['parent_id']==$percorso[$index]['ProductCategory']['id']){
	 		echo "<div style=\"margin: 60px 0 0 0px;display:inline;\">";
			echo "<a href=\"/Products/index_categorized/".$children['ProductCategory']['id']."\" >";
			echo "<strong>".$children['ProductCategory']['name']."</strong>";
			echo "</a>";
			echo "</div>";
			echo " | ";
		}
		
	 }	 
	 echo "</p>";
	 
	 
}	  ?>

<table id="mytable" cellspacing="0" summary="" style="margin:30px 0 0 0">
    <tr>
	<th scope="col" ><?php echo $paginator->sort('codice_prodotto');?></th>
	<th scope="col" ><?php echo $paginator->sort('nome');?></th>
	<th scope="col" ><?php echo $paginator->sort('disponibilità');?></th>
	<th scope="col" ><?php echo $paginator->sort('prezzo');?></th>
	
	</tr>
	

<?php
$i = 0;
foreach ($products as $product):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>

	<tr<?php echo $class;?>>
		
		<td>
			<?php echo $product['Product']['codice_prodotto']; ?>
		</td>
		<td>
			<a style="color:#BC1B32;" href="/Products/view/<?php echo $product['Product']['id'];?>">
			<?php echo "<u>".$product['Product']['nome']."</u>"; ?>
			</a>
		</td>
		
		<td>
			<?php if($product['Product']['product_status_id']>0){
			 ?>
			 <img style="margin:0 0 0 50px;" src="/img/icons/accept.png" width="20" height="20"/>
			 <?php } else {?>
			 <img style="margin:0 0 0 50px;" src="/img/icons/delete.png" width="20" height="20"/>
			 <?php } ?>
		</td>
		<td>
			<?php echo $product['Product']['prezzo'].' €'; ?>
		</td>
			
		
	</tr>

<?php endforeach; ?>
</table>
</div>

<div class="paging">
	<?php echo $paginator->prev('<< precedente', array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next('successivo >>', array(), null, array('class' => 'disabled'));?>
</div>


<div class="clear"/>
