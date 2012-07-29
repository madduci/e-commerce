// $(document).ready(function(){
// 	$("#fileUploadgrowl").fileUpload({
// 		 var path = '<?php $html->url("/app/webroot/uploadify/"); ?>';
// 		'uploader': path + '/uploader.swf',
// 		'cancelImg': '/uploadify/cancel.png',
// 		'script': '/uploadify/upload.php',
// 		'folder': '/uploadify/files',
// 		'fileDesc': 'Image Files',
// 		'fileExt': '*.jpg;*.jpeg',
// 		'multi': true,
// 		'simUploadLimit': 4,
// 		'sizeLimit': <?php echo $filelimit; ?>,
// 		'displayData': 'speed',
// 		'buttonText': 'Scegli immagini',
// 		onError: function (event, queueID ,fileObj, errorObj) {
// 			var msg;
// 			if (errorObj.status == 404) {
// 				alert('Errore di upload. File di sistema mancanti.');
// 				msg = 'Errore di upload. File di sistema mancanti.';
// 				} else if (errorObj.type === "HTTP")
// 				msg = errorObj.type+": "+errorObj.status;
// 				else if (errorObj.type ==="File Size")
// 				msg = fileObj.name+'<br> Limite di '+Math.round(errorObj.sizeLimit/1024)+'KB superato.';
// 				else
// 				msg = errorObj.type+": "+errorObj.text;
// 				$.jGrowl('<p></p>'+msg, {
// 					theme: 	'error',
// 					header: 'ERRORE',
// 					sticky: true
// 				});			
// 				$("#fileUploadgrowl" + queueID).fadeOut(250, function() { $("#fileUploadgrowl" + queueID).remove()});
// 				return false;
// 			},
// 			onCancel: function (a, b, c, d) {
// 				var msg = "Caricamento annullato: "+c.name;
// 				$.jGrowl('<p></p>'+msg, {
// 					theme: 	'warning',
// 					header: 'Caricamento annullato',
// 					life:	4000,
// 					sticky: false
// 				});
// 			},
// 			onClearQueue: function (a, b) {
// 				var msg = "Eliminati "+b.fileCount+" immagini dalla coda";
// 				$.jGrowl('<p></p>'+msg, {
// 					theme: 	'warning',
// 					header: 'Coda eliminata',
// 					life:	4000,
// 					sticky: false
// 				});
// 			},
// 			onComplete: function (a, b ,c, d, e) {
// 				var size = Math.round(c.size/1024);
// 				$.jGrowl('<p></p>'+c.name+' - '+size+'KB', {
// 					theme: 	'success',
// 					header: 'Caricamento completato',
// 					life:	4000,
// 					sticky: false
// 				});
// 
// 				// var id = <?php echo $_GET['id']; ?>;
// 				// 						$.get("storeFiles.php", { 'id': id, 'filename': d }, function(data) {
// 					// 							imgrefs = data.split("|");
// 					// 							newImgBox = '<div class="foto"><img src="<?php echo FILESURL; ?>'+ imgrefs[2] + '" height="60" /><br>D: <input type="radio" name="default" value="'+ imgrefs[1] +'" />E: <input type="checkbox" name="deleteFoto[]" value="' + imgrefs[0] + '" id="delete" /></div>';
// 					// 							$('#foto').append(newImgBox);
// 				//});
// 			}
// 		});
// 
// 	});