<?php 
/* SVN FILE: $Id$ */
/* ProductFilesystemsController Test cases generated on: 2009-08-26 12:06:45 : 1251281205*/
App::import('Controller', 'ProductFilesystems');

class TestProductFilesystems extends ProductFilesystemsController {
	var $autoRender = false;
}

class ProductFilesystemsControllerTest extends CakeTestCase {
	var $ProductFilesystems = null;

	function startTest() {
		$this->ProductFilesystems = new TestProductFilesystems();
		$this->ProductFilesystems->constructClasses();
	}

	function testProductFilesystemsControllerInstance() {
		$this->assertTrue(is_a($this->ProductFilesystems, 'ProductFilesystemsController'));
	}

	function endTest() {
		unset($this->ProductFilesystems);
	}
}
?>