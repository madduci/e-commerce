<?php 
/* SVN FILE: $Id$ */
/* Reservation Fixture generated on: 2009-08-26 12:06:51 : 1251281211*/

class ReservationFixture extends CakeTestFixture {
	var $name = 'Reservation';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'customer_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'data' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'codice' => array('type'=>'string', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'customer_id_idxfk' => array('column' => 'customer_id', 'unique' => 0))
	);
	var $records = array(array(
		'id'  => 1,
		'customer_id'  => 1,
		'data'  => '2009-08-26 12:06:51',
		'codice' => 'asdfghjklo'
	));
}
?>