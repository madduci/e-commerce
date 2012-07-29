<?php 
/* SVN FILE: $Id$ */
/* ProductTechnicalDetailsController Test cases generated on: 2009-08-26 12:06:49 : 1251281209*/
App::import('Controller', 'ProductTechnicalDetails');

class TestProductTechnicalDetails extends ProductTechnicalDetailsController {
	var $autoRender = false;
}

class ProductTechnicalDetailsControllerTest extends CakeTestCase {
	var $ProductTechnicalDetails = null;

	function startTest() {
		$this->ProductTechnicalDetails = new TestProductTechnicalDetails();
		$this->ProductTechnicalDetails->constructClasses();
	}

	function testProductTechnicalDetailsControllerInstance() {
		$this->assertTrue(is_a($this->ProductTechnicalDetails, 'ProductTechnicalDetailsController'));
	}

	function endTest() {
		unset($this->ProductTechnicalDetails);
	}
}
?>