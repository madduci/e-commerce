<?php
class DiscountCodesController extends AppController {

	var $name = 'DiscountCodes';
	var $helpers = array('Html', 'Form');

	function admin_index() {
		$this->DiscountCode->recursive = 0;
		$this->set('discountCodes', $this->paginate());
	}
	
	function admin_view() { }

	function admin_add() {
		if (!empty($this->data)) {
			$this->DiscountCode->create();
			
			if ($this->DiscountCode->save($this->data)) {
				$this->Session->setFlash("Codice sconto salvato correttamente", 'default', array('class' => 'flashsuccess'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash("Errore nell'aggiunta del codice sconto. Riprovare", 'default', array('class' => 'flasherror'));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash("Codice sconto non trovato", 'default', array('class' => 'flashwarning'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!$this->_exists($id, $this, "Codice sconto non trovato"))
			$this->redirect(array('action' => 'index'));
			
		if (!empty($this->data)) {
			if ($this->DiscountCode->save($this->data)) {
				$this->Session->setFlash("Codice sconto modificato correttamente", 'default', array('class' => 'flashsuccess'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash("Errore nella modifica del codice sconto. Riprovare", 'default', array('class' => 'flasherror'));
			}
		}
		
		if (empty($this->data)) {
			$this->data = $this->DiscountCode->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash("Codice sconto non trovato", 'default', array('class' => 'flashwarning'));
			$this->redirect(array('action'=>'index'));
		}
		
		if (!$this->_exists($id, $this, "Codice sconto non trovato"))
			$this->redirect(array('action' => 'index'));
			
		if ($this->DiscountCode->del($id)) {
			$this->Session->setFlash("Codice sconto eliminato con successo", 'default', array('class' => 'flashsuccess'));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>