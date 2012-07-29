<?php 
/* SVN FILE: $Id$ */
/* AccountsController Test cases generated on: 2009-08-26 12:06:23 : 1251281183*/
App::import('Controller', 'Accounts');

class TestAccounts extends AccountsController {
	var $autoRender = false;
}

class AccountsControllerTest extends CakeTestCase {
	var $Accounts = null;

	function startTest() {
		$this->Accounts = new TestAccounts();
		$this->Accounts->constructClasses();
	}

	function testAccountsControllerInstance() {
		$this->assertTrue(is_a($this->Accounts, 'AccountsController'));
	}

//verifica se un utente è loggato e mostra i dati
    function testIndex() {	
		$result = $this->testAction('/accounts/index', array('return' => "vars"));    	
     	if($this->assertNotNull($result['user']['id'],"Utente non loggato"));		
		//debug($result); 
    }

//verifica che nessun utente sia loggato e aggiunge un nuovo account
	function testAdd() {
		$index = $this->testAction('/accounts/index', array('return' => "vars"));    	
     	if($this->assertNull($index['user']['id'],"Un utente loggato non puo' creare altri utenti")) {
			$data = array( 'Account' =>
			array(
				'id'  => 1000,
				'nome'  => 'Lorem ipsum dolor sit amet',
				'cognome'  => 'Lorem ipsum dolor sit amet',
				'username'  => 'mio69',
				'password'  => 'mio69',
				'attivo'  => 1,
				'email'  => 'Lfaorem@amet.iy',
				'account_type_id'  => 1));
			$result = $this->testAction('accounts/add', array('return' => "vars", 'data' => $data, 'method' => 'post'));
			$this->assertNotNull($result['name'], "Utente non Registrato");  
			//debug($result);   		
     	}

		//debug($index);
	}

//verifica se un utente è loggato e modifica le informazioni rigurdanti l'account.		
	function testEdit() {
		$index = $this->testAction('/accounts/index', array('return' => "vars"));
     	if($this->assertNotNull($index['user']['id'],"Nessun utente e' loggato")) {
			$data = array( 'Account' =>
			array(
				'nome'  => 'amet',
				'cognome'  => 'amet',
				'username'  => 'mio69',
				'password'  => 'mio89',
				'email'  => 'Lfaorem@amet.iy'));	
			$result = $this->testAction('accounts/edit/'.$index['user']['id'], array('return' => "vars", 'data' => $data, 'method' => 'post'));	
			//debug($result);				
		}
		//debug($index);
	}

//verifica se un utente è loggato e disattiva (ma non elimina) l'account.	
	function testDelete() {
		$index = $this->testAction('/accounts/index', array('return' => "vars"));
     	if($this->assertNotNull($index['user']['id'],"Nessun utente e' loggato")) {		  
			$result = $this->testAction('accounts/delete/'.$index['user']['id']);
			//debug($result);
		}

		//debug($index);
	}
	
	function endTest() {
		unset($this->Accounts);
	}
}
?>