<?php
class ProductTechnicalDetail extends AppModel {

	var $name = 'ProductTechnicalDetail';
	var $validate = array(
		'valore_dettaglio' => array('notempty')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'DetailType' => array(
			'className' => 'DetailType',
			'foreignKey' => 'detail_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>