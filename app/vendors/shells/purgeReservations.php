<?php
# string crontab
# 0 0 * * * <percorso assoluto cake>/app/vendors/cakeshell purgeReservations -cli /usr/bin -console <percorso assoluto cake>/cake/console -app <percorso assoluto cake>/app >>~/cronlog.log

class PurgeReservationsShell extends Shell {
	var $uses = array('Reservations', 'Offer', 'ProductReservation');
	
	function main() {
		$conditions = " NOW() between inizio and fine";
		$offers = $this->Offer->find('all', array('conditions' => array('NOW() between inizio and fine AND offer_type_id = 1')));
		$this->ProductReservation->bindModel(array('hasOne'=>array('Product' =>array(
		 		'foreignKey'=> false, 
				'type'=>'INNER','conditions'=>array('OffersProduct.product_id = Product.id')))));
		
		foreach ($offers as $offer) {
			$diff = $this->dateDiff($offer['Offer']['inizio'], time());
			
			if ($diff > 3.0) {
				$reservations = $this->Reservations->query("select r.id as reservation_id from offers as o, offers_products as op, product_reservations as pr, reservations as r where o.id = op.offer_id and op.id = pr.offers_product_id and pr.reservation_id = r.id and o.id = ".$offer['Offer']['id']." group by r.id");
				
				foreach ($reservations as $reservation) {
					$this->Reservations->deleteAll(array('id' => $reservation['r']['reservation_id']), true);
					$this->ProductReservation->deleteAll(array('reservation_id' => $reservation['r']['reservation_id']), true);
				}
			}
		}
		
		if (empty($offers))
			$this->out("Nessun periodo promozionale individuato.\n");

		$this->out("\n\nComando eseguito con successo.");
	}
	
	function dateDiff($endDate, $beginDate) {
		return ($beginDate - (strtotime($endDate)))/86400;
	}
}
?>