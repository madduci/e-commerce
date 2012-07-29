<?php
class Reservation extends AppModel {

	var $name = 'Reservation';
	var $validate = array(
		'customer_id' => array('numeric', 'rule' => 'numeric', 'message' => 'Il campo non può essere vuoto'),
		'data' => array('date', 'rule' => 'date', 'message' => 'Data non valida')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Customer' => array(
			'className' => 'Customer',
			'foreignKey' => 'customer_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'Order' => array(
			'className' => 'Order',
			'foreignKey' => 'reservation_id',
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

	var $hasAndBelongsToMany = array(
		'Product' => array(
			'className' => 'OffersProduct',
			'joinTable' => 'product_reservations',
			'foreignKey' => 'reservation_id',
			'associationForeignKey' => 'offers_product_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);
	
	
}
?>