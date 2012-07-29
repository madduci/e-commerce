<?php
class GroupsController extends AppController {
	var $name = 'Groups';
	var $helpers = array('Html', 'Form');
	var $components = array('Filesystem' => array('upload_size_limit' => 2097152));

	function admin_index() {
		$this->Group->recursive = 0;
		$this->set('groups', $this->paginate());
	}
	
	function admin_view() { }

	function admin_add() {
		if (!empty($this->data)) {
			$this->Group->create();
			if ($this->Group->save($this->data)) {
				$this->Session->setFlash('Gruppo salvato correttamente', 'default', array('class' => 'flashsuccess'));
				$this->redirect(array('action' => 'edit', 'id' => $this->Group->getLastInsertID()));
			} else {
				$this->Session->setFlash('Errore nell\'aggiunta del gruppo. Riprovare.', 'default', array('class' => 'flasherror'));
			}
		}
		
		$on_complete = '$("#GroupFilesystemId").val((d));
						$("#uploadform").html(\'<img src="/img/\'+d+\'" width="150px" />\');';
		
		$this->set('css', $this->Filesystem->css());
		$this->set('scriptjs', $this->Filesystem->include_js());
		$this->set('script', $this->Filesystem->jquery_script('/js/jquery/plugins/uploadify/', '/img/uploads', '*.jpg;*.jpeg;*.png', 'false', '/admin/groups/upload_file', $on_complete));
		$this->set('upload_form', $this->Filesystem->form());
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash("Gruppo non trovato", 'default', array('class' => 'flashwarning'));
			$this->redirect(array('action'=>'index'));
			$this->Session->setFlash('Gruppo modificato con successo', 'default', array('class' => 'flashsuccess'));
		}
		
		if (!$this->_exists($id, $this, "Gruppo non trovato", 'default', array('class' => 'flasherror')))
			$this->redirect(array('action' => 'index'));
		
		if (!empty($this->data)) {
			if ($this->Group->save($this->data)) {
				$this->Session->setFlash('Gruppo modificato con successo', 'default', array('class' => 'flashsuccess'));
				
				if (isset($this->data['deleteFile']) && $this->data['deleteFile'] != 0) {
					if (!$this->Filesystem->delete($this->data['deleteFile']))
						$this->Session->setFlash('Errore nella rimozione dell\'insegna.', 'default', array('class' => 'flasherror'));

					$this->data = $this->Group->read(null, $id);
				}
				
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Errore nella modifica del gruppo. Riprovare.', 'default', array('class' => 'flasherror'));
			}
		}
		
		if (empty($this->data)) {
			$this->data = $this->Group->read(null, $id);
		}
		
		$filesystems = $this->Group->Filesystem->findById($this->data['Group']['filesystem_id'], 'id, file', null);
		$this->set('filesystem', $filesystems);
		
		$on_complete = '$("#GroupFilesystemId").val((d));
						$("#GroupEditForm").submit();';
		
		$this->set('css', $this->Filesystem->css());
		$this->set('scriptjs', $this->Filesystem->include_js());
		$this->set('script', $this->Filesystem->jquery_script('/js/jquery/plugins/uploadify/', '/img/uploads', '*.jpg;*.jpeg', 'false', '/admin/groups/upload_file', $on_complete));
		$this->set('upload_form', $this->Filesystem->form());
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash("Gruppo non trovato", 'default', array('class' => 'flashwarning'));
			$this->redirect(array('action'=>'index'));
		}
		
		if (!$this->_exists($id, $this, "Gruppo non trovato"))
			$this->redirect(array('action' => 'index'));
		
		$group_before_delete = $this->Group->read(null, $id);

		if ($this->Group->del($id)) {
			if (isset($group_before_delete['Group']['filesystem_id'])) 
				$this->Filesystem->delete($group_before_delete['Group']['filesystem_id']);
			
			$this->Session->setFlash('Gruppo eliminato con successo', 'default', array('class' => 'flashsuccess'));
			$this->redirect(array('action'=>'index'));
		}
	}
	
	function admin_upload_file() {
		$this->autoRender = false;

		echo $this->Filesystem->process_upload();
	}
	
	function beforeFilter() {
	    parent::beforeFilter(); 
	    $this->Auth->allowedActions = array('admin_upload_file');
	}

}
?>