<?php
class ProductReservationsController extends AppController {
	var $name = 'ProductReservations';
	var $helpers = array('Html', 'Form');
	var $components=array('Mailer');

	function index() {
		$user=$this->Session->read('Auth'); //l'utente deve esser loggato per poter visualizzare il carrello!
		if(!empty($user)){
			
			$this->ProductReservation->bindModel(array('hasOne'=>array('Product' =>array(
			 		'foreignKey'=> false, 
					'type'=>'INNER','conditions'=>array('OffersProduct.product_id = Product.id')))));
			$promo=$this->Session->read('CodicePromozione');
			$reservations=$this->ProductReservation->Reservation->findByCodice($_SESSION['CodicePromozione']);
			$products=$this->ProductReservation->findAllByReservationId($reservations['Reservation']['id']);
			$this->set('products',$products);
			$this->Session->write('Reservation',$products);
						
		}
	}
	
	function save() {
		$reservation=$this->Session->read('Reservation');
		$productreservation=array();
		$carts=$this->Session->read('CartOffers');
		if(!empty($reservation)){
			
			if($this->ProductReservation->Reservation->save($reservation)){
			
				$this->ProductReservation->create();
				foreach($carts as $cart){
					
					$productreservation['ProductReservation']['reservation_id']=$this->ProductReservation->Reservation->getLastInsertId();
					$productreservation['ProductReservation']['offers_product_id']=$cart['id'];
					$productreservation['ProductReservation']['quantita']=$cart['quantita'];
					$productreservation['ProductReservation']['prezzo']=$cart['prezzo'];
					}
			
				if($this->ProductReservation->save($productreservation)){
					
					$this->Session->write('CodicePrenotazione',$reservation['Reservation']['codice']);
					$email=$_SESSION['Auth']['Account']['email'];
					$name=$_SESSION['Auth']['Account']['username'];
					$messaggio="La prenotazione è stata effettuata con successo. Il tuo codice di prenotazione è: 
					".$reservation['Reservation']['codice'].". Ricorda che hai 72 ore dall'inizio della promozione per acquistare i prodotti da te prenotati";
					$this->Mailer->to = $email;
	
					$this->Mailer->subject = __("Conferma Prenotazione", true);
	
					$this->set('name',$name);
			  		$this->set('email', $email);
			    	$this->set('message', $messaggio);
					$this->Mailer->send($messaggio);
					$this->redirect('/Reservations/success');
				}
				else
					$this->redirect('/Reservations/error');
				
			}
			
			else
			$this->redirect('/Reservations/error');
			
		}
		else
			$this->redirect('/Reservations/error');
			
		
		
		
	}
	function success(){
		
	}

}
?>