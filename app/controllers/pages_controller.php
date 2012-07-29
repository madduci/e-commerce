<?php
class PagesController extends AppController {
 	var $name = 'Pages';
	var $uses = array();
	
	function admin_index() {
		if (isset($_SESSION['Auth']['Account'])) {
			if ($_SESSION['Auth']['Account']['account_type_id'] == 3)
				$this->Session->redirect("/");
		}
		$ordini = ClassRegistry::init("Order");
		$account = ClassRegistry::init("Account");
		
		$this->set('ordini', $ordini->query('SELECT * FROM orders, customers WHERE orders.customer_id = customers.id AND order_status_id = 1 ORDER BY orders.data_ordine ASC'));
		$this->set('account', $ordini->query('SELECT * FROM customers, accounts WHERE customers.account_id = accounts.id AND accounts.attivo = 0 ORDER BY customers.id ASC'));
		$this->set('prenotazioni', $ordini->query('SELECT * FROM reservations, customers WHERE customers.id = reservations.customer_id ORDER BY data DESC'));
		$this->set('prodotti', $ordini->query('SELECT * FROM products WHERE qta_disponibile <= 500 order by qta_disponibile ASC'));
	}
}
?>