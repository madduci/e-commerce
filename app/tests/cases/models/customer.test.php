<?php 
/* SVN FILE: $Id$ */
/* Customer Test cases generated on: 2009-08-26 12:06:25 : 1251281185*/
App::import('Model', 'Customer');

class CustomerTestCase extends CakeTestCase {
	var $Customer = null;
	var $fixtures = array('app.customer');

	function startTest() {
		$this->Customer =& ClassRegistry::init('Customer');
	}

	function testCustomerInstance() {
		$this->assertTrue(is_a($this->Customer, 'Customer'));
	}

	function testCustomerFind() {
		$this->Customer->recursive = -1;
		$results = $this->Customer->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Customer' => array(
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
		$this->assertEqual($results, $expected);
	}
}
?>