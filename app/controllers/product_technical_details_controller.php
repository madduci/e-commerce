<?php
class ProductTechnicalDetailsController extends AppController {
	var $name = 'ProductTechnicalDetails';
	var $helpers = array('Html', 'Form');

	function admin_index() {
		$this->ProductTechnicalDetail->recursive = 0;
		$this->set('productTechnicalDetails', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash("Dettaglio tecnico non trovato");
			$this->redirect(array('action'=>'index'));
		}
		
		if (!$this->_exists($id, $this, "Dettaglio tecnico non trovato"))
			$this->redirect(array('action' => 'index'));
			
		$this->set('productTechnicalDetail', $this->ProductTechnicalDetail->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->ProductTechnicalDetail->create();
			if ($this->ProductTechnicalDetail->save($this->data)) {
				$this->Session->setFlash("Dettaglio tecnico aggiunto correttamente");
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash("Errore nell'aggiunta del dettaglio tecnico. Riprovare");
			}
		}
		
		$detailTypes = $this->_resolveForeignKey($this->ProductTechnicalDetail, 'DetailType', array('id', 'descrizione'), 'descrizione ASC');
		$this->set(compact('detailTypes', 'products'));
	}
	
	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash("Dettaglio tecnico non trovato");
			$this->redirect(array('action'=>'index'));
		}
		
		if (!$this->_exists($id, $this, "Dettaglio tecnico non trovato"))
			$this->redirect(array('action' => 'index'));
			
		if (!empty($this->data)) {
			if ($this->ProductTechnicalDetail->save($this->data)) {
				$this->Session->setFlash("Dettaglio tecnico modificato correttamente");
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash("Errore nella modifica del dettaglio tecnico. Riprovare");
			}
		}
		
		if (empty($this->data)) {
			$this->data = $this->ProductTechnicalDetail->read(null, $id);
		}
		$detailTypes = $this->ProductTechnicalDetail->DetailType->find('list');
		$products = $this->ProductTechnicalDetail->Product->find('list');
		$this->set(compact('detailTypes','products'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash("Dettaglio tecnico non trovato");
			$this->redirect(array('action'=>'index'));
		}
		
		if (!$this->_exists($id, $this, "Dettaglio tecnico non trovato"))
			$this->redirect(array('action' => 'index'));
			
		if ($this->ProductTechnicalDetail->del($id)) {
			$this->Session->setFlash("Dettaglio tecnico elminato con successo");
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>