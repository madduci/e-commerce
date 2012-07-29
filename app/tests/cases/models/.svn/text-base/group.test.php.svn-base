<?php 
/* SVN FILE: $Id$ */
/* Group Test cases generated on: 2009-08-26 12:06:27 : 1251281187*/
App::import('Model', 'Group');

class GroupTestCase extends CakeTestCase {
	var $Group = null;
	var $fixtures = array('app.group');

	function startTest() {
		$this->Group =& ClassRegistry::init('Group');
	}

	function testGroupInstance() {
		$this->assertTrue(is_a($this->Group, 'Group'));
	}

	function testGroupFind() {
		$this->Group->recursive = -1;
		$results = $this->Group->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Group' => array(
			'id'  => 1,
			'gruppo'  => 'Lorem ipsum dolor sit amet',
			'partita_iva'  => 'Lorem ips',
			'filesystem_id'  => 1
		));
		$this->assertEqual($results, $expected);
	}
}
?>