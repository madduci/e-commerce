<?php
class AnomalyTypesController extends AppController {

	var $name = 'AnomalyTypes';
	var $helpers = array('Html', 'Form');

	function admin_index() {
		$this->AnomalyType->recursive = 0;
		$this->set('anomalyTypes', $this->paginate());
	}
	
	function admin_view() { }

	function admin_add() {
		if (!empty($this->data)) {
			$this->AnomalyType->create();
			if ($this->AnomalyType->save($this->data)) {
				$this->Session->setFlash("Tipologia Anomalia salvata correttamente", 'default', array('class' => 'flashsuccess'));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash("Errore nella creazione della Tipologia Anomalia. Riprovare.", 'default', array('class' => 'flasherror'));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash("Tipologia Anomalia non trovata", 'default', array('class' => 'flashwarning'));
			$this->redirect(array('action'=>'index'));
		}
		
		if (!$this->_exists($id, $this, "Tipologia Anomalia non trovata"))
			$this->redirect(array('action' => 'index'));
			
		if (!empty($this->data)) {
			if ($this->AnomalyType->save($this->data)) {
				$this->Session->setFlash("Tipologia Anomalia modificata correttamente", 'default', array('class' => 'flashsuccess'));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash("Errore nella modifica della Tipologia Anomalia. Riprovare.", 'default', array('class' => 'flasherror'));
			}
		}
		
		if (empty($this->data)) {
			$this->data = $this->AnomalyType->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash("Tipologia Anomalia non trovata", 'default', array('class' => 'flashwarning'));
			$this->redirect(array('action'=>'index'));
		}
		
		if (!$this->_exists($id, $this, "Tipologia Anomalia non trovata"))
			$this->redirect(array('action' => 'index'));
			
		if ($this->AnomalyType->del($id)) {
			$this->Session->setFlash("Tipologia Anomalia eliminata con successo", 'default', array('class' => 'flashsuccess'));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>