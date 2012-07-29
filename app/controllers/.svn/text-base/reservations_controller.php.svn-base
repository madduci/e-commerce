<?php
class ReservationsController extends AppController {

	var $name = 'Reservations';
	var $helpers = array('Html', 'Form');

	function admin_index() {
		$this->Reservation->recursive = 0;
		$this->set('reservations', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash("Prenotazione non trovata", 'default', array('class' => 'flashwarning'));
			$this->redirect(array('action'=>'index'));
		}
		
		if (!$this->_exists($id, $this, "Prenotazione non trovata"))
			$this->redirect(array('action' => 'index'));
		
		$this->Reservation->ProductReservation->bindModel(array('hasOne'=>array('Product' =>array(
			'foreignKey'=> false,
			'type'=>'INNER','conditions'=>array('OffersProduct.product_id = Product.id')))));
				
		$this->set('reservation', $this->Reservation->read(null, $id));
		$this->set('reservationProducts', $this->Reservation->ProductReservation->findAllByReservationId($id));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Prenotazione non trovata', 'default', array('class' => 'flashwarning'));
			$this->redirect(array('action'=>'index'));
		}
		
		if (!$this->_exists($id, $this, "Prenotazione non trovata"))
			$this->redirect(array('action' => 'index'));
			
		if ($this->Reservation->del($id)) {
			$this->Session->setFlash('Prenotazione eliminata con successo', 'default', array('class' => 'flashsuccess'));
			$this->redirect(array('action' => 'index'));
		}
	}
	
	function index(){
		
		$user=$this->Session->read('Auth'); //l'utente deve esser loggato per poter visualizzare il carrello!
		if(!empty($user)){
			
			if(!empty($this->data)){
				$this->Session->write('CodicePromozione',$this->data['Reservation']['codice']);
				$this->redirect('/ProductReservations/index');
			}
		}
		
		else{
			$this->Session->setFlash('<h2 style="margin:20px 0 0 0;">Non hai effettuato il login</h2>');
			$this->redirect('/Offers/index');
		}
			
	}
	
	function add(){
		$user=$this->Session->read('Auth'); //l'utente deve esser loggato per poter visualizzare il carrello!
		if(!empty($user)){
			$user=$user['Account'];
			$customer=$this->Reservation->Customer->findByAccountId($user['id']);
			$cartprod=$this->Session->read('CartOffers');
			
			if(!empty($cartprod)){
				$this->set('carts',$cartprod);
				$reservation['Reservation']['customer_id']=$customer['Customer']['id'];
				$reservation['Reservation']['data']=date('Y-m-d');
				$reservation['Reservation']['codice']=$this->__gencode();
				
				
				$this->Reservation->create();
				
				$this->Session->write('Reservation',$reservation);
				
				//$this->redirect('/ProductReservations/save');
			}
			else
				$this->Session->setFlash('<h2 style="margin:30px 0 0 0;">Il tuo carrello &egrave; vuoto</h2>');
		
		}
		
		else 
			$this->Session->setFlash('<h2 style="margin:30px 0 0 0;">Non hai effettuato il login.</h2>');
		
	}
	
	function __gencode(){
		
		# Lunghezza della password da generare
				$pwdLength = 10;
				# Elenco da cui "pescare" i caratteri che comporranno la password
				$pwdChars = 'abcdefghijklmnopqrstuvwxyz1234567890ABCDEFGHIJKLMNOPQRSTUVWYXZ0123456789';
				$pwdCharsLength = strlen($pwdChars);
				
				# Questa variabile conterrà la password generata
				$pseudo = "";
				for ($i = 0; $i < $pwdLength; $i++) {
					$charCheck = FALSE;
					while (!$charCheck) {
						# Estrazione di un carattere a caso
						$charPos = mt_rand(0, $pwdCharsLength - 1);
						# Verifica se il carattere è già presente
						if (strstr($pseudo, strtoupper($pwdChars{$charPos})) === FALSE) {
								if(strstr($pseudo, strtolower($pwdChars{$charPos})) === FALSE) {
									$pseudo .= $pwdChars{$charPos};
									$charCheck = TRUE;
								}
						}
					}
				
			
				}
			$this->Session->write('CodicePromozione',$pseudo);
			return $pseudo;
		
		
		
	}
	
	function error(){
	/*	unset($_SESSION['Reservation']);
		unset($_SESSION['CartOffers']);
		unset($_SESSION['CodicePromozione']);*/
	}
	
	function success(){
		unset($_SESSION['Reservation']);
		unset($_SESSION['CartOffers']);
		unset($_SESSION['CodicePromozione']);
	}
	
	function destroy(){
		$codice=$this->Session->read('CodicePromozione');
		$reservation=$this->Reservation->findByCodice($codice);
		
		if($this->Reservation->del($reservation['Reservation']['id']))
			$this->Session->setFlash('<h2 style="margin:30px 0 0 0;">Prenotazione cancellata con successo</h2>');
		else
			$this->Session->setFlash('<h2 style="margin:30px 0 0 0;">Cancellazione Fallita</h2>');
		unset($_SESSION['Reservation']);
		unset($_SESSION['CartOffers']);
		unset($_SESSION['CodicePromozione']);
	}	
}
?>