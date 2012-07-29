<?php 
/* SVN FILE: $Id$ */
/* Supplier Fixture generated on: 2009-08-26 12:06:54 : 1251281214*/

class SupplierFixture extends CakeTestFixture {
	var $name = 'Supplier';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'partita_iva' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 11, 'key' => 'unique'),
		'ragione_sociale' => array('type'=>'string', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'indirizzo' => array('type'=>'string', 'null' => false, 'default' => NULL),
		'cap' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 5),
		'citta' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'provincia' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 2),
		'telefono' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 15),
		'fax' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 15),
		'email' => array('type'=>'string', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'partita_iva' => array('column' => 'partita_iva', 'unique' => 1), 'suppliers_partita_iva_idx' => array('column' => 'partita_iva', 'unique' => 0), 'suppliers_ragione_sociale_idx' => array('column' => 'ragione_sociale', 'unique' => 0))
	);
	var $records = array(array(
		'id'  => 1,
		'partita_iva'  => 'Lorem ips',
		'ragione_sociale'  => 'Lorem ipsum dolor sit amet',
		'indirizzo'  => 'Lorem ipsum dolor sit amet',
		'cap'  => 'Lor',
		'citta'  => 'Lorem ipsum dolor sit amet',
		'provincia'  => '',
		'telefono'  => 'Lorem ipsum d',
		'fax'  => 'Lorem ipsum d',
		'email'  => 'Lorem ipsum dolor sit amet'
	));
}
?>