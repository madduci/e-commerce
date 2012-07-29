<?php 
/* SVN FILE: $Id$ */
/* OrderProduct Test cases generated on: 2009-08-26 12:06:39 : 1251281199*/
App::import('Model', 'OrderProduct');

class OrderProductTestCase extends CakeTestCase {
	var $OrderProduct = null;
	var $fixtures = array('app.order_product');

	function startTest() {
		$this->OrderProduct =& ClassRegistry::init('OrderProduct');
	}

	function testOrderProductInstance() {
		$this->assertTrue(is_a($this->OrderProduct, 'OrderProduct'));
	}

	function testOrderProductFind() {
		$this->OrderProduct->recursive = -1;
		$results = $this->OrderProduct->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('OrderProduct' => array(
			'id'  => 1,
			'order_id'  => 1,
			'product_id'  => 1,
			'qta'  => 1,
			'unitario'  => 1,
			'totale'  => 1
		));
		$this->assertEqual($results, $expected);
	}
}
?>