<?php
class Customer extends AppModel {

	var $name = 'Customer';
	var $validate = array(
		'ragione_sociale' => array('notempty', 'rule' => 'notempty', 'message' => 'Il campo non può essere vuoto'),
		'codice_fiscale' => array('alphanumeric', 'rule' => 'notempty', 'message' => 'Codice Fiscale non valido'),
		'group_id' => array('numeric'),
		'account_id' => array('numeric'),
		'indirizzo' => array('notempty', 'rule' => 'notempty', 'message' => 'Il campo non può essere vuoto'),
		'cap' => array('notempty', 'rule' => '/^[0-9]{5}$/i', 'message' => 'Solo numeri, esattamente 5 caratteri'),
		'provincia' => array('rule' => '/^[a-zA-Z]{2}$/i', 'message' => 'Solo lettere, esattamente 2 caratteri'),
		'regione' => array('rule' => array('inList', array('Puglia', 'Calabria', 'Campania', 'Molise')), 'message' => 'Selezionare una regione tra quelle disponibili'),
		'telefono' => array('numeric', 'rule' => 'numeric', 'message' => 'Il campo può contenere solo caratteri numerici'),
		'fax' => array('numeric', 'rule' => 'notempty', 'message' => 'Il campo può contenere solo caratteri numerici')
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'DiscountCode' => array(
			'className' => 'DiscountCode',
			'foreignKey' => 'discount_code_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Account' => array(
			'className' => 'Account',
			'foreignKey' => 'account_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Filesystem' => array(
			'className' => 'Filesystem',
			'foreignKey' => 'filesystem_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'Order' => array(
			'className' => 'Order',
			'foreignKey' => 'customer_id',
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
		'Reservation' => array(
			'className' => 'Reservation',
			'foreignKey' => 'customer_id',
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
		$this->data['Customer']['provincia'] = strtoupper($this->data['Customer']['provincia']);
		
		return true;
	}
}
?>