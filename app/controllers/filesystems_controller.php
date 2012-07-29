<?php
class FilesystemsController extends AppController {

	var $name = 'Filesystems';
	var $helpers = array('Html', 'Form');

	function view($id = null) {
		$this->autoRender = false;
		
		if (!$id) {
			$this->Session->setFlash(__('Invalid Filesystem.', true));
			$this->redirect(array('action'=>'index'));
		}
		
		$mimetype = array('jpg' => 'image/jpeg', 'jpeg' => 'image/jpeg');
		
		if ($this->_exists($id, $this, "")) {
			$file = $this->Filesystem->read(null, $id);
			$img = $_SERVER['DOCUMENT_ROOT'].'/img/uploads/'.$file['Filesystem']['file'];
			header('Content-type: image/jpeg');
			$im = imagecreatefromjpeg($img);
			imagejpeg($im);
		} else {
			$img = $_SERVER['DOCUMENT_ROOT'].'/img/nofoto.gif';
			header('Content-type: image/gif');
			$im = imagecreatefromgif($img);
			imagegif($im);
		}

		imagedestroy($im);
	}
	
	function beforeFilter() {
	    parent::beforeFilter(); 
	    $this->Auth->allowedActions = array('view');
	}
}
?>