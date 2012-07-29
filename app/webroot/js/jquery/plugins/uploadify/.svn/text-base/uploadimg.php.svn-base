<?php
//versione modificata da Antonio Lorè perchè quella originale faceva cacare.
require_once($_SERVER['DOCUMENT_ROOT'].'/core/common/settings.php');

$w_max = 475;
$h_max = 296;

$dest = FILES;

if (!empty($_FILES)) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $dest;

	//$f = fopen($targetPath."report.txt", "wb");
	
	// foreach ($_GET as $key => $value) {
	// 		#foreach($value as $k => $v) {
	// 			fwrite($f, $key." = ".$value."\n");
	// 		#}
	// 	}
	// 	fclose($f);
	

	$targetFile = $targetPath.resizeFoto($tempFile, $targetPath, time().mt_rand(0,100), $w_max, $h_max);
	
	// Uncomment the following line if you want to make the directory if it doesn't exist
	#mkdir(str_replace('//','/',$targetPath), 0755, true);
	
	//move_uploaded_file($tempFile,$targetFile);
	
}

#echo '1';
echo basename($targetFile);

function resizeFoto($path, $dest, $newname, $w_max, $h_max) {
	$ext = "jpg";
	$fullname = strtolower($newname.".".$ext);
	#$fullname = basename($path);
	
	$im = imagecreatefromjpeg($path);
	$bg = imagecolorallocate($im, 255, 255, 255);

	list($width, $height) = getimagesize($path);
	
	#determino le nuove dimensioni
	$ratio = (float)$width / $height;
	
	if ($ratio > 1) {
		if ($width > $w_max)
			$w_new = $w_max;
		else
			$w_new = $width;
			
		$h_new = ceil($w_new / $ratio);
	} else {
		if ($height > $h_max)
			$h_new = $h_max;
		else
			$h_new = $height;
			
		$w_new = ceil($h_new * $ratio);
	}
	
	$imageResized = imagecreatetruecolor($w_new,$h_new);

	imagecopyresampled ($imageResized,$im,0,0,0,0,$w_new,$h_new,$width,$height);
	//imagedestroy($im);
	imagejpeg($imageResized, $dest.$fullname);
	//imagejpeg($path);
	#imagejpeg($thumb, $_SERVER['DOCUMENT_ROOT']."/foto/tb_".$fullaname);

	#unlink($path);
   
	return $fullname;
}
?>