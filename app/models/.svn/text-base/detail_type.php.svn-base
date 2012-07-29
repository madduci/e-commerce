<?php
class DetailType extends AppModel {
	var $name = 'DetailType';
	var $validate = array(
		'descrizione' => array(
			'notempty' => array('rule' => 'notempty', 'message' => 'Il campo non può essere vuoto'),
			'isUnique' => array('rule' => 'isUnique', 'message' => 'Tipologia di dettaglio tecnico esistente')
			)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'ProductTechnicalDetail' => array(
			'className' => 'ProductTechnicalDetail',
			'foreignKey' => 'detail_type_id',
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