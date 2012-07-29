<?php
class Order extends AppModel {

	var $name = 'Order';
	var $validate = array(
		'customer_id' => array('numeric', 'rule' => 'numeric', 'message' => 'Il campo può contenere solo caratteri numerici.'),
		'data_evasione' => array('date', 'rule' => 'dateNotEmpty', 'message' => 'Data non valida'),
		'tracking' => array('alphanumeric', 'rule' => 'trackingNotEmpty', 'message' => 'Tracking non valido.'),
	);
	
	function dateNotEmpty() {
		if (empty($this->data['Order']['data_evasione'])) {
			return true;
		} else {
			return preg_match('/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[012])\/(19|20)\d\d$/i', $this->data['Order']['data_evasione']);
		}
	}
	
	function trackingNotEmpty() {
		if (!empty($this->data['Order']['data_evasione'])) {
			if (empty($this->data['Order']['tracking']))
				return false;
			else {
				return preg_match('/[a-z0-9]$/i', $this->data['Order']['tracking']);
			}
		} else {
			if (!empty($this->data['Order']['tracking'])) {
				$this->data['Order']['data_evasione'] = date('d/m/Y');
				return preg_match('/[a-z0-9]$/i', $this->data['Order']['tracking']);
			}
		}
		
		return true;
	}

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Customer' => array(
			'className' => 'Customer',
			'foreignKey' => 'customer_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'PaymentMethod' => array(
			'className' => 'PaymentMethod',
			'foreignKey' => 'payment_method_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ShippingMethod' => array(
			'className' => 'ShippingMethod',
			'foreignKey' => 'shipping_method_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'OrderStatus' => array(
			'className' => 'OrderStatus',
			'foreignKey' => 'order_status_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Reservation' => array(
			'className' => 'Reservation',
			'foreignKey' => 'reservation_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'Anomaly' => array(
			'className' => 'Anomaly',
			'foreignKey' => 'order_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'OrderProduct' => array(
			'className' => 'OrderProduct',
			'foreignKey' => 'order_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	
	function beforeSave() {
		if (!empty($this->data['Order']['data_evasione'])) {
			list($d, $m, $y) = explode('/', $this->data['Order']['data_evasione']);
			$this->data['Order']['data_evasione'] = date('Y-m-d', mktime(0, 0, 0, $m, $d, $y));
		} else {
			$this->data['Order']['data_evasione'] = null;
		}
		
		return true;
	}

}
?>