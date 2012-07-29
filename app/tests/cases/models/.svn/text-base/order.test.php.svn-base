<?php 
/* SVN FILE: $Id$ */
/* Order Test cases generated on: 2009-08-26 12:06:41 : 1251281201*/
App::import('Model', 'Order');

class OrderTestCase extends CakeTestCase {
	var $Order = null;
	var $fixtures = array('app.order');

	function startTest() {
		$this->Order =& ClassRegistry::init('Order');
	}

	function testOrderInstance() {
		$this->assertTrue(is_a($this->Order, 'Order'));
	}

	function testOrderFind() {
		$this->Order->recursive = -1;
		$results = $this->Order->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Order' => array(
			'id'  => 1,
			'customer_id'  => 1,
			'data_ordine'  => '2009-08-26 12:06:41',
			'payment_method_id'  => 1,
			'shipping_method_id'  => 1,
			'tracking'  => 'Lorem ipsum dolor sit amet',
			'data_evasione'  => '2009-08-26 12:06:41',
			'order_status_id'  => 1,
			'note'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'totale'  => 56789,
			'reservation_id'  => 1
		));
		$this->assertEqual($results, $expected);
	}
}
?>