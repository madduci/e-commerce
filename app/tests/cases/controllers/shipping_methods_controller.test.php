<?php 
/* SVN FILE: $Id$ */
/* ShippingMethodsController Test cases generated on: 2009-08-26 12:06:53 : 1251281213*/
App::import('Controller', 'ShippingMethods');

class TestShippingMethods extends ShippingMethodsController {
	var $autoRender = false;
}

class ShippingMethodsControllerTest extends CakeTestCase {
	var $ShippingMethods = null;

	function startTest() {
		$this->ShippingMethods = new TestShippingMethods();
		$this->ShippingMethods->constructClasses();
	}

	function testShippingMethodsControllerInstance() {
		$this->assertTrue(is_a($this->ShippingMethods, 'ShippingMethodsController'));
	}

	function endTest() {
		unset($this->ShippingMethods);
	}
}
?>