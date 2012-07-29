<?php 
/* SVN FILE: $Id$ */
/* DiscountCode Test cases generated on: 2009-08-26 12:06:26 : 1251281186*/
App::import('Model', 'DiscountCode');

class DiscountCodeTestCase extends CakeTestCase {
	var $DiscountCode = null;
	var $fixtures = array('app.discount_code');

	function startTest() {
		$this->DiscountCode =& ClassRegistry::init('DiscountCode');
	}

	function testDiscountCodeInstance() {
		$this->assertTrue(is_a($this->DiscountCode, 'DiscountCode'));
	}

	function testDiscountCodeFind() {
		$this->DiscountCode->recursive = -1;
		$results = $this->DiscountCode->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('DiscountCode' => array(
			'id'  => 1,
			'codice'  => 1
		));
		$this->assertEqual($results, $expected);
	}
}
?>