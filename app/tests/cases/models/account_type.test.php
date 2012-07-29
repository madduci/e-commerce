<?php 
/* SVN FILE: $Id$ */
/* AccountType Test cases generated on: 2009-08-26 12:06:21 : 1251281181*/
App::import('Model', 'AccountType');

class AccountTypeTestCase extends CakeTestCase {
	var $AccountType = null;
	var $fixtures = array('app.account_type');

	function startTest() {
		$this->AccountType =& ClassRegistry::init('AccountType');
	}

	function testAccountTypeInstance() {
		$this->assertTrue(is_a($this->AccountType, 'AccountType'));
	}

	function testAccountTypeFind() {
		$this->AccountType->recursive = -1;
		$results = $this->AccountType->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('AccountType' => array(
			'id'  => 1,
			'descrizione'  => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>