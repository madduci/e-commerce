<?php
class FlyersController extends AppController {

	var $name = 'Flyers'; 
	var $helpers = array('Html', 'Form'); 
	var $uses=array('Product','Offer','OffersProduct');

	function index() {
		$customer=$_SESSION['Customer'];
		
		$query=$this->Offer->query("SELECT * from offers WHERE inizio <= now() AND now() <= fine AND offer_type_id=2 AND groups_id=".$customer['Customer']['group_id']."");
		

		if(!empty($query)) {
			$offer['Offer']=$query[0]['offers'];


			$this->Offer->findById($offer['Offer']['id']);
			
			$this->set('products',$this->paginate('Offer',array('Offer.id'=>$offer['Offer']['id'])));
		}
	}
}

?>
