<?php 
/* SVN FILE: $Id$ */
/* Reservation Test cases generated on: 2009-08-26 12:06:51 : 1251281211*/
App::import('Model', 'Reservation');

class ReservationTestCase extends CakeTestCase {
	var $Reservation = null;
	var $fixtures = array('app.reservation');

	function startTest() {
		$this->Reservation =& ClassRegistry::init('Reservation');
	}

	function testReservationInstance() {
		$this->assertTrue(is_a($this->Reservation, 'Reservation'));
	}

	function testReservationFind() {
		$this->Reservation->recursive = -1;
		$results = $this->Reservation->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Reservation' => array(
			'id'  => 1,
			'customer_id'  => 1,
			'data'  => '2009-08-26 12:06:51',
			'codice' => 'asdfghjklo'
		));
		$this->assertEqual($results, $expected);
	}
}
?>