<?php
class DiscountCode extends AppModel {

	var $name = 'DiscountCode';
	var $validate = array(
		'codice' => array(
			'notempty' => array('rule' => 'notempty', 'message' => 'Il campo non può essere vuoto'), 
			'numeric' => array('rule' => 'numeric', 'message' => 'Il campo può contenere solo caratteri numerici'))
		);
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'Customer' => array(
			'className' => 'Customer',
			'foreignKey' => 'discount_code_id',
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