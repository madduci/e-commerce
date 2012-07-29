<?php 
/* SVN FILE: $Id$ */
/* AnomaliesController Test cases generated on: 2009-08-26 12:06:23 : 1251281183*/
App::import('Controller', 'Anomalies');

class TestAnomalies extends AnomaliesController {
	var $autoRender = false;
}

class AnomaliesControllerTest extends CakeTestCase {
	var $Anomalies = null;

	function startTest() {
		$this->Anomalies = new TestAnomalies();
		$this->Anomalies->constructClasses();
	}

	function testAnomaliesControllerInstance() {
		$this->assertTrue(is_a($this->Anomalies, 'AnomaliesController'));
	}

	function endTest() {
		unset($this->Anomalies);
	}
}
?>