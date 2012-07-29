<?php 
/* SVN FILE: $Id$ */
/* OrderStatus Test cases generated on: 2009-08-26 12:06:40 : 1251281200*/
App::import('Model', 'OrderStatus');

class OrderStatusTestCase extends CakeTestCase {
	var $OrderStatus = null;
	var $fixtures = array('app.order_status');

	function startTest() {
		$this->OrderStatus =& ClassRegistry::init('OrderStatus');
	}

	function testOrderStatusInstance() {
		$this->assertTrue(is_a($this->OrderStatus, 'OrderStatus'));
	}

	function testOrderStatusFind() {
		$this->OrderStatus->recursive = -1;
		$results = $this->OrderStatus->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('OrderStatus' => array(
			'id'  => 1,
			'stato'  => 'Lorem ipsum d'
		));
		$this->assertEqual($results, $expected);
	}
}
?>