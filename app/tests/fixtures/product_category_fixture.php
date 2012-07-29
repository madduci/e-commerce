<?php 
/* SVN FILE: $Id$ */
/* ProductCategory Fixture generated on: 2009-08-26 13:53:49 : 1251287629*/

class ProductCategoryFixture extends CakeTestFixture {
	var $name = 'ProductCategory';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 10, 'key' => 'primary'),
		'parent_id' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'length' => 6),
		'lft' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 6),
		'rght' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 6),
		'descrizione' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 100, 'key' => 'unique'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'descrizione' => array('column' => 'descrizione', 'unique' => 1), 'product_categories_descrizione_idx' => array('column' => 'descrizione', 'unique' => 0))
	);
	var $records = array(array(
		'id'  => 1,
		'parent_id'  => 0,
		'lft'  => 1,
		'rght'  => 2,
		'name'  => 'Lorem ipsum dolor sit amet'
	));
}
?>