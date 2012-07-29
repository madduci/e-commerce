<?php 
/* SVN FILE: $Id$ */
/* OrderStatusesController Test cases generated on: 2009-08-26 12:06:40 : 1251281200*/
App::import('Controller', 'OrderStatuses');

class TestOrderStatuses extends OrderStatusesController {
	var $autoRender = false;
}

class OrderStatusesControllerTest extends CakeTestCase {
	var $OrderStatuses = null;

	function startTest() {
		$this->OrderStatuses = new TestOrderStatuses();
		$this->OrderStatuses->constructClasses();
	}

	function testOrderStatusesControllerInstance() {
		$this->assertTrue(is_a($this->OrderStatuses, 'OrderStatusesController'));
	}

	function endTest() {
		unset($this->OrderStatuses);
	}
}
?>