<?php
class OffersProductsController extends AppController {

	var $name = 'OffersProducts';
	var $helpers = array('Html', 'Form');
	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Id Prodotto in Offerta non valido.', true));
			$this->redirect(array('action'=>'index'));
		}
		//richiamo i dettagli tecnici
		
		$this->OffersProduct->recursive = 2;
		$offersProduct=$this->OffersProduct->read(null,$id);
		$offer=$this->OffersProduct->Offer->findById($offersProduct['OffersProduct']['offer_id']);
		$this->set('offersProducts',$offersProduct);
		
		$id_product=$offersProduct['Product']['id'];
		$datain=$offer['Offer']['inizio'];

		$dataend=date('Y-m-d',strtotime("$datain - 10days"));
		
		$this->set('finepromo',$dataend);
		
		
		$details=$this->OffersProduct->Product->ProductTechnicalDetail->find('all',array('conditions' => array('product_id' => $id_product)));  //trova i dettagli tecnici (i nomi dei dettagli)
		$foto=$offersProduct['Product']['ProductFilesystem'];
		
		$this->set('foto',$foto);
		$this->set('details',$details);
	}
	
	function index(){ //mostra la vetrina offerte
		

		$this->OffersProduct->bindModel(array('hasOne'=>array('Customer' =>array(
		 		'foreignKey'=> false, 
				'type'=>'INNER', 
				'conditions'=>array('Customer.group_id = Offer.groups_id') ))));
		$query=$this->OffersProduct->find('all',array('conditions'=>array('Offer.inizio - now() > 10','Customer.account_id'=>$_SESSION['Auth']['Account']['id']), 'order'=>'RAND()','limit'=>'4')); 
		
		

		
		$this->set('offersProducts',$query);
		
	}
}
?>
