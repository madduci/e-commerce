<?php 
/* SVN FILE: $Id$ */
/* ShippingMethod Fixture generated on: 2009-08-26 12:06:53 : 1251281213*/

class ShippingMethodFixture extends CakeTestFixture {
	var $name = 'ShippingMethod';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'descrizione' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 64),
		'costo' => array('type'=>'float', 'null' => false, 'default' => '0'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1))
	);
	var $records = array(array(
		'id'  => 1,
		'descrizione'  => 'Lorem ipsum dolor sit amet',
		'costo'  => 0
	));
}
?>