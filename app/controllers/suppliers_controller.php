<?php
class SuppliersController extends AppController {
	var $name = 'Suppliers';
	var $helpers = array('Html', 'Form');

	function admin_index() {
		$this->Supplier->recursive = 0;
		$conditions = array();
		
		if (!isset($_SESSION['admin_supplier_search']))
			$_SESSION['admin_supplier_search'] = ' ';

		if (isset($this->params['named']['search'])) {
			$_SESSION['admin_supplier_search'] = $this->params['named']['search'];
		} else {
			if (!isset($this->params['named']['page']))
				$_SESSION['admin_supplier_search'] = ' ';
		}
		
		$conditions = array('1' => "1 AND ragione_sociale REGEXP '".addslashes($_SESSION['admin_supplier_search'])."'");
		
		$this->set('suppliers', $this->paginate('Supplier', $conditions));
	}
	
	function admin_view() { }

	function admin_add() {
		if (!empty($this->data)) {
			$this->Supplier->create();
			
			if ($this->Supplier->save($this->data)) {
				$this->Session->setFlash("Fornitore aggiunto correttamente", 'default', array('class' => 'flashsuccess'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash("Errore nell'aggiunta del fornitore. Riprovare", 'default', array('class' => 'flasherror'));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash("Fornitore non trovato", 'default', array('class' => 'flashwarning'));
			$this->redirect(array('action'=>'index'));
		}
		
		if (!$this->_exists($id, $this, "Fornitore non trovato"))
			$this->redirect(array('action' => 'index'));
			
		if (!empty($this->data)) {
			if ($this->Supplier->save($this->data)) {
				$this->Session->setFlash("Fornitore modificato correttamente.", 'default', array('class' => 'flashsuccess'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash("Errore nella modifica del fornitore. Riprovare", 'default', array('class' => 'flasherror'));
			}
		}
		
		if (empty($this->data)) {
			$this->data = $this->Supplier->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash("Fornitore non trovato", 'default', array('class' => 'flashwarning'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!$this->_exists($id, $this, "Fornitore non trovato"))
			$this->redirect(array('action' => 'index'));
			
		if ($this->Supplier->del($id)) {
			$this->Session->setFlash("Fornitore eliminato con successo.", 'default', array('class' => 'flashsuccess'));
			$this->redirect(array('action'=>'index'));
		}
	}
}
?>