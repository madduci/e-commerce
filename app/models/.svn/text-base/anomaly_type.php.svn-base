<?php
class AnomalyType extends AppModel {

	var $name = 'AnomalyType';
	var $validate = array(
		'descrizione' => array(
			'notempty' => array('rule' => 'notempty', 'message' => 'Il campo non può essere vuoto'),
			'isUnique' => array('rule' => 'isUnique', 'message' => 'Tipologia anomalia esistente')
			)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'Anomaly' => array(
			'className' => 'Anomaly',
			'foreignKey' => 'anomaly_type_id',
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