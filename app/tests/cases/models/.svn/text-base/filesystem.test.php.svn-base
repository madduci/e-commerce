<?php 
/* SVN FILE: $Id$ */
/* Filesystem Test cases generated on: 2009-08-26 12:06:26 : 1251281186*/
App::import('Model', 'Filesystem');

class FilesystemTestCase extends CakeTestCase {
	var $Filesystem = null;
	var $fixtures = array('app.filesystem');

	function startTest() {
		$this->Filesystem =& ClassRegistry::init('Filesystem');
	}

	function testFilesystemInstance() {
		$this->assertTrue(is_a($this->Filesystem, 'Filesystem'));
	}

	function testFilesystemFind() {
		$this->Filesystem->recursive = -1;
		$results = $this->Filesystem->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Filesystem' => array(
			'id'  => 1,
			'file'  => 'Lorem ipsum dolor sit amet',
			'descrizione'  => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>