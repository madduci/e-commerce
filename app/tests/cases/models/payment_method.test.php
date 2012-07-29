<?php 
/* SVN FILE: $Id$ */
/* PaymentMethod Test cases generated on: 2009-08-26 12:06:42 : 1251281202*/
App::import('Model', 'PaymentMethod');

class PaymentMethodTestCase extends CakeTestCase {
	var $PaymentMethod = null;
	var $fixtures = array('app.payment_method');

	function startTest() {
		$this->PaymentMethod =& ClassRegistry::init('PaymentMethod');
	}

	function testPaymentMethodInstance() {
		$this->assertTrue(is_a($this->PaymentMethod, 'PaymentMethod'));
	}

	function testPaymentMethodFind() {
		$this->PaymentMethod->recursive = -1;
		$results = $this->PaymentMethod->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('PaymentMethod' => array(
			'id'  => 1,
			'metodo'  => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>