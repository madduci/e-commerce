<?php
class Anomaly extends AppModel {

	var $name = 'Anomaly';
	var $validate = array(
		'anomaly_type_id' => array('numeric'),
		'oggetto' => array('notempty'),
		'order_id' => array('notempty', 'numeric')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'AnomalyType' => array(
			'className' => 'AnomalyType',
			'foreignKey' => 'anomaly_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Order' => array(
			'className' => 'Order',
			'foreignKey' => 'order_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>