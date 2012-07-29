<?php
class Offer extends AppModel {

	var $name = 'Offer';
	var $validate = array(
		'offer_type_id' => array('numeric', 'rule' => 'numeric', 'message' => 'Il campo può contenere solo caratteri numerici'),
		'inizio' => array(
			'notempty' => array('rule' => 'notempty', 'message' => 'Data non valida'),
			'date' => array('rule' => '/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[012])\/(19|20)\d\d$/i', 'message' => 'Data non valida'),
			'window' => array('rule' => 'verificaFinestraTemporaleOfferta', 'message' => 'Intervallo date non valido')
			),
		'fine' => array(
			'notempty' => array('rule' => 'notempty', 'message' => 'Data non valida'),
			'date' => array('rule' => '/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[012])\/(19|20)\d\d$/i', 'message' => 'Data non valida'),
			'window' => array('rule' => 'verificaFinestraTemporaleOfferta', 'message' => 'Intervallo date non valido')
			),
		'groups_id' => array('numeric', 'rule' => 'numeric', 'message' => 'Il campo può contenere solo caratteri numerici')
	);
	
	function verificaFinestraTemporaleOfferta() {
		$diffDataInizio = $this->dateDiff("/", $this->data['Offer']['inizio'], date("d/m/Y"));
		$diffFineInizio = $this->dateDiff("/", $this->data['Offer']['fine'], $this->data['Offer']['inizio']);
		
		if ($diffDataInizio < 0)
			return true;
		
		if ($diffDataInizio >= 17 && $diffFineInizio >= 15)
			return true;
			
		return false;
	}

	function dateDiff($dformat, $endDate, $beginDate) {
		$date_parts1 = explode($dformat, $beginDate);
		$date_parts2 = explode($dformat, $endDate);
		$start_date = gregoriantojd($date_parts1[1], $date_parts1[0], $date_parts1[2]);
		$end_date = gregoriantojd($date_parts2[1], $date_parts2[0], $date_parts2[2]);
		
		return $end_date - $start_date;
	}
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $belongsTo = array(
		'OfferType' => array(
			'className' => 'OfferType',
			'foreignKey' => 'offer_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Groups' => array(
			'className' => 'Groups',
			'foreignKey' => 'groups_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasAndBelongsToMany = array(
		'Product' => array(
			'className' => 'Product',
			'joinTable' => 'offers_products',
			'foreignKey' => 'offer_id',
			'associationForeignKey' => 'product_id',
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
	
	function beforeSave() {
		list($d, $m, $y) = explode('/', $this->data['Offer']['inizio']);
		$this->data['Offer']['inizio'] = date('Y-m-d', mktime(0, 0, 0, $m, $d, $y));
		
		list($d, $m, $y) = explode('/', $this->data['Offer']['fine']);
		$this->data['Offer']['fine'] = date('Y-m-d', mktime(0, 0, 0, $m, $d, $y));
		
		return true;
	}
}
?>