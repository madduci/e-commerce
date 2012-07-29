<?php 
/* SVN FILE: $Id$ */
/* ProductTechnicalDetail Test cases generated on: 2009-08-26 12:06:49 : 1251281209*/
App::import('Model', 'ProductTechnicalDetail');

class ProductTechnicalDetailTestCase extends CakeTestCase {
	var $ProductTechnicalDetail = null;
	var $fixtures = array('app.product_technical_detail');

	function startTest() {
		$this->ProductTechnicalDetail =& ClassRegistry::init('ProductTechnicalDetail');
	}

	function testProductTechnicalDetailInstance() {
		$this->assertTrue(is_a($this->ProductTechnicalDetail, 'ProductTechnicalDetail'));
	}

	function testProductTechnicalDetailFind() {
		$this->ProductTechnicalDetail->recursive = -1;
		$results = $this->ProductTechnicalDetail->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('ProductTechnicalDetail' => array(
			'id'  => 1,
			'detail_type_id'  => 1,
			'valore_dettaglio'  => 'Lorem ipsum dolor sit amet',
			'product_id'  => 1
		));
		$this->assertEqual($results, $expected);
	}
}
?>