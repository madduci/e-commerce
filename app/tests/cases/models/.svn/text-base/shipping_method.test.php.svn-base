<?php 
/* SVN FILE: $Id$ */
/* ShippingMethod Test cases generated on: 2009-08-26 12:06:53 : 1251281213*/
App::import('Model', 'ShippingMethod');

class ShippingMethodTestCase extends CakeTestCase {
	var $ShippingMethod = null;
	var $fixtures = array('app.shipping_method');

	function startTest() {
		$this->ShippingMethod =& ClassRegistry::init('ShippingMethod');
	}

	function testShippingMethodInstance() {
		$this->assertTrue(is_a($this->ShippingMethod, 'ShippingMethod'));
	}

	function testShippingMethodFind() {
		$this->ShippingMethod->recursive = -1;
		$results = $this->ShippingMethod->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('ShippingMethod' => array(
			'id'  => 1,
			'descrizione'  => 'Lorem ipsum dolor sit amet',
			'costo'  => 0
		));
		$this->assertEqual($results, $expected);
	}
}
?>