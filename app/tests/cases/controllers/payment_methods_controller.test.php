<?php 
/* SVN FILE: $Id$ */
/* PaymentMethodsController Test cases generated on: 2009-08-26 12:06:42 : 1251281202*/
App::import('Controller', 'PaymentMethods');

class TestPaymentMethods extends PaymentMethodsController {
	var $autoRender = false;
}

class PaymentMethodsControllerTest extends CakeTestCase {
	var $PaymentMethods = null;

	function startTest() {
		$this->PaymentMethods = new TestPaymentMethods();
		$this->PaymentMethods->constructClasses();
	}

	function testPaymentMethodsControllerInstance() {
		$this->assertTrue(is_a($this->PaymentMethods, 'PaymentMethodsController'));
	}

	function endTest() {
		unset($this->PaymentMethods);
	}
}
?>