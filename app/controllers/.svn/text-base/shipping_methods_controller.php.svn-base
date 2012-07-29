<?php
class ShippingMethodsController extends AppController {

	var $name = 'ShippingMethods';
	var $helpers = array('Html', 'Form');

	function admin_index() {
		$this->ShippingMethod->recursive = 0;
		$this->set('shippingMethods', $this->paginate());
	}
	
	function admin_view() { }

	function admin_add() {
		if (!empty($this->data)) {
			$this->ShippingMethod->create();
			if ($this->ShippingMethod->save($this->data)) {
				$this->Session->setFlash("Metodo di spedizione creato correttamente", 'default', array('class' => 'flashsuccess'));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash("Errore nell'aggiunta del metodo di spedizione. Riprovare", 'default', array('class' => 'flasherror'));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash("Metodo di spedizione non trovato", 'default', array('class' => 'flashwarning'));
			$this->redirect(array('action'=>'index'));
		}
		
		if (!$this->_exists($id, $this, "Metodo di spedizione non trovato"))
			$this->redirect(array('action' => 'index'));
			
		if (!empty($this->data)) {
			if ($this->ShippingMethod->save($this->data)) {
				$this->Session->setFlash("Metodo di spedizione modificato correttamente", 'default', array('class' => 'flashsuccess'));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash("Errore nella modifica del metodo di spedizione. Riprovare", 'default', array('class' => 'flasherror'));
			}
		}
		
		if (empty($this->data)) {
			$this->data = $this->ShippingMethod->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash("Metodo di spedizione non trovato", 'default', array('class' => 'flashwarning'));
			$this->redirect(array('action'=>'index'));
		}
		
		if (!$this->_exists($id, $this, "Metodo di spedizione non trovato"))
			$this->redirect(array('action' => 'index'));
			
		if ($this->ShippingMethod->del($id)) {
			$this->Session->setFlash("Metodo di spedizione eliminato con successo", 'default', array('class' => 'flashsuccess'));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>