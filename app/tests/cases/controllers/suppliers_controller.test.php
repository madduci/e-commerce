<?php 
/* SVN FILE: $Id$ */
/* SuppliersController Test cases generated on: 2009-08-26 12:06:54 : 1251281214*/
App::import('Controller', 'Suppliers');

class TestSuppliers extends SuppliersController {
	var $autoRender = false;
}

class SuppliersControllerTest extends CakeTestCase {
	var $Suppliers = null;

	function startTest() {
		$this->Suppliers = new TestSuppliers();
		$this->Suppliers->constructClasses();
	}

	function testSuppliersControllerInstance() {
		$this->assertTrue(is_a($this->Suppliers, 'SuppliersController'));
	}

	function endTest() {
		unset($this->Suppliers);
	}
}
?>