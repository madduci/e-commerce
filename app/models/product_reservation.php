<?php
class ProductReservation extends AppModel {

	var $name = 'ProductReservation';
	var $validate = array(
		'reservation_id' => array('numeric'),
		'offers_product_id' => array('numeric')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Reservation' => array(
			'className' => 'Reservation',
			'foreignKey' => 'reservation_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'OffersProduct' => array(
			'className' => 'OffersProduct',
			'foreignKey' => 'offers_product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	
	
}
?>