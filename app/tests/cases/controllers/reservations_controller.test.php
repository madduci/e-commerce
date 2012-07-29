<?php 
/* SVN FILE: $Id$ */
/* ReservationsController Test cases generated on: 2009-08-26 12:06:51 : 1251281211*/
App::import('Controller', 'Reservations');

class TestReservations extends ReservationsController {
	var $autoRender = false;
}

class ReservationsControllerTest extends CakeTestCase {
	var $Reservations = null;

	function startTest() {
		$this->Reservations = new TestReservations();
		$this->Reservations->constructClasses();
	}

	function testReservationsControllerInstance() {
		$this->assertTrue(is_a($this->Reservations, 'ReservationsController'));
	}

	function endTest() {
		unset($this->Reservations);
	}
}
?>