<?php 
/* SVN FILE: $Id$ */
/* DetailType Test cases generated on: 2009-08-26 12:06:25 : 1251281185*/
App::import('Model', 'DetailType');

class DetailTypeTestCase extends CakeTestCase {
	var $DetailType = null;
	var $fixtures = array('app.detail_type');

	function startTest() {
		$this->DetailType =& ClassRegistry::init('DetailType');
	}

	function testDetailTypeInstance() {
		$this->assertTrue(is_a($this->DetailType, 'DetailType'));
	}

	function testDetailTypeFind() {
		$this->DetailType->recursive = -1;
		$results = $this->DetailType->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('DetailType' => array(
			'id'  => 1,
			'descrizione'  => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>