<?php 
/* SVN FILE: $Id$ */
/* Offer Test cases generated on: 2009-08-26 12:06:18 : 1251281178*/
App::import('Model', 'Offer');

class OfferTestCase extends CakeTestCase {
	var $Offer = null;
	var $fixtures = array('app.offer');

	function startTest() {
		$this->Offer =& ClassRegistry::init('Offer');
	}

	function testOfferInstance() {
		$this->assertTrue(is_a($this->Offer, 'Offer'));
	}

	function testOfferFind() {
		$this->Offer->recursive = -1;
		$results = $this->Offer->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Offer' => array(
			'id'  => 1,
			'offer_type_id'  => 1,
			'inizio'  => '2009-08-26 12:06:18',
			'fine'  => '2009-08-26 12:06:18',
			'groups_id'  => 1
		));
		$this->assertEqual($results, $expected);
	}
}
?>