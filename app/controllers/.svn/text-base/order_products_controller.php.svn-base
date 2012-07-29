<?php
class OrderProductsController extends AppController {

	var $name = 'OrderProducts';
	var $helpers = array('Html', 'Form');
	var $components=array('Mailer');
	var $cart=array();
	var $error=array();
	
	function review(){
	
	if(!isset($_SESSION['Reservation'])){
		$cartprod=$this->Session->read('Cart');
		$this->set('carts',$cartprod);
		$shipping=$this->Session->read('Order');
		$incremento=0;
		$peso=0;
		$shipping=$this->OrderProduct->Order->ShippingMethod->find('all',array('conditions'=>array('id'=>$shipping['Order']['shipping_method_id'])));	
		if(!empty($shipping))
			{
				$shipping=$shipping[0]['ShippingMethod'];
				
				
				foreach($cartprod as $cart){
				
					$peso=$peso+$cart['peso'];
					
				}
				if($peso>50)
					$incremento=$peso*0.15;
					
				$shipping['costo']=$shipping['costo']+$incremento;
				$this->Session->write('ShippingMethod',$shipping);
				
			}
		
	}
	else{
		$cartprod=$this->Session->read('Reservation');
		
		$this->set('carts',$cartprod);
		$shipping=$this->Session->read('Order');
		$peso=0;
		$incremento=0;
		$shipping=$this->OrderProduct->Order->ShippingMethod->find('all',array('conditions'=>array('id'=>$shipping['Order']['shipping_method_id'])));	
		
		if(!empty($shipping)){
				$shipping=$shipping[0]['ShippingMethod'];
				
				
				foreach($cartprod as $cart){
				
					$peso=$peso+$cart['Product']['peso'];
					
				}
				if($peso>50)
					$incremento=$peso*0.15;
					
				$shipping['costo']=$shipping['costo']+$incremento;
				$this->Session->write('ShippingMethod',$shipping);
				
		}
		
		}
	}
	
	function add(){
		 // debug($_SESSION);
		 // 		 exit(0);
		$product=array();
		$reserve=array();
		
		if(!isset($_SESSION['Reservation'])){
			
			$carts=$this->Session->read('Cart');
			$order=$this->Session->read('Order');
			$discount=(float)$this->Session->read('DiscountCode');
			$reservation=$order['Order']['reservation_id'];
			
			foreach($carts as $cart):
				
				$product=$this->OrderProduct->Product->findById($cart['id']);
				
				$product['Product']['qta_disponibile']=$product['Product']['qta_disponibile']-$cart['quantita'];
				if($product['Product']['qta_disponibile']>=0){ //ulteriore verifica
						
					
				}
				else
				{
					$this->error[]=$product['Product'];
					$this->Session->write('Error',$this->error);
			
				}
			endforeach;
			
			if(empty($this->error)){
					
					$orderProduct = array();
					$costosped = (float)$_SESSION['ShippingMethod'];
					$pagamento = $this->OrderProduct->Order->PaymentMethod->read(null, $_SESSION['Order']['Order']['shipping_method_id']);
					
					if($discount==0)
						$order['Order']['totale']=$order['Order']['totale']+$costosped;
					else
						$order['Order']['totale']=($order['Order']['totale']*(100-$discount))/100+$costosped;
					
					if ($this->OrderProduct->Order->save($order))
							{
								$record=$this->OrderProduct->Order->getLastInsertId();
								$this->Session->write('NumeroOrdine',$record);
								$orderProduct['order_id']=$record;
								
							}
					else
							$this->redirect('/Orders/fail');
					
					
					foreach($carts as $cart):
						
						$orderProduct['product_id']=$cart['id'];
						$orderProduct['qta']=$cart['quantita'];
						$orderProduct['totale']=$cart['prezzo'];
						$unitario=$cart['prezzo']/$cart['quantita'];
						$orderProduct['unitario']=$unitario;
						
						
						$this->OrderProduct->save($orderProduct);
						
					endforeach;
					
					$this->OrderProduct->Product->save($product['Product']);
				
					$email=$_SESSION['Auth']['Account']['email'];
					$name=$_SESSION['Auth']['Account']['username'];
					$oggetto = "Conferma d'ordine e fattura acquisto basket srl";
					
					$message = "Gentile cliente,\n\n";

					$message .= "Grazie per aver scelto i nostri prodotti.\n";
					$message .= "Ecco i particolari del suo ordine.\n";
					$message .= "-----------------------------------------\n";
					$message .= "Ordine/Fattura Numero: ".$orderProduct['order_id']."\n";
					$message .= "Data richiesta: ".date('d/m/Y')."\n";
					$message .= "Dettaglio Ordine:\n\n";
					$message .= "Prodotti\n";
					$message .= "-----------------------------------------\n";

					foreach($carts as $cart)
						$message .= $cart['quantita']." x ".$cart['codice_prodotto']." ".$cart['nome']." = ".$cart['prezzo']." EUR\n";

					$message .= "-----------------------------------------\n";
					$message .= "Totale: ".$_SESSION['TotCart']." EUR\n\n";

					$message .= "Indirizzo di fatturazione\n";
					$message .= "-----------------------------------------\n";
					$message .= $_SESSION['Customer']['Customer']['ragione_sociale']."\n";
					$message .= $_SESSION['Customer']['Customer']['indirizzo']."\n";
					$message .= $_SESSION['Customer']['Customer']['cap']." ".$_SESSION['Customer']['Customer']['citta']." ".$_SESSION['Customer']['Customer']['provincia']."\n\n";
					
					$message .= "Modalità di spedizione\n";
					$message .= "-----------------------------------------\n";
					$message .= $_SESSION['ShippingMethod']['descrizione']."\n";
					
					$message .= "Modalità di pagamento\n";
					$message .= "-----------------------------------------\n";
					$message .= $pagamento['PaymentMethod']['metodo']."\n";
					
					$this->Mailer->subject = $oggetto;
					$this->Mailer->to = $email;
					$this->set('name',$name);
					$this->set('email', $email);
					$this->set('message', $message);
					$this->Mailer->send($message);
						
					
					
			}
			else{
			
				$this->redirect(array('action'=>'warning'));
				
			}
		}
		else{
			
			$carts=$this->Session->read('Reservation');
			$order=$this->Session->read('Order');
			$discount=(float)$this->Session->read('DiscountCode');
			$customer=$this->Session->read('Customer');
			
			
			foreach($carts as $cart):
				
				$product=$this->OrderProduct->Product->findById($cart['Product']['id']);
				
				$product['Product']['qta_disponibile']=$product['Product']['qta_disponibile']-$cart['ProductReservation']['quantita'];
				if($product['Product']['qta_disponibile']>=0){ //ulteriore verifica
					
				}
				else
				{
					$this->error[]=$product['Product'];
					$this->Session->write('Error',$this->error);
			
				}
			endforeach;
			
			if(empty($this->error)){
				
					$orderProduct=array();
					$costosped=(float)$_SESSION['ShippingMethod'];
					
					if($discount==0)
						$order['Order']['totale']=$order['Order']['totale']+$costosped;
					else
						$order['Order']['totale']=($order['Order']['totale']*(100-$discount))/100+$costosped;
					if ($this->OrderProduct->Order->save($order))
							{
								$record=$this->OrderProduct->Order->getLastInsertId();
								$this->Session->write('NumeroOrdine',$record);
								$orderProduct['order_id']=$record;
								
							}
					else
							$this->redirect('/Orders/fail');
					
					
					foreach($carts as $cart):
						
						$orderProduct['product_id']=$cart['Product']['id'];
						$orderProduct['qta']=$cart['ProductReservation']['quantita'];
						$orderProduct['totale']=$cart['ProductReservation']['prezzo'];
						$unitario=$cart['ProductReservation']['prezzo']/$cart['ProductReservation']['quantita'];
						$orderProduct['unitario']=$unitario;
						
						$this->OrderProduct->save($orderProduct);
						
					endforeach;
					
					$this->OrderProduct->Product->save($product['Product']);
			}
			else{
			
				$this->redirect(array('action'=>'warning'));
				
			}
			
		}
		
		unset($orderProduct);
		unset($_SESSION['Cart']);
		unset($_SESSION['TotCart']);
		
		
		$this->redirect('/Orders/success');
	}
	
	function index($id=null) {
		if(!isset($id))
		{
			$this->Session->setFlash("<h2 style=\"margin 40px 0 0 0\">Ordine non trovato</h2>");
			$this->redirect("/Orders/index");
		}
	
		$products=$this->OrderProduct->findAllByOrderId($id);
	
		
		$this->set('orderProducts', $products);
	}

	function warning(){
		$this->error=$this->Session->read('Error');
		
		$this->set('errors',$this->error);
		
		
	}
	
	
}
?>
