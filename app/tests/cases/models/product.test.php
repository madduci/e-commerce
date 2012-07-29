<?php 
/* SVN FILE: $Id$ */
/* Product Test cases generated on: 2009-08-26 12:06:50 : 1251281210*/
App::import('Model', 'Product');

class ProductTestCase extends CakeTestCase {
	var $Product = null;
	var $fixtures = array('app.product');

	function startTest() {
		$this->Product =& ClassRegistry::init('Product');
	}

	function testProductInstance() {
		$this->assertTrue(is_a($this->Product, 'Product'));
	}

	function testProductFind() {
		$this->Product->recursive = -1;
		$results = $this->Product->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('Product' => array(
			'id'  => 1,
			'codice_prodotto'  => 'Lorem ipsum d',
			'nome'  => 'Lorem ipsum dolor sit amet',
			'descrizione'  => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida,phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam,vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit,feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'product_category_id'  => 1,
			'product_status_id'  => 1,
			'prezzo'  => 1,
			'qta_minima_ordinabile'  => 1,
			'qta_incremento'  => 1,
			'qta_disponibile'  => 1,
			'peso'  => 1,
			'vetrina'  => 1,
			'pubblica'  => 1,
			'supplier_id'  => 1,
			'foto_default' => null
		));
		$this->assertEqual($results, $expected);
	}
}
?>