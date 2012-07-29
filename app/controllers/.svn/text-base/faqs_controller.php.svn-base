<?php
class FaqsController extends AppController {

	var $name = 'Faqs';
	var $helpers = array('Html', 'Form'); 
	var $uses=array();
	
	function index() { }
	
	function beforeFilter(){
		parent::beforeFilter(); 
		$this->Auth->allowedActions = array('index');
	}
}

?>