<?php 
/* SVN FILE: $Id$ */
/* AnomalyType Test cases generated on: 2009-08-26 12:06:24 : 1251281184*/
App::import('Model', 'AnomalyType');

class AnomalyTypeTestCase extends CakeTestCase {
	var $AnomalyType = null;
	var $fixtures = array('app.anomaly_type');

	function startTest() {
		$this->AnomalyType =& ClassRegistry::init('AnomalyType');
	}

	function testAnomalyTypeInstance() {
		$this->assertTrue(is_a($this->AnomalyType, 'AnomalyType'));
	}

	function testAnomalyTypeFind() {
		$this->AnomalyType->recursive = -1;
		$results = $this->AnomalyType->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('AnomalyType' => array(
			'id'  => 1,
			'descrizione'  => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>