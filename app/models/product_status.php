<?php
class ProductStatus extends AppModel {

	var $name = 'ProductStatus';
	var $validate = array(
		'descrizione' => array(
			'notempty' => array('rule' => 'notempty', 'message' => 'Il campo non può essere vuoto'),
			'isUnique' => array('rule' => 'isUnique', 'message' => 'Stato Prodotto esistente')
			)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'product_status_id',
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