<?php
class Supplier extends AppModel {
	var $name = 'Supplier';
	var $validate = array(
		'partita_iva' => array(
			'numeric' => array('rule' => '/^[0-9]{11}$/i', 'message' => 'Partita IVA non valida. Può contenere solo caratteri numerici e massimo 11 cifre.'),
			'isUnique' => array('rule' => 'isUnique', 'message' => 'Partita IVA esistente.'),
			),
		'ragione_sociale' => array('notempty', 'rule' => 'notempty', 'message' => 'Il campo non può essere vuoto.'),
		'indirizzo' => array('notempty', 'rule' => 'notempty', 'message' => 'Il campo non può essere vuoto.'),
		'cap' => array(
			'numeric' => array('rule' => '/^[0-9]{5}$/i', 'message' => 'CAP non valido. Può contenere solo caratteri numerici e massimo 5 cifre.'),
			'notempty' => array('rule' => 'notempty', 'message' => 'Il campo non può essere vuoto.'),
			),
		'citta' => array('notempty', 'rule' => 'notempty', 'message' => 'Il campo non può essere vuoto.'),
		'provincia' => array('rule' => '/^[a-zA-Z]{2}$/i', 'message' => 'Solo lettere, esattamente 2 caratteri'),
		'telefono' => array(
			'notempty' => array('rule' => 'notempty', 'message' => 'Il campo non può essere vuoto.'),
			'numeric' => array('rule' => 'numeric', 'message' => 'Il campo può contenere solo numeri.'),
			),
		'fax' => array(
			'notempty' => array('rule' => 'notempty', 'message' => 'Il campo non può essere vuoto.'),
			'numeric' => array('rule' => 'numeric', 'message' => 'Il campo può contenere solo numeri.'),
			),
		'email' => array('email', 'rule' => 'email', 'message' => 'Email non valida')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'supplier_id',
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
	
	function beforeSave() {
		$this->data['Supplier']['provincia'] = strtoupper($this->data['Supplier']['provincia']);
		
		return true;
	}
}
?>