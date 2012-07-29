<?php
class PaymentMethod extends AppModel {

	var $name = 'PaymentMethod';
	var $validate = array(
		'metodo' => array('notempty')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'Order' => array(
			'className' => 'Order',
			'foreignKey' => 'payment_method_id',
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