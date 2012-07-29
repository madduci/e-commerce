<?php 
/* SVN FILE: $Id$ */
/* OrderProductsController Test cases generated on: 2009-08-26 12:06:39 : 1251281199*/
App::import('Controller', 'OrderProducts');

class TestOrderProducts extends OrderProductsController {
	var $autoRender = false;
}

class OrderProductsControllerTest extends CakeTestCase {
	var $OrderProducts = null;

	function startTest() {
		$this->OrderProducts = new TestOrderProducts();
		$this->OrderProducts->constructClasses();
	}

	function testOrderProductsControllerInstance() {
		$this->assertTrue(is_a($this->OrderProducts, 'OrderProductsController'));
	}

	function endTest() {
		unset($this->OrderProducts);
	}
}
?>