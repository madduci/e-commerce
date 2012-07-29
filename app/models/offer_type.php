<?php
class OfferType extends AppModel {

	var $name = 'OfferType';
	var $validate = array(
		'descrizione' => array('notempty')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'Offer' => array(
			'className' => 'Offer',
			'foreignKey' => 'offer_type_id',
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