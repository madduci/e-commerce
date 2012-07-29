<?php 
/* SVN FILE: $Id$ */
/* OfferType Test cases generated on: 2009-08-26 12:06:28 : 1251281188*/
App::import('Model', 'OfferType');

class OfferTypeTestCase extends CakeTestCase {
	var $OfferType = null;
	var $fixtures = array('app.offer_type');

	function startTest() {
		$this->OfferType =& ClassRegistry::init('OfferType');
	}

	function testOfferTypeInstance() {
		$this->assertTrue(is_a($this->OfferType, 'OfferType'));
	}

	function testOfferTypeFind() {
		$this->OfferType->recursive = -1;
		$results = $this->OfferType->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('OfferType' => array(
			'id'  => 1,
			'descrizione'  => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>