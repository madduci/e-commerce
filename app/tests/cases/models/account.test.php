<?php 
/* SVN FILE: $Id$ */
/* Account Test cases generated on: 2009-08-26 12:06:23 : 1251281183*/
App::import('Model', 'Account');

class AccountTestCase extends CakeTestCase {
	var $Account = null;
	var $fixtures = array('app.account');

	function startTest() {
		$this->Account =& ClassRegistry::init('Account');
	}

	function testAccountInstance() {
		$this->assertTrue(is_a($this->Account, 'Account'));
	}

	function testAccountFind() {
		$this->Account->recursive = -1;
		$results = $this->Account->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Account' => array(
			'id'  => 1,
			'nome'  => 'Lorem ipsum dolor sit amet',
			'cognome'  => 'Lorem ipsum dolor sit amet',
			'username'  => 'Lorem ipsum dolor sit amet',
			'password'  => 'Lorem ipsum dolor sit amet',
			'attivo'  => 1,
			'email'  => 'Lorem ipsum dolor sit amet',
			'account_type_id'  => 1
		));
		$this->assertEqual($results, $expected);
	}
	
		function testEmptyPassword() {
		$this->Account->recursive = -1;
		$results = $this->Account->findById('2', 'password');
		$this->assertTrue(!empty($results));

		$expected = array('Account' => array('password'  => ''));
		$this->assertEqual($results, $expected);
	}
}
?>