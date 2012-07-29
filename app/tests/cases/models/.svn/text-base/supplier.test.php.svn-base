<?php 
/* SVN FILE: $Id$ */
/* Supplier Test cases generated on: 2009-08-26 12:06:54 : 1251281214*/
App::import('Model', 'Supplier');

class SupplierTestCase extends CakeTestCase {
	var $Supplier = null;
	var $fixtures = array('app.supplier');

	function startTest() {
		$this->Supplier =& ClassRegistry::init('Supplier');
	}

	function testSupplierInstance() {
		$this->assertTrue(is_a($this->Supplier, 'Supplier'));
	}

	function testSupplierFind() {
		$this->Supplier->recursive = -1;
		$results = $this->Supplier->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Supplier' => array(
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
		$this->assertEqual($results, $expected);
	}
}
?>