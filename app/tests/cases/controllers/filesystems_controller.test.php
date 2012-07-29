<?php 
/* SVN FILE: $Id$ */
/* FilesystemsController Test cases generated on: 2009-08-26 12:06:26 : 1251281186*/
App::import('Controller', 'Filesystems');

class TestFilesystems extends FilesystemsController {
	var $autoRender = false;
}

class FilesystemsControllerTest extends CakeTestCase {
	var $Filesystems = null;

	function startTest() {
		$this->Filesystems = new TestFilesystems();
		$this->Filesystems->constructClasses();
	}

	function testFilesystemsControllerInstance() {
		$this->assertTrue(is_a($this->Filesystems, 'FilesystemsController'));
	}

	function endTest() {
		unset($this->Filesystems);
	}
}
?>