<?php 
/* SVN FILE: $Id$ */
/* Account Fixture generated on: 2009-08-26 12:06:23 : 1251281183*/

class AccountFixture extends CakeTestFixture {
	var $name = 'Account';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'nome' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 70),
		'cognome' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 70),
		'username' => array('type'=>'string', 'null' => false, 'default' => NULL, 'key' => 'unique'),
		'password' => array('type'=>'string', 'null' => false, 'default' => NULL),
		'attivo' => array('type'=>'boolean', 'null' => false, 'default' => '0'),
		'email' => array('type'=>'string', 'null' => false, 'default' => NULL),
		'account_type_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'length' => 2, 'key' => 'unique'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'username' => array('column' => 'username', 'unique' => 1), 'account_type_id' => array('column' => 'account_type_id', 'unique' => 1), 'accounts_username_idx' => array('column' => 'username', 'unique' => 0))
	);
	var $records = array(
			array(
				'id'  => 1,
				'nome'  => 'Lorem ipsum dolor sit amet',
				'cognome'  => 'Lorem ipsum dolor sit amet',
				'username'  => 'Lorem ipsum dolor sit amet',
				'password'  => 'Lorem ipsum dolor sit amet',
				'attivo'  => 1,
				'email'  => 'Lorem ipsum dolor sit amet',
				'account_type_id'  => 1),
			array(
				'id'  => 2,
				'nome'  => 'ipsum dolor sit amet',
				'cognome'  => 'ipsum dolor sit amet',
				'username'  => 'ipsum dolor sit amet',
				'password'  => '',
				'attivo'  => 1,
				'email'  => 'Lorem ipsum dolor sit amet',
				'account_type_id'  => 1)
		);
}
?>