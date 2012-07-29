<?php 
/* SVN FILE: $Id$ */
/* Customer Fixture generated on: 2009-08-26 12:06:25 : 1251281185*/

class CustomerFixture extends CakeTestFixture {
	var $name = 'Customer';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'ragione_sociale' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'codice_fiscale' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 16),
		'group_id' => array('type'=>'integer', 'null' => false, 'default' => NULL),
		'discount_code_id' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'account_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'filesystem_id' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'key' => 'unique'),
		'indirizzo' => array('type'=>'string', 'null' => false, 'default' => NULL),
		'cap' => array('type'=>'string', 'null' => false, 'default' => NULL, 'length' => 5),
		'citta' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 100),
		'provincia' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 2),
		'regione' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 50),
		'telefono' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 15),
		'fax' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 15),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'filesystem_id' => array('column' => 'filesystem_id', 'unique' => 1), 'discount_code_id_idxfk' => array('column' => 'discount_code_id', 'unique' => 0), 'account_id_idxfk' => array('column' => 'account_id', 'unique' => 0), 'customers_filesystem_id_idxfk' => array('column' => 'filesystem_id', 'unique' => 0))
	);
	var $records = array(array(
		'id'  => 1,
		'ragione_sociale'  => 'Lorem ipsum dolor sit amet',
		'codice_fiscale'  => 'Lorem ipsum do',
		'group_id'  => 1,
		'discount_code_id'  => 1,
		'account_id'  => 1,
		'filesystem_id'  => 1,
		'indirizzo'  => 'Lorem ipsum dolor sit amet',
		'cap'  => 'Lor',
		'citta'  => 'Lorem ipsum dolor sit amet',
		'provincia'  => '',
		'regione'  => 'Lorem ipsum dolor sit amet',
		'telefono'  => 'Lorem ipsum d',
		'fax'  => 'Lorem ipsum d'
	));
}
?>