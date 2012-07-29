<?php
class Account extends AppModel {
	var $name = 'Account';
	var $validate = array(
		'username' => array(
			'notempty' => array('rule' => 'notempty', 'message' => 'Il campo non può essere vuoto'),
			'isUnique' => array('rule' => 'isUnique', 'message' => 'Lo username è stato già scelto da un altro utente.')
			),
		'password' => array(
				'rule' => array('_checkEmptyPassword'),
				'message' => 'La password non può essere vuota'
			),
		'attivo' => array('numeric'),
		'email' => array('email', 'rule' => 'email', 'message' => 'Indirizzo email non valido'),
		'account_type_id' => array('numeric')
	);

	function _checkEmptyPassword($data) {
		//sto facendo edit
		if (isset($this->data['Account']['id']))
			return true;
	
		//sto facendo add
		return !$this->_emptyPassword($this->data['Account']['password']);
	}
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'AccountType' => array(
			'className' => 'AccountType',
			'foreignKey' => 'account_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'Customer' => array(
			'className' => 'Customer',
			'foreignKey' => 'account_id',
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
	
	var $actsAs = array('Acl' => 'requester');
	
	function beforeSave() {
		if ($this->_emptyPassword($this->data['Account']['password'])) { //il campo password è vuoto
			$beforeSaveAccount = $this->findById($this->data['Account']['id']);
			$this->data['Account']['password'] = $beforeSaveAccount['Account']['password'];
		}

		return true;
	}
	
	//Richiamato quando modifico le informazioni sull'utente. Mantiene consistente la gestione dei permessi
	function afterSave($created) {
		if (!$created) {
			$parent = $this->parentNode();
			$parent = $this->node($parent);
			$node = $this->node();
			$aro = $node[0];
			$aro['Aro']['parent_id'] = $parent[0]['Aro']['id'];
			$this->Aro->save($aro);
		}
	}
	
	function parentNode() {
		if (!$this->id && empty($this->data)) {
			return null;
		}
		$data = $this->data;
		
		if (empty($this->data)) {
			$data = $this->read();
		}
		
		if (!$data['Account']['account_type_id']) {
			return null;
		} else {
			return array('AccountType' => array('id' => $data['Account']['account_type_id']));
		}
	}
	
	function _emptyPassword($password) {
		return Security::hash('', 'sha1', true) == $password;
	}

}
?>