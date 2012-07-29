<?php
class CartsController extends AppController {

	var $name = 'Carts';
	var $helpers = array('Html', 'Form'); 
	var $uses=array('Product', 'Order', 'Customer','OffersProduct');
	var $id_prod;
	var $cart=array();
	var $session=array();
	var $id_offprod;

	
	function beforeFilter(){
		parent::beforeFilter();
		
		if (!empty($this->params['ajax'])) {
			$this->layout = 'empty';
		}
	}

	function reservation(){
		
		$user=$this->Session->read('Auth'); //l'utente deve esser loggato per poter visualizzare il carrello!
		
		if(!empty($user)){
			
			$user=$user['Account'];
			$this->set('user',$user);
			$customer=$this->Customer->findByAccountId($user['id']);
			
			$this->set('customer',$customer);
			$cartprod=$this->Session->read('CartOffers');
	
			$this->set('carts',$cartprod);
			
		}
			
		
	}
	
	function index(){		
		
		$user=$this->Session->read('Auth'); //l'utente deve esser loggato per poter visualizzare il carrello!
		
		if(!empty($user)){
			
			$user=$user['Account'];
			$this->set('user',$user);
			$customer=$this->Customer->findByAccountId($user['id']);
			
			$this->set('customer',$customer);
			$cartprod=$this->Session->read('Cart');
			$this->set('carts',$cartprod);
			
		}
			
	}
	function update(){
		
		if($this->params["isAjax"]==1)
			$this->layout="empty";
			
			$this->cart=$this->Session->read('Cart');
			
			$upds=$this->data;
			if(!empty($upds))
			foreach($upds as $key=>$upd){
				
				if($upd['quantita'][0]>=$this->cart[$key]['qta_minima_ordinabile'] && $upd['quantita'][0]>0)
					
						$this->add($key,$upd['quantita'][0],1);
					
				else{
					$this->Session->setFlash('<h2 style="margin:30px 0 0 0;">Quantit&agrave; inserita non valida</h2>');
					
					$this->delete((String)$key);
					}
					
			}
			
			if($this->params["isAjax"]!=1)
				$this->redirect(array('action'=>'index'));
		
		
	}	
	
	function addoffer($item,$quant){
		
		
		if($this->params["isAjax"]==1)
			$this->layout="empty";
			

		if (!isset($item)){		
		
			$this->Session->setFlash('Azione non consentita');
			if($this->params["isAjax"]==1)
			echo "0";
			
		}
		$var=$this->Session->read('CartOffers');
			if(empty($var))
				$this->cart=array();
			else
					{
						$this->cart=$this->Session->read('CartOffers');
					}
		
		
		$this->id_offprod=$this->OffersProduct->findById($item);
		$this->id_prod=$this->Product->findById($this->id_offprod['OffersProduct']['product_id']);
		
		if(isset($this->id_prod) && isset($this->id_offprod))
			if(isset($this->cart[$item])){
				if($quant <= $this->id_prod['Product']['qta_disponibile'])
				
					{
						
						$this->cart[$item]=$this->cart;
						$this->__addOfferToCart($quant);
						if($this->params["isAjax"]==1)
							echo "1";				
						
					}
					else {
						
						
						$this->Session->setFlash('Azione non consentita');
						
						if($this->params["isAjax"]==1)
							echo "0";
					}
		
				} 
				else {
					
						if($quant <= $this->id_prod['Product']['qta_disponibile'])
				
						{
						
							$this->cart[$item]=$this->cart;
							$this->__addOfferToCart($quant);
							if($this->params["isAjax"]==1)
								echo "1";
						
						}
						else {
								
								$this->Session->setFlash('Azione non consentita');
								if($this->params["isAjax"]==1)
									echo "0";
							}
		
						
					}
			
					
		
	}
		
	
	
	function add($item,$quant,$upd=0){
		
		if($this->params["isAjax"]==1)
			$this->layout="empty";
			

		if (!isset($item)){		
		
			$this->Session->setFlash('Azione non consentita');
			if($this->params["isAjax"]==1)
			echo "0";
		}
		$var=$this->Session->read('Cart');
			if(empty($var))
				$this->cart=array();
			else
					{
						$this->cart=$this->Session->read('Cart');
					}
		
		$this->id_prod=$this->Product->findById($item);
		
		if(isset($this->id_prod))
			if(isset($this->cart[$item])){
				if($quant <= $this->id_prod['Product']['qta_disponibile'])
				
					{
						
						$this->cart[$item]=$this->cart;
						$this->__addToCart(false,$quant);
						if($this->params["isAjax"]==1)
							echo "1";				
						
						
					}
					else {
						
						
						$this->Session->setFlash('Azione non consentita');
						
						if($this->params["isAjax"]==1)
							echo "0";
					}
		
				} 
				else {
					
						if($quant <= $this->id_prod['Product']['qta_disponibile'])
				
						{
						
							$this->cart[$item]=$this->cart;
							$this->__addToCart(true,$quant);
							if($this->params["isAjax"]==1)
								echo "1";
						
						}
						else {
								
								$this->Session->setFlash('Azione non consentita');
								if($this->params["isAjax"]==1)
									echo "0";
							}
		
						
					}
				if($this->params["isAjax"]!=1)	
					if($upd<1)
						$this->redirect(array('action'=>'index'));
					
		
	}
	function delete($item) {
		
      	if (!isset($item)){		
		
			$this->Session->setFlash('Azione non consentita');
			$this->redirect(array('action'=>'index'));
		}
		
		$var=$this->Session->read('Cart');
			if(empty($var))
				$this->cart=array();
			else
					{
						
						$this->cart=$this->Session->read('Cart');
						$this->cart[$item]=$this->cart;
					}
		
		$this->id_prod=$this->Product->findById($item);
		
		$this->__deleteFromCart();
		$this->redirect(array('action'=>'index'));
    }
	
		
	 function __getCart() {
        return $this->lists;
    }
	
	function __addToCart($new,$quant) {
		
		
		
		$item=$this->id_prod['Product']['id'];
		
		if($new==false) {
		
			$this->cart[$item][$item]['id']=$_SESSION['Cart'][$item]['id'];
			$this->cart[$item][$item]['codice_prodotto']=$_SESSION['Cart'][$item]['codice_prodotto'];
			$this->cart[$item][$item]['quantita']=$quant;
			$this->cart[$item][$item]['nome']=$_SESSION['Cart'][$item]['nome'];
			$this->cart[$item][$item]['qta_incremento']=$_SESSION['Cart'][$item]['qta_incremento'];
			$this->cart[$item][$item]['qta_minima_ordinabile']=$_SESSION['Cart'][$item]['qta_minima_ordinabile'];
			$this->cart[$item][$item]['qta_disponibile']=$_SESSION['Cart'][$item]['qta_disponibile'];
			$this->cart[$item][$item]['prezzo']=$this->cart[$item][$item]['quantita']*$this->id_prod['Product']['prezzo'];
			$this->cart[$item][$item]['peso']=$_SESSION['Cart'][$item]['peso']*$this->id_prod['Product']['prezzo'];
			$this->Session->write('Cart',$this->cart[$item]);
			
		
		}
		else{
			$this->cart[$item][$item]['id']=$this->id_prod['Product']['id'];
			$this->cart[$item][$item]['codice_prodotto']=$this->id_prod['Product']['codice_prodotto'];
			$this->cart[$item][$item]['quantita']=$quant;
			$this->cart[$item][$item]['nome']=$this->id_prod['Product']['nome'];
			$this->cart[$item][$item]['qta_incremento']=$this->id_prod['Product']['qta_incremento'];
			$this->cart[$item][$item]['qta_minima_ordinabile']=$this->id_prod['Product']['qta_minima_ordinabile'];
			$this->cart[$item][$item]['qta_disponibile']=$this->id_prod['Product']['qta_disponibile'];
			$this->cart[$item][$item]['prezzo']=$this->id_prod['Product']['prezzo']*$this->cart[$item][$item]['quantita'];	
			$this->cart[$item][$item]['peso']=$this->id_prod['Product']['peso']*$this->cart[$item][$item]['quantita'];
			$this->Session->write('Cart',$this->cart[$item]);		
		}
    }
	
	function __addOfferToCart($quant) {
		
		
		
		$item=$this->id_offprod['OffersProduct']['id'];
		
			$this->cart[$item][$item]['id']=$this->id_offprod['OffersProduct']['id'];
			$this->cart[$item][$item]['codice_prodotto']=$this->id_prod['Product']['codice_prodotto'];
			$this->cart[$item][$item]['quantita']=$quant;
			$this->cart[$item][$item]['nome']=$this->id_prod['Product']['nome'];
			$this->cart[$item][$item]['qta_incremento']=$this->id_prod['Product']['qta_incremento'];
			$this->cart[$item][$item]['qta_minima_ordinabile']=$this->id_prod['Product']['qta_minima_ordinabile'];
			$this->cart[$item][$item]['qta_disponibile']=$this->id_prod['Product']['qta_disponibile'];
			$this->cart[$item][$item]['prezzo']=$this->id_offprod['OffersProduct']['prezzo']*$this->cart[$item][$item]['quantita'];	
			$this->cart[$item][$item]['peso']=$this->id_offprod['Product']['peso']*$this->cart[$item][$item]['quantita'];	
			
			$this->Session->write('CartOffers',$this->cart[$item]);		
    }

    function __deleteFromCart() {
    	    $item=$this->id_prod['Product']['id'];
        	unset($this->cart[$item][$item]);
			$this->Session->write('Cart',$this->cart[$item]);
    }
	

	
	function free(){
		$this->cart=array();
		$this->Session->write('Cart',$this->cart);
		$this->redirect(array('action'=>'index'));
	}
	
	function freereserve(){
		$this->cart=array();
		$this->Session->write('CartOffers',$this->cart);
		$this->redirect(array('action'=>'reservation'));
	}

}

 ?>