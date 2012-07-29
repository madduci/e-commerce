<?php
class OrdersController extends AppController {
	var $name = 'Orders';
	var $helpers = array('Html', 'Form');
	var $paginate = array('Order' => array('order' => array('data_ordine' => 'desc')));

	function admin_index() {
		$this->Order->recursive = 0;
		$conditions = array();
		
		if (!isset($_SESSION['admin_order_search']))
			$_SESSION['admin_order_search'] = ' ';

		if (isset($this->params['named']['search'])) {
			$_SESSION['admin_order_search'] = $this->params['named']['search'];
		} else {
			if (!isset($this->params['named']['page']))
				$_SESSION['admin_order_search'] = ' ';
		}
		
		if ($_SESSION['admin_order_search'] != ' ')
			$conditions = array('1' => "1 AND Order.id = ".addslashes($_SESSION['admin_order_search']));
	
		$this->set('orders', $this->paginate('Order', $conditions));
	}
	
	function admin_view() { }

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Ordine non trovato', 'default', array('class' => 'flashwarning'));
			$this->redirect(array('action'=>'index'));
		}
		
		if (!$this->_exists($id, $this, "Ordine non trovato"))
			$this->redirect(array('action' => 'index'));
			 
		if (!empty($this->data)) {
			if ($this->Order->save($this->data)) {
				$this->Session->setFlash('Ordine modificato con successo', 'default', array('class' => 'flashsuccess'));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash("Errore nalla modifica dell'ordine. Riprovare.", 'default', array('class' => 'flasherror'));
			}
		}
		
		if (empty($this->data)) {
			$this->data = $this->Order->read(null, $id);
		}

		$this->set('order', $this->Order->findById($id));
		$this->set('orderProducts', $this->Order->OrderProduct->findAllByOrderId($id));
		
		$orderStatuses = $this->_resolveForeignKey($this->Order, 'OrderStatus', array('id', 'stato'), 'stato ASC');
		$this->set(compact('orderStatuses'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash("Ordine non trovato", 'default', array('class' => 'flashwarning'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!$this->_exists($id, $this, "Ordine non trovato"))
			$this->redirect(array('action' => 'index'));
			
		if ($this->Order->del($id)) {
			$this->Session->setFlash("Ordine eliminato con successo", 'default', array('class' => 'flashsuccess'));
			$this->redirect(array('action'=>'index'));
		}
	}
	
	function view($id = null) {
		$this->set('customers', $this->_resolveForeignKey($this->Order, 'Customer', array('id', 'ragione_sociale'), 'ragione_sociale ASC'));
		$this->set('paymentMethods', $this->_resolveForeignKey($this->Order, 'PaymentMethod', array('id', 'metodo'), 'metodo ASC'));
		$this->set('shippingMethods', $this->_resolveForeignKey($this->Order, 'ShippingMethod', array('id', 'descrizione'), 'descrizione ASC'));
		
		if (!$id) {
			$this->redirect(array('action'=>'index'));
		}
		
		$this->set('order', $this->Order->read(null, $id));
		
	}

	function add() {
		
		$this->set('customers', $this->_resolveForeignKey($this->Order, 'Customer', array('id', 'ragione_sociale'), 'ragione_sociale ASC'));
		$this->set('paymentMethods', $this->_resolveForeignKey($this->Order, 'PaymentMethod', array('id', 'metodo'), 'metodo ASC'));
		$this->set('shippingMethods', $this->_resolveForeignKey($this->Order, 'ShippingMethod', array('id', 'descrizione'), 'descrizione ASC'));
		
		$customer_id=$_SESSION['Auth']['Account']['id'];
		
		$custom=$this->Order->Customer->findByAccountId($customer_id);
		if(!empty($custom['Customer']['discount_code_id'])){
			
			$discount=$this->Order->Customer->DiscountCode->findById($custom['Customer']['discount_code_id']);
			$discount=$discount['DiscountCode']['codice'];
			}
		else{
			$discount=0;
		}
		$this->Session->write('DiscountCode',$discount);
		
		if(!isset($_SESSION['CodicePromozione'])){
				
				if (!empty($this->data)) {
					
					$temp=$this->data;
					
					$temp['Order']['customer_id']=$custom['Customer']['id'];
					$temp['Order']['data_ordine']=date('Y-m-d');
					$temp['Order']['tracking']="N/A";
					$temp['Order']['order_status_id']="1"; //in lavorazione
					$temp['Order']['totale']=$_SESSION['TotCart'];
					$temp['Order']['reservation_id']=0;
					
					$isOk=$this->__checkQuantity();
					if(empty($isOk)){
						
						
					$this->Order->create();
						
					//non salvo l'ordine sul Database: lo scrivo sulla var di sessione
					//poichè potrebbe verificarsi un errore sulla conferma dei prodotti		
							$this->Session->write('Order',$temp);
						
							$this->redirect('/OrderProducts/review');
							
					}
					else {
						$this->redirect(array('action'=>'error',$isOk));
					}
				}
			
			}
			else{
				$codpromo=$this->Session->read('CodicePromozione');
				$reserve=$this->Order->Reservation->findByCodice($codpromo);
				
				if (!empty($this->data)) {
					
					$temp=$this->data;
					
					$temp['Order']['customer_id']=$custom['Customer']['id'];
					$temp['Order']['data_ordine']=date('Y-m-d');
					$temp['Order']['tracking']="N/A";
					$temp['Order']['order_status_id']="1";
					$temp['Order']['totale']=$_SESSION['TotCart'];
					$temp['Order']['reservation_id']=$reserve['Reservation']['id'];
										
					$isOk=$this->__checkQuantityReserve();
					
					if(empty($isOk)){
											
					$this->Order->create();
						
					//non salvo l'ordine sul Database: lo scrivo sulla var di sessione
					//poichè potrebbe verificarsi un errore sulla conferma dei prodotti		
							$this->Session->write('Order',$temp);
						
							$this->redirect('/OrderProducts/review');
							
					}
					else {
						$this->redirect(array('action'=>'error',$isOk));
					}
				}
				
				
			}
			$customers2 = $this->Order->Customer->find('list');
			$paymentMethods2 = $this->Order->PaymentMethod->find('list');
			$shippingMethods2= $this->Order->ShippingMethod->find('list');
			$orderStatuses = $this->Order->OrderStatus->find('list');
			
		}
	
	function error($errors){
		//visualizza la lista di prodotti che hanno generato errore
	}
	
	function success(){
		$reserve=$this->Session->read('Reservation');
		$this->Order->Reservation->del($reserve[0]['Reservation']['id']);
	}
	
	function fail() {
		//la vista visualizza una pagina di errore
	}
	
	function index() {
		$account=$_SESSION['Customer'];
		$this->Order->recursive = 0;
		$this->set('orders', $this->paginate('Order', array('Order.customer_id' => $account['Customer']['id'])));
	}
	
	function __checkQuantity(){
		$carts=$this->Session->read('Cart');
		$errors=array();
		$i=0;
		foreach($carts as $cart):
		
			$product=$this->Order->OrderProduct->Product->findById($cart['id']);
			
			if($product['Product']['qta_disponibile']<$cart['quantita'])
				$errors[$i]=1;
			$i++;
			
		endforeach;
		
		return $errors;
	}
	
	function __checkQuantityReserve(){
		
		$carts=$this->Session->read('Reservation');
		$errors=array();
		$i=0;
		foreach($carts as $cart):
		
			$product=$this->Order->OrderProduct->Product->findById($cart['Product']['id']);
			
			if($product['Product']['qta_disponibile']<$cart['ProductReservation']['quantita'])
				$errors[$i]=1;
			$i++;
			
		endforeach;
		
		return $errors;
	}

}
?>
