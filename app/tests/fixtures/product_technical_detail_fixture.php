<?php 
/* SVN FILE: $Id$ */
/* ProductTechnicalDetail Fixture generated on: 2009-08-26 12:06:49 : 1251281209*/

class ProductTechnicalDetailFixture extends CakeTestFixture {
	var $name = 'ProductTechnicalDetail';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'detail_type_id' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'length' => 3, 'key' => 'index'),
		'valore_dettaglio' => array('type'=>'string', 'null' => false, 'default' => NULL),
		'product_id' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'detail_type_id_idxfk' => array('column' => 'detail_type_id', 'unique' => 0), 'product_id_idxfk' => array('column' => 'product_id', 'unique' => 0))
	);
	var $records = array(array(
		'id'  => 1,
		'detail_type_id'  => 1,
		'valore_dettaglio'  => 'Lorem ipsum dolor sit amet',
		'product_id'  => 1
	));
}
?>