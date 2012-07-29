<?php 
/* SVN FILE: $Id$ */
/* Order Fixture generated on: 2009-08-26 12:06:41 : 1251281201*/

class OrderFixture extends CakeTestFixture {
	var $name = 'Order';
	var $fields = array(
		'id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'customer_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'data_ordine' => array('type'=>'datetime', 'null' => false, 'default' => NULL),
		'payment_method_id' => array('type'=>'integer', 'null' => true, 'default' => NULL),
		'shipping_method_id' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'tracking' => array('type'=>'string', 'null' => true, 'default' => NULL, 'length' => 32),
		'data_evasione' => array('type'=>'datetime', 'null' => true, 'default' => NULL),
		'order_status_id' => array('type'=>'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'note' => array('type'=>'text', 'null' => false, 'default' => NULL),
		'totale' => array('type'=>'float', 'null' => true, 'default' => '0'),
		'reservation_id' => array('type'=>'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'customer_id_idxfk' => array('column' => 'customer_id', 'unique' => 0), 'shipping_method_id_idxfk' => array('column' => 'shipping_method_id', 'unique' => 0), 'order_status_id_idxfk' => array('column' => 'order_status_id', 'unique' => 0), 'reservation_id_idxfk' => array('column' => 'reservation_id', 'unique' => 0))
	);
	var $records = array(array(
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
}
?>