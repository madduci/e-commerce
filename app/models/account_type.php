<?php
class AccountType extends AppModel {
	var $name = 'AccountType';
	var $validate = array(
		'descrizione' => array(
			'notempty' => array('rule' => 'notempty', 'message' => 'Il campo non può essere vuoto'),
			'isUnique' => array('rule' => 'isUnique', 'message' => 'Tipologia di account esistente')
			)
	);
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $hasMany = array(
		'Account' => array(
			'className' => 'Account',
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
	
	var $actsAs = array('Acl' => array('requester'));

	function parentNode() {
	    return null;
	}
}
?>