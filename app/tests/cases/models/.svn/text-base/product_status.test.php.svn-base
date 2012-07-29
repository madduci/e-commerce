<?php 
/* SVN FILE: $Id$ */
/* ProductStatus Test cases generated on: 2009-08-26 12:06:48 : 1251281208*/
App::import('Model', 'ProductStatus');

class ProductStatusTestCase extends CakeTestCase {
	var $ProductStatus = null;
	var $fixtures = array('app.product_status');

	function startTest() {
		$this->ProductStatus =& ClassRegistry::init('ProductStatus');
	}

	function testProductStatusInstance() {
		$this->assertTrue(is_a($this->ProductStatus, 'ProductStatus'));
	}

	function testProductStatusFind() {
		$this->ProductStatus->recursive = -1;
		$results = $this->ProductStatus->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('ProductStatus' => array(
			'id'  => 1,
			'descrizione'  => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>