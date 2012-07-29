<?php
class ContactsController extends AppController {

	var $name = 'Contacts';
	var $helpers = array('Html', 'Form'); 
	var $uses=array();

	function index() { }
	
	function beforeFilter(){
		parent::beforeFilter(); 
		$this->Auth->allowedActions = array('index');
	}
	
} 
?>