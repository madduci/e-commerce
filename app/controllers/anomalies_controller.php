<?php
class AnomaliesController extends AppController {

	var $name = 'Anomalies';
	var $helpers = array('Html', 'Form');

	function admin_index() {
		$this->Anomaly->recursive = 0;
		$this->set('anomalies', $this->paginate());
	}
	
	function admin_view() { }
	
	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash("Anomalia non trovata", 'default', array('class' => 'flashwarning'));
			$this->redirect(array('action'=>'index'));
		}
		
		if (!$this->_exists($id, $this, "Anomalia non trovata"))
			$this->redirect(array('action' => 'index'));
			
		if (!empty($this->data)) {
			if ($this->Anomaly->save($this->data)) {
				$this->Session->setFlash('Anomalia aggiunta con successo', 'default', array('class' => 'flashsuccess'));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Errore nella modifica dell\'antomalia. Riprovare.', 'default', array('class' => 'flasherror'));
			}
		}
		
		if (empty($this->data)) {
			$this->data = $this->Anomaly->read(null, $id);
		}
		
		$this->set('anomalyTypes', $this->_resolveForeignKey($this->Anomaly, 'AnomalyType', array('id', 'descrizione'), 'descrizione ASC'));
		$orders = $this->Anomaly->Order->find('list');
		$this->set(compact('anomalyTypes','orders'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Anomalia non trovata', 'default', array('class' => 'flashwarning'));
			$this->redirect(array('action'=>'index'));
		}
		
		if (!$this->_exists($id, $this, "Anomalia non trovata"))
			$this->redirect(array('action' => 'index'));
			
		if ($this->Anomaly->del($id)) {
			$this->Session->setFlash('Anomalia eliminata con successo', 'default', array('class' => 'flashsuccess'));
			$this->redirect(array('action'=>'index'));
		}
	}
	
	function add($order_id=null) {
		
		if(!$order_id && empty($this->data)){
			$this->Session->setFlash("Ordine non trovato", 'default', array('class' => 'flashwarning'));
			$this->redirect("/Orders/");
		}
		 if (!empty($this->data)) {
			$this->Anomaly->create();
			
			
			if ($this->Anomaly->save($this->data)) {
				$this->Session->setFlash('La segnalazione è stata inviata con successo');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Errore nell\'invio della segnalazione.');
			}
		 }
		
		$this->set('order_id',$order_id);
		$this->set('anomalyTypes', $this->_resolveForeignKey($this->Anomaly, 'AnomalyType', array('id', 'descrizione'), 'descrizione ASC'));
	}
	
	function index() {
		$this->Anomaly->recursive = 0;
		$this->set('anomalies', $this->paginate());
		$this->set('anomalyTypes', $this->_resolveForeignKey($this->Anomaly, 'AnomalyType', array('id', 'descrizione'), 'descrizione ASC'));
	}
	
	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash('Segnalazione non trovata.');
			$this->redirect(array('action'=>'index'));
		}
		if (!$this->_exists($id, $this, "Segnalazione non trovata."))
			$this->redirect(array('action' => 'index'));
		$this->set('anomaly', $this->Anomaly->read(null, $id));
		$this->set('anomalyTypes', $this->_resolveForeignKey($this->Anomaly, 'AnomalyType', array('id', 'descrizione'), 'descrizione ASC'));
	}


}
?>
