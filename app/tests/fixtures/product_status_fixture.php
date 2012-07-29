<?php 
/* SVN FILE: $Id$ */
/* ProductStatus Fixture generated on: 2009-08-26 12:06:48 : 1251281208*/

class ProductStatusFixture extends CakeTestFixture {
	var $name = 'ProductStatus';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 2, 'key' => 'primary'),
		'descrizione' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 30, 'key' => 'unique'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'descrizione' => array('column' => 'descrizione', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 1,
		'descrizione'  => 'Lorem ipsum dolor sit amet'
	));
}
?>