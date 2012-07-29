<?php
class OrderStatus extends AppModel {

	var $name = 'OrderStatus';
	var $validate = array(
		'stato' => array('notempty')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'Order' => array(
			'className' => 'Order',
			'foreignKey' => 'order_status_id',
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