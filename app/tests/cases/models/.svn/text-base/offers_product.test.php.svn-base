<?php 
/* SVN FILE: $Id$ */
/* OffersProduct Test cases generated on: 2009-08-26 12:06:19 : 1251281179*/
App::import('Model', 'OffersProduct');

class OffersProductTestCase extends CakeTestCase {
	var $OffersProduct = null;
	var $fixtures = array('app.offers_product');

	function startTest() {
		$this->OffersProduct =& ClassRegistry::init('OffersProduct');
	}

	function testOffersProductInstance() {
		$this->assertTrue(is_a($this->OffersProduct, 'OffersProduct'));
	}

	function testOffersProductFind() {
		$this->OffersProduct->recursive = -1;
		$results = $this->OffersProduct->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('OffersProduct' => array(
			'id'  => 1,
			'product_id'  => 1,
			'offer_id'  => 1,
			'prezzo'  => 1
		));
		$this->assertEqual($results, $expected);
	}
}
?>