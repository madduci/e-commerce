<?php
class DetailTypesController extends AppController {

	var $name = 'DetailTypes';
	var $helpers = array('Html', 'Form');

	function admin_index() {
		$this->DetailType->recursive = 0;
		$conditions = array();
		
		if (!isset($_SESSION['admin_detailtype_search']))
			$_SESSION['admin_detailtype_search'] = ' ';

		if (isset($this->params['named']['search'])) {
			$_SESSION['admin_detailtype_search'] = $this->params['named']['search'];
		} else {
			if (!isset($this->params['named']['page']))
				$_SESSION['admin_detailtype_search'] = ' ';
		}
		
		$conditions = array('1' => "1 AND descrizione REGEXP '".addslashes($_SESSION['admin_detailtype_search'])."'");
		
		$this->set('detailTypes', $this->paginate('DetailType', $conditions));
	}
	
	function admin_view() {
		
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->DetailType->create();
			
			if ($this->DetailType->save($this->data)) {
				$this->Session->setFlash("Tipo dettaglio tecnico aggiunto correttamente", 'default', array('class' => 'flashsuccess'));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash("Errore nell'aggiunta del tipo dettaglio tecnico. Riprovare", 'default', array('class' => 'flasherror'));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash("Tipo dettaglio tecnico non trovato", 'default', array('class' => 'flashwarning'));
			$this->redirect(array('action'=>'index'));
		}
		
		if (!empty($this->data)) {
			if ($this->DetailType->save($this->data)) {
				$this->Session->setFlash("Tipo dettaglio tecnico modificato correttamente", 'default', array('class' => 'flashsuccess'));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash("Errore nella modifica del tipo dettaglio tecnico. Riprovare", 'default', array('class' => 'flasherror'));
			}
		}
		
		if (!$this->_exists($id, $this, "Tipo dettaglio tecnico non trovato"))
			$this->redirect(array('action' => 'index'));
			
		if (empty($this->data)) {
			$this->data = $this->DetailType->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash("Tipo dettaglio tecnico non trovato", 'default', array('class' => 'flashwarning'));
			$this->redirect(array('action'=>'index'));
		}
		
		if (!$this->_exists($id, $this, "Tipo dettaglio tecnico non trovato"))
			$this->redirect(array('action' => 'index'));
			
		if ($this->DetailType->del($id)) {
			$this->Session->setFlash("Tipo dettaglio tecnico eliminato con successo", 'default', array('class' => 'flashsuccess'));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>