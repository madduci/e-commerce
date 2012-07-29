<?php
//versione modificata da Antonio Lorè perchè quella originale faceva cacare.
require_once($_SERVER['DOCUMENT_ROOT'].'/core/common/settings.php');

$dest = FILES;

if (!empty($_FILES)) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $dest;

	$f = fopen($targetPath."report.txt", "wb");
	
	 // foreach ($_GET as $key => $value) {
	 // 	 		#foreach($value as $k => $v) {
	 // 	 			fwrite($f, $key." = ".$value."\n");
	 // 	 		#}
	 // 	 	}
	 // 	 	fclose($f);
	

	$targetFile = $targetPath.time().mt_rand(0,100).".pdf";
	
	// Uncomment the following line if you want to make the directory if it doesn't exist
	#mkdir(str_replace('//','/',$targetPath), 0755, true);
	
	move_uploaded_file($tempFile,$targetFile);
	
}
echo basename($targetFile);