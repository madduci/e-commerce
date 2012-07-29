<?php
	class FileSystemComponent extends Object {
		var $model = 'Filesystem';
		var $upload_size_limit;
		var $w_max = 640;
		var $h_max = 480;
		var $fs;
		
		function initialize(&$controller, $settings = array()) {
			$this->controller =& $controller;
			$this->upload_size_limit = $settings['upload_size_limit'];
			$this->fs = ClassRegistry::init($this->model);
		}
	
		function delete($id = null) {
			$file_to_delete = $this->fs->read(null, $id);
			
			if ($this->fs->del($file_to_delete['Filesystem']['id']))
				unlink($_SERVER['DOCUMENT_ROOT'].'/img/uploads/'.$file_to_delete['Filesystem']['file']);
			else
				return false;
			
			return true;
		}
		
		function css() {
			return array('uploadify', 'uploadify.jGrowl');
		}
		
		function include_js() {
			return array('jquery/plugins/jquery.jgrowl_minimized.js', 'jquery/plugins/jquery.uploadify.js');
		}
		
		function jquery_script($plugin_path = '/js/jquery/plugins/uploadify/', $destination_path = '/img/uploads', $allowed_extensions = '*.jpg;*.jpeg;*.png', $multi_upload = 'false', $upload_script, $on_complete) {
			
			$script = "<script type='text/javascript' charset='utf-8'>
				$(document).ready(function(){
					var filelimit = ".$this->upload_size_limit.";
					var path = '/js/jquery/plugins/uploadify/';
					
					$('#fileUploadgrowl').fileUpload({
						'uploader': path + 'uploader.swf',
						'cancelImg': path + 'cancel.png',
						'script': '".$upload_script."',
						'folder': '".$destination_path."',
						'fileDesc': 'Files',
						'fileExt': '".$allowed_extensions."',
						'multi': ".$multi_upload.",
						'simUploadLimit': 5,
						'sizeLimit': filelimit,
						'displayData': 'speed',
						'buttonText': 'Scegli immagine',
						onError: function (event, queueID ,fileObj, errorObj) {
							var msg;
							if (errorObj.status == 404) {
								alert('Errore di upload. File di sistema mancanti.');
								msg = 'Errore di upload. File di sistema mancanti.';
								} else if (errorObj.type === 'HTTP')
								msg = errorObj.type+': '+errorObj.status;
								else if (errorObj.type === 'File Size')
								msg = fileObj.name+'<br> Limite di '+Math.round(errorObj.sizeLimit/1024)+'KB superato.';
								else
								msg = errorObj.type+': '+errorObj.text;
								$.jGrowl('<p></p>'+msg, {
									theme: 	'error',
									header: 'ERRORE',
									sticky: true
								});			
								$('#fileUploadgrowl' + queueID).fadeOut(250, function() { $('#fileUploadgrowl' + queueID).remove()});
								return false;
							},
							onCancel: function (a, b, c, d) {
								var msg = 'Caricamento annullato: '+c.name;
								$.jGrowl('<p></p>'+msg, {
									theme: 	'warning',
									header: 'Caricamento annullato',
									life:	4000,
									sticky: false
								});
							},
							onClearQueue: function (a, b) {
								var msg = 'Eliminati '+b.fileCount+' immagini dalla coda';
								$.jGrowl('<p></p>'+msg, {
									theme: 	'warning',
									header: 'Coda eliminata',
									life:	4000,
									sticky: false
								});
							},
							onComplete: function (a, b ,c, d, e) {
								var size = Math.round(c.size/1024);
								$.jGrowl('<p></p>'+c.name+' - '+size+'KB', {
									theme: 	'success',
									header: 'Caricamento completato',
									life:	4000,
									sticky: false
								});
								
								".$on_complete."
							}
						});

					});
			</script>";
			
			return $script;
		}
		
		function form() {
			return '<div id="uploadform"><div id="fileUploadgrowl">Configurazione errata. Impossibile procedere.</div>
			<a href="javascript:$(\'#fileUploadgrowl\').fileUploadStart()">Avvia caricamento</a> |  <a href="javascript:$(\'#fileUploadgrowl\').fileUploadClearQueue()">Elimina coda</a></div>';
		}
		
		function process_upload() {
			switch ($_FILES['Filedata']['error']) {
				case 0:
					if (!empty($_FILES)) {
						$tempFile = $_FILES['Filedata']['tmp_name'];
						$targetPath = $_SERVER['DOCUMENT_ROOT'] . $_GET['folder'] . '/';
						$fileinfo = pathinfo($_FILES['Filedata']['name']);
						$filename = time().mt_rand(0,100).'.'.$fileinfo['extension'];

						$targetFile =  str_replace('//','/', $targetPath) . $filename;
						move_uploaded_file($tempFile, $targetFile);

						$data = array('file' => $filename);
						$this->_resize_image($targetFile);
						
						$this->fs->save($data);
						
						return $this->fs->getLastInsertID();
					}

					break;
				case 1:
					$msg = "The file is bigger than this PHP installation allows";
					break;
				case 2:
					$msg = "The file is bigger than this form allows";
					break;
				case 3:
					$msg = "Only part of the file was uploaded";
					break;
				case 4:
					$msg = "No file was uploaded";
					break;
				case 6:
					$msg = "Missing a temporary folder";
					break;
				case 7:
					$msg = "Failed to write file to disk";
					break;
				case 8:
					$msg = "File upload stopped by extension";
					break;
				default:
					$msg = "unknown error ".$_FILES['Filedata']['error'];
				break;
			}
		}
		
		function _resize_image($path) {
			$w_max = $this->w_max;
			$h_max = $this->h_max;

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
			imagejpeg($imageResized, $path);
		}
	}
?>