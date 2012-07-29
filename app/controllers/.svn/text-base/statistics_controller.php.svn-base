<?php
class StatisticsController extends AppController {
	var $name = 'Statistics';
	var $helpers = array('Html', 'Form'); 
	var $uses = array('OrderProduct', 'Group', 'Supplier', 'Product');
	var $days = array('1' => 30, '3' => 90, '6' => '180', '12' => '365');

	function admin_index() {
		$stats = $this->_getStatisticheProdotto(1, false, 'f', null, null, null, 'all');
		$this->set("statistiche", $stats);
		$this->set("gruppigdo", $this->Group->find('all'));
		$this->set("fornitori", $this->Supplier->find('all'));
	}
		
	function admin_view() {
		
	}
	
	function admin_get_stats() {
		if($this->params["isAjax"]==1) {
			$this->autoRender = false;

			if (isset($_POST['intervallo'])) {
				if ($_POST['confronto'] == 1)
					$confronto = true;
				else
					$confronto = false;
					
				if (isset($_POST['assey'])) {
					$assey = $_POST['assey'];
				} else
					$assey = 'f';
				
				if (isset($_POST['prodotto'])) {
					$p = $this->Product->findByCodiceProdotto($_POST['prodotto']);
					
					if (empty($p))
						$prodotto = null;
					else
						$prodotto = $p['Product']['codice_prodotto'];
				} else
					$prodotto = null;
				
				if (isset($_POST['fornitore'])) {
					$f = $this->Supplier->read(null, $_POST['fornitore']);
					
					if (empty($f))
						$fornitore = null;
					else
						$fornitore = $f['Supplier']['id'];
				} else
					$fornitore = null;
				
				if (isset($_POST['regione']))
					$regione = $_POST['regione'];
				else
					$regione = 'all';
				
				if (isset($_POST['gruppogdo'])) {
					$gruppogdo = $_POST['gruppogdo'];
				} else
					$gruppogdo = null;
				
				
				$stats = $this->_getStatisticheProdotto($_POST['intervallo'], $confronto, $assey, $prodotto, $fornitore, $gruppogdo, $regione);
				echo $stats;
			}
		} else {
			$this->Session->setFlash("Errore nell'elaborazione della richiesta.", 'default', array('class' => 'flasherror'));
			$this->redirect(array('action' => 'index'));
		}
	}
	
	function _getStatisticheProdotto($intervallo = 1, $confronto = null, $y = 'f', $codice = null, $fornitore = null, $gruppogdo = null, $regione = null) {
		if (!$intervallo) {
			$this->Session->setFlash("Intervallo date non definito", 'default', array('class' => 'flasherror'));
		}
		
		if ($intervallo) {
			if (in_array($intervallo, array_keys($this->days))) {
				$sqlField = 'orders.data_ordine AS data_ordine';
				
				if ($gruppogdo != 'all') {
					if ($regione) {
						if ($regione == 'all')
							$sqlField .= ', customers.regione AS regione';
					}
				}
				
				if ($gruppogdo) {
					if ($gruppogdo == 'all')
						$sqlField .= ', customers.group_id AS gruppi, groups.gruppo';
				}
				
				$sqlWhat = "SELECT ".$sqlField.", SUM(op.qta) AS qta, TRUNCATE(SUM(op.totale), 2) AS totale";
				$sqlFrom = " FROM order_products AS op, products AS p, orders, customers, groups";
				$sqlWhere = " WHERE op.product_id = p.id AND op.order_id = orders.id AND customers.group_id = groups.id AND orders.order_status_id = 3";
				
				$sqlBase = $sqlWhat.$sqlFrom.$sqlWhere;
				
				$sqlGroupBy = " GROUP BY orders.data_ordine";
				
				$data_fine = date('Y-m-d');
				$data_inizio = date('Y-m-d', strtotime($data_fine.' - '.$this->days[$intervallo].'days'));
				
				$sqlIntervallo = " AND orders.data_ordine BETWEEN '".$data_inizio."' AND '".$data_fine."'";

				if ($confronto === true) {
					$data_old_fine = date('Y-m-d', strtotime($data_fine.' - 1 years'));
					$data_old_inizio = date('Y-m-d', strtotime($data_old_fine.' - '.$this->days[$intervallo].'days'));
					
					$sqlConfrontoIntervallo = " AND orders.data_ordine BETWEEN '".$data_old_inizio."' AND '".$data_old_fine."'";
					$sqlConfronto = $sqlBase.$sqlConfrontoIntervallo;
				}

				if ($codice != null) 
					$sqlCriterio = " AND p.codice_prodotto = '".addslashes($codice)."'";
				else
					$sqlCriterio = '';
					
				if ($fornitore)
					$sqlCriterio = " AND p.supplier_id = ".addslashes($fornitore);	

				if ($gruppogdo) {
					if ($gruppogdo == 'all') {
						$sqlGroupBy .= ', customers.group_id';
						$sqlGruppo = '';
					} else
						$sqlGruppo = " AND customers.group_id = '".addslashes($gruppogdo)."'";
				} else
					$sqlGruppo = '';
				
				$sqlRegione = '';
				
				if ($gruppogdo != 'all') {
					if ($regione) {
						if ($regione == 'all') {
							$sqlGroupBy .= ', customers.regione';
							$sqlRegione = '';
						} else
							$sqlRegione = " AND customers.regione = '".addslashes(strtolower($regione))."'";
					} else
						$sqlRegione = '';
				}
				
				$stats = array();
				$stats['periodo_corrente'] = $this->OrderProduct->query($sqlBase.$sqlIntervallo.$sqlCriterio.$sqlRegione.$sqlGruppo.$sqlGroupBy);
				#debug($stats['periodo_corrente']);
				
				if (isset($sqlConfronto))
					$stats['periodo_precedente'] = $this->OrderProduct->query($sqlConfronto.$sqlCriterio.$sqlRegione.$sqlGruppo.$sqlGroupBy);

				if (!empty($stats['periodo_corrente'])){
					$jsDatasetOpen = '{';
					$jsDatasetClose = '}';
					$jsArrayOpen = '[';
					$jsArrayClose = ']';
					$jsArray = '';
					$series = array();

					if (isset($stats['periodo_corrente'][0]['customers']['regione'])) {
						$regioni = array();

						foreach ($stats['periodo_corrente'] as $key => $value) {
							$time = strtotime($value['orders']['data_ordine'])*1000;

							if (!$y)
								$y = 'f';

							if ($y == 'f')
								$asse_y = $value[0]['totale'];
							else
								$asse_y = $value[0]['qta'];

							if (!isset($regioni[$value['customers']['regione']]))
								$regioni[$value['customers']['regione']] = '';

							if ($regioni[$value['customers']['regione']] != '')
								$regioni[$value['customers']['regione']] .= ',';

							$regioni[$value['customers']['regione']] .= "[".$time.",".$asse_y."]";
						}
						
						$series['periodo_corrente'] = $jsDatasetOpen;
						
						foreach ($regioni as $regione => $dati) {
							if ($series['periodo_corrente'] != $jsDatasetOpen)
								$series['periodo_corrente'] .= ',';
							
							$series['periodo_corrente'] .= '"'.$regione.'":'.$jsDatasetOpen.'label:"'.$regione.'", data:'.$jsArrayOpen.$dati.$jsArrayClose.$jsDatasetClose;
						}
					} else if (isset($stats['periodo_corrente'][0]['customers']['gruppi'])) { 
						$gruppi = array();
						
						foreach ($stats['periodo_corrente'] as $key => $value) {
							$time = strtotime($value['orders']['data_ordine'])*1000;
							
							if (!$y)
								$y = 'f';
								
							if ($y == 'f')
								$asse_y = $value[0]['totale'];
							else
								$asse_y = $value[0]['qta'];
							
							if (!isset($gruppi[$value['groups']['gruppo']]))
								$gruppi[$value['groups']['gruppo']] = '';
								
							if ($gruppi[$value['groups']['gruppo']] != '')
								$gruppi[$value['groups']['gruppo']] .= ',';
								
							$gruppi[$value['groups']['gruppo']] .= "[".$time.",".$asse_y."]";
						}
						
						$series['periodo_corrente'] = $jsDatasetOpen;
						
						foreach ($gruppi as $gruppo => $dati) {
							if ($series['periodo_corrente'] != $jsDatasetOpen)
								$series['periodo_corrente'] .= ',';
							
							$series['periodo_corrente'] .= '"'.$gruppo.'":'.$jsDatasetOpen.'label:"'.$gruppo.'", data:'.$jsArrayOpen.$dati.$jsArrayClose.$jsDatasetClose;
						}
					} else {
						$dati = '';
					
						foreach ($stats['periodo_corrente'] as $key => $value) {
							$time = strtotime($value['orders']['data_ordine'])*1000;
							
							if (!$y)
								$y = 'f';
								
							if ($y == 'f')
								$asse_y = $value[0]['totale'];
							else
								$asse_y = $value[0]['qta'];
							
							if ($dati != '')
								$dati .= ',';
							
							$dati .= "[".$time.",".$asse_y."]";
							
							$series['periodo_corrente'] = $jsDatasetOpen.'"serie":'.$jsArrayOpen.$dati.$jsArrayClose;
						}
					}
				}
				
				if (isset($stats['periodo_precedente'])) {
					$jsDatasetOpen = '{';
					$jsDatasetClose = '}';
					$jsArrayOpen = '[';
					$jsArrayClose = ']';
					$jsArray = '';

					if (isset($stats['periodo_precedente'][0]['customers']['regione'])) {
						$regioni = array();

						foreach ($stats['periodo_precedente'] as $key => $value) {
							$time = strtotime($value['orders']['data_ordine'])*1000;

							if (!$y)
								$y = 'f';

							if ($y == 'f')
								$asse_y = $value[0]['totale'];
							else
								$asse_y = $value[0]['qta'];

							if (!isset($regioni[$value['customers']['regione']]))
								$regioni[$value['customers']['regione']] = '';

							if ($regioni[$value['customers']['regione']] != '')
								$regioni[$value['customers']['regione']] .= ',';

							$regioni[$value['customers']['regione']] .= "[".$time.",".$asse_y."]";
						}

						$series['periodo_precedente'] = $jsDatasetOpen;
						
						foreach ($regioni as $regione => $dati) {
							if ($series['periodo_precedente'] != $jsDatasetOpen)
								$series['periodo_precedente'] .= ',';

							$series['periodo_precedente'] .= '"'.$regione.'":'.$jsDatasetOpen.'label:"'.$regione.'", data:'.$jsArrayOpen.$dati.$jsArrayClose.$jsDatasetClose;
						} 

						$series['periodo_precedente'] .= $jsDatasetClose;
					} else if (isset($stats['periodo_precedente'][0]['customers']['gruppi'])) { 
						$gruppi = array();

						foreach ($stats['periodo_precedente'] as $key => $value) {
							$time = strtotime($value['orders']['data_ordine'])*1000;

							if (!$y)
								$y = 'f';

							if ($y == 'f')
								$asse_y = $value[0]['totale'];
							else
								$asse_y = $value[0]['qta'];

							if (!isset($gruppi[$value['groups']['gruppo']]))
								$gruppi[$value['groups']['gruppo']] = '';
								
							if ($gruppi[$value['groups']['gruppo']] != '')
								$gruppi[$value['groups']['gruppo']] .= ',';
								
							$gruppi[$value['groups']['gruppo']] .= "[".$time.",".$asse_y."]";
						}

						$series['periodo_precedente'] = $jsDatasetOpen;

						foreach ($gruppi as $gruppo => $dati) {
							if ($series['periodo_precedente'] != $jsDatasetOpen)
								$series['periodo_precedente'] .= ',';

							$series['periodo_precedente'] .= '"'.$gruppo.'":'.$jsDatasetOpen.'label:"'.$gruppo.'", data:'.$jsArrayOpen.$dati.$jsArrayClose.$jsDatasetClose;
						}
						
						$series['periodo_precedente'] .= $jsDatasetClose;
					} else {
						$dati = '';
					
						foreach ($stats['periodo_precedente'] as $key => $value) {
							$time = strtotime($value['orders']['data_ordine'])*1000;
							
							if (!$y)
								$y = 'f';
								
							if ($y == 'f')
								$asse_y = $value[0]['totale'];
							else
								$asse_y = $value[0]['qta'];
							
							if ($dati != '')
								$dati .= ',';
							
							$dati .= "[".$time.",".$asse_y."]";
							
							$series['periodo_precedente'] = $jsDatasetOpen.'"serie":'.$jsArrayOpen.$dati.$jsArrayClose.$jsDatasetClose;
						}
					}
				} 
				
				$dati = $jsDatasetOpen.'"corrente":'.$series['periodo_corrente'].$jsDatasetClose;
				
				if (isset($stats['periodo_precedente'])) {
					$dati .= ', "precedente":'.$series['periodo_precedente'];
				}
				
				$dati .= $jsDatasetClose;

				return $dati;
			} else {
				$this->Session->setFlash("Intervallo date non valido", 'default', array('class' => 'flasherror'));
			}
		}
	}
}

?>