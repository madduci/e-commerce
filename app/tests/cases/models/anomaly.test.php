<?php 
/* SVN FILE: $Id$ */
/* Anomaly Test cases generated on: 2009-08-26 12:06:23 : 1251281183*/
App::import('Model', 'Anomaly');

class AnomalyTestCase extends CakeTestCase {
	var $Anomaly = null;
	var $fixtures = array('app.anomaly');

	function startTest() {
		$this->Anomaly =& ClassRegistry::init('Anomaly');
	}

	function testAnomalyInstance() {
		$this->assertTrue(is_a($this->Anomaly, 'Anomaly'));
	}

	function testAnomalyFind() {
		$this->Anomaly->recursive = -1;
		$results = $this->Anomaly->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Anomaly' => array(
			'id'  => 1,
			'anomaly_type_id'  => 1,
			'oggetto'  => 'Lorem ipsum dolor sit amet',
			'descrizione'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'order_id'  => 1
		));
		$this->assertEqual($results, $expected);
	}
}
?>