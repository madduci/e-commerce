<?php
class ProductCategory extends AppModel {
	var $name = 'ProductCategory';
	var $actsAs = array('Tree');
	var $validate = array('name' => array('notempty'));
	
	var $hasMany = array(
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'product_category_id',
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