<?php 
/* SVN FILE: $Id$ */
/* ProductStatusesController Test cases generated on: 2009-08-26 12:06:48 : 1251281208*/
App::import('Controller', 'ProductStatuses');

class TestProductStatuses extends ProductStatusesController {
	var $autoRender = false;
}

class ProductStatusesControllerTest extends CakeTestCase {
	var $ProductStatuses = null;

	function startTest() {
		$this->ProductStatuses = new TestProductStatuses();
		$this->ProductStatuses->constructClasses();
	}

	function testProductStatusesControllerInstance() {
		$this->assertTrue(is_a($this->ProductStatuses, 'ProductStatusesController'));
	}

	function endTest() {
		unset($this->ProductStatuses);
	}
}
?>