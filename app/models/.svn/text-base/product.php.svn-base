<?php
class Product extends AppModel {

	var $name = 'Product';
	var $validate = array(
		'codice_prodotto' => array(
			'notempty' => array('rule' => 'notempty', 'message' => 'Il campo non può essere vuoto'),
			'alphanumeric' => array('rule' => 'alphanumeric', 'message' => 'Il campo può contenere solo lettere e numeri'),
			'isUnique' => array('rule' => 'isUnique', 'message' => 'Questo codice è stato già assegnato ad un altro prodotto'),
			),
		'nome' => array('notempty', 'rule' => 'notempty', 'message' => 'Il campo non può essere vuoto'),
		'product_category_id' => array(
			'notempty' => array('rule' => 'notempty', 'message' => 'Categoria non selezionata'),
			'numeric' => array('rule' => 'numeric', 'message' => 'Categoria non selezionata'),
			),
		'qta_minima_ordinabile' => array('numeric', 'rule' => 'numeric', 'message' => 'Il campo può contenere solo numeri'),
		'qta_incremento' => array('numeric', 'rule' => 'numeric', 'message' => 'Il campo può contenere solo numeri'),
		'supplier_id' => array('numeric', 'rule' => 'numeric', 'message' => 'Fornitore non selezionato')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'ProductCategory' => array(
			'className' => 'ProductCategory',
			'foreignKey' => 'product_category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ProductStatus' => array(
			'className' => 'ProductStatus',
			'foreignKey' => 'product_status_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Supplier' => array(
			'className' => 'Supplier',
			'foreignKey' => 'supplier_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'OrderProduct' => array(
			'className' => 'OrderProduct',
			'foreignKey' => 'product_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'ProductFilesystem' => array(
			'className' => 'ProductFilesystem',
			'foreignKey' => 'product_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'ProductTechnicalDetail' => array(
			'className' => 'ProductTechnicalDetail',
			'foreignKey' => 'product_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

	var $hasAndBelongsToMany = array(
		'Offer' => array(
			'className' => 'Offer',
			'joinTable' => 'offers_products',
			'foreignKey' => 'product_id',
			'associationForeignKey' => 'offer_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);
}
?>