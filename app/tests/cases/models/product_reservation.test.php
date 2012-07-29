<?php 
/* SVN FILE: $Id$ */
/* ProductReservation Test cases generated on: 2009-08-26 12:06:46 : 1251281206*/
App::import('Model', 'ProductReservation');

class ProductReservationTestCase extends CakeTestCase {
	var $ProductReservation = null;
	var $fixtures = array('app.product_reservation');

	function startTest() {
		$this->ProductReservation =& ClassRegistry::init('ProductReservation');
	}

	function testProductReservationInstance() {
		$this->assertTrue(is_a($this->ProductReservation, 'ProductReservation'));
	}

	function testProductReservationFind() {
		$this->ProductReservation->recursive = -1;
		$results = $this->ProductReservation->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('ProductReservation' => array(
			'id' => 1,
			'reservation_id'  => 1,
			'offers_product_id'  => 1,
			'quantita' => 100,
			'prezzo' => 50000			
		));
		$this->assertEqual($results, $expected);
	}
}
?>