<?php 
/* SVN FILE: $Id$ */
/* ProductFilesystem Test cases generated on: 2009-08-26 12:06:45 : 1251281205*/
App::import('Model', 'ProductFilesystem');

class ProductFilesystemTestCase extends CakeTestCase {
	var $ProductFilesystem = null;
	var $fixtures = array('app.product_filesystem');

	function startTest() {
		$this->ProductFilesystem =& ClassRegistry::init('ProductFilesystem');
	}

	function testProductFilesystemInstance() {
		$this->assertTrue(is_a($this->ProductFilesystem, 'ProductFilesystem'));
	}

	function testProductFilesystemFind() {
		$this->ProductFilesystem->recursive = -1;
		$results = $this->ProductFilesystem->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('ProductFilesystem' => array(
			'id'  => 1,
			'product_id'  => 1,
			'filesystem_id'  => 1
		));
		$this->assertEqual($results, $expected);
	}
}
?>