<?php
class ShippingMethod extends AppModel {

	var $name = 'ShippingMethod';
	var $validate = array(
		'descrizione' => array('notempty', 'rule' => 'notempty', 'message' => 'Il campo non può essere vuoto'),
		'costo' => array('numeric', 'rule' => 'numeric', 'message' => 'Costo spedizione non valido')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'Order' => array(
			'className' => 'Order',
			'foreignKey' => 'shipping_method_id',
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

}
?>