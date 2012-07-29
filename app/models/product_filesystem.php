<?php
class ProductFilesystem extends AppModel {

	var $name = 'ProductFilesystem';
	var $validate = array(
		'product_id' => array('numeric'),
		'filesystem_id' => array('numeric')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Filesystem' => array(
			'className' => 'Filesystem',
			'foreignKey' => 'filesystem_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>