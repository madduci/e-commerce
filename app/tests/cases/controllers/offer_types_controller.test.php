<?php 
/* SVN FILE: $Id$ */
/* OfferTypesController Test cases generated on: 2009-08-26 12:06:28 : 1251281188*/
App::import('Controller', 'OfferTypes');

class TestOfferTypes extends OfferTypesController {
	var $autoRender = false;
}

class OfferTypesControllerTest extends CakeTestCase {
	var $OfferTypes = null;

	function startTest() {
		$this->OfferTypes = new TestOfferTypes();
		$this->OfferTypes->constructClasses();
	}

	function testOfferTypesControllerInstance() {
		$this->assertTrue(is_a($this->OfferTypes, 'OfferTypesController'));
	}

	function endTest() {
		unset($this->OfferTypes);
	}
}
?>