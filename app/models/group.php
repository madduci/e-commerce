<?php
class Group extends AppModel {

	var $name = 'Group';
	var $validate = array(
		'gruppo' => array('notempty', 'rule' => 'notempty', 'message' => 'Il campo non può essere vuoto.'),
		'partita_iva' => array(
			'numeric' => array('rule' => '/^[0-9]{11}$/i', 'message' => 'Partita IVA non valida. Può contenere solo caratteri numerici e massimo 11 cifre.'),
			'isUnique' => array('rule' => 'isUnique', 'message' => 'Partita IVA esistente.'),
			)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'Filesystem' => array(
			'className' => 'Filesystem',
			'foreignKey' => 'filesystem_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'Customer' => array(
			'className' => 'Customer',
			'foreignKey' => 'group_id',
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

}
?>