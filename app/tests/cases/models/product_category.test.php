<?php 
/* SVN FILE: $Id$ */
/* ProductCategory Test cases generated on: 2009-08-26 13:53:49 : 1251287629*/
App::import('Model', 'ProductCategory');

class ProductCategoryTestCase extends CakeTestCase {
	var $ProductCategory = null;
	var $fixtures = array('app.product_category');

	function startTest() {
		$this->ProductCategory =& ClassRegistry::init('ProductCategory');
	}

	function testProductCategoryInstance() {
		$this->assertTrue(is_a($this->ProductCategory, 'ProductCategory'));
	}

	function testProductCategoryFind() {
		$this->ProductCategory->recursive = -1;
		$results = $this->ProductCategory->find('first');
		$this->assertTrue(!empty($results));

		$expected = array('ProductCategory' => array(
			'id'  => 1,
			'parent_id'  => 0,
			'lft'  => 1,
			'rght'  => 2,
			'name'  => 'Lorem ipsum dolor sit amet'
		));
		$this->assertEqual($results, $expected);
	}
}
?>