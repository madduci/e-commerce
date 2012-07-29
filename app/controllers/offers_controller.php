<?php
class OffersController extends AppController {
	var $name = 'Offers';
	var $helpers = array('Html', 'Form');
	var $paginate = array('Offer' => array('order' => 'inizio DESC'));

	function admin_index() {
		$this->Offer->recursive = 0;
		$this->set('offers', $this->paginate());
	}
	
	function admin_view() { }
	
	function admin_add() {
		if (!empty($this->data)) {
			$this->Offer->create();
			if ($this->Offer->save($this->data)) {
				$this->Session->setFlash("Offerta salvata correttamente", 'default', array('class' => 'flashsuccess'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash("Errore nell'aggiunta dell'offerta. Riprovare.", 'default', array('class' => 'flasherror'));
			}
		}

		$offerTypes = $this->_resolveForeignKey($this->Offer, 'OfferType', array('id', 'descrizione'), 'descrizione ASC');
		$groups = $this->_resolveForeignKey($this->Offer, 'Groups', array('id', 'gruppo'), 'gruppo ASC');
		$this->set(compact('offerTypes', 'groups'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Offerta non trovata', 'default', array('class' => 'flashwarning'));
			$this->redirect(array('action'=>'index'));
		}
		
		if (!$this->_exists($id, $this, "Offerta non trovata"))
			$this->redirect(array('action' => 'index'));
			
		if (!empty($this->data)) {
			if ($this->Offer->save($this->data)) {
				if (isset($this->data['OfferProduct']['edit'])) {
					foreach ($this->data['OfferProduct']['edit']['id'] as $key => $value) {
						if ($this->data['OfferProduct']['edit']['product_id'][$key] != 0) {
							$this->Offer->OffersProduct->create();
							$this->Offer->OffersProduct->set('id', $value);
							$this->Offer->OffersProduct->set('product_id', $this->data['OfferProduct']['edit']['product_id'][$key]);
							$this->Offer->OffersProduct->set('offer_id', $this->data['Offer']['id']);
							
							if (isset($this->data['OfferProduct']['edit']['prezzo']))
								$this->Offer->OffersProduct->set('prezzo', $this->data['OfferProduct']['edit']['prezzo'][$key]);

							$this->Offer->OffersProduct->save();
						}
					}
				}

				if (isset($this->data['OfferProduct']['delete'])) {
					foreach ($this->data['OfferProduct']['delete'] as $value) {
						$this->Offer->OffersProduct->del($value);
					}
				}

				if (isset($this->data['OfferProduct']['add'])) {
					foreach ($this->data['OfferProduct']['add']['product_id'] as $key => $value) {
						if ($value != 0) {
							$this->Offer->OffersProduct->create();
							$this->Offer->OffersProduct->set('product_id', $value);
							$this->Offer->OffersProduct->set('offer_id', $this->data['Offer']['id']);
							
							if (isset($this->data['OfferProduct']['add']['prezzo']))
								$this->Offer->OffersProduct->set('prezzo', (float)$this->data['OfferProduct']['add']['prezzo'][$key]);

							$this->Offer->OffersProduct->save();
						}
					}
				}
				
				$this->Session->setFlash("Offerta modificata con successo", 'default', array('class' => 'flashsuccess'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash("Errore nella modifica dell'offerta. Riprovare", 'default', array('class' => 'flasherror'));
			}
		}
	
		if (empty($this->data)) {
			$this->data = $this->Offer->read(null, $id);
		}
		
		$offerTypes = $this->_resolveForeignKey($this->Offer, 'OfferType', array('id', 'descrizione'), 'descrizione ASC');
		$groups = $this->_resolveForeignKey($this->Offer, 'Groups', array('id', 'gruppo'), 'gruppo ASC');
		$this->Offer->Product->unbindModel(array('hasMany' => array('OrderProduct', 'ProductFilesystem', 'ProductTechnicalDetail')));
		$products = $this->Offer->Product->find('all', array('order' => 'nome ASC'));
		$offerProducts = $this->Offer->OffersProduct->findAllByOfferId($id);
		$this->set(compact('offerTypes', 'groups', 'products', 'offerProducts'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Offerta non trovata', 'default', array('class' => 'flashwarning'));
			$this->redirect(array('action'=>'index'));
		}
		
		if (!$this->_exists($id, $this, "Offerta non trovata"))
			$this->redirect(array('action' => 'index'));
			
		if ($this->Offer->del($id)) {
			$this->Session->setFlash("Offerta eliminata con successo", 'default', array('class' => 'flashsuccess'));
			$this->redirect(array('action'=>'index'));
		}
	}
	
	function index(){
		$offer_id='0';
		$this->Offer->bindModel(array('hasOne'=>array('Customer' =>array(
		 		'foreignKey'=> false, 
				'type'=>'INNER', 
				'conditions'=>array('Customer.group_id = Offer.groups_id') ))));
		
		
		$query=$this->Offer->find('all',array('conditions'=>array('inizio - now() > 10', 'offer_type_id'=>'1','Customer.account_id'=>$_SESSION['Auth']['Account']['id'])));
		
		
		if(!empty($query)){		
			$offer_id=$query[0]['Offer']['id'];
		
			$this->set('Promos', $this->paginate('Offer',array('Offer.id'=>$offer_id)));
		}
					
		
		
		
		if($offer_id!='0'){
			$this->set('Customers',$query);
				
		}
		
	}
}
?>
