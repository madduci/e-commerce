<?php
class AccountsController extends AppController {
	var $name = 'Accounts';
	var $helpers = array('Html', 'Form');
	var $components=array('Mailer');
	var $user=array();
	
	function admin_index() {
		$this->Account->recursive = 0;
		$conditions = array();
		
		if (!isset($_SESSION['admin_account_search']))
			$_SESSION['admin_account_search'] = ' ';

		if (isset($this->params['named']['search'])) {
			$_SESSION['admin_account_search'] = $this->params['named']['search'];
		} else {
			if (!isset($this->params['named']['page']))
				$_SESSION['admin_account_search'] = ' ';
		}
		
		$conditions = array('1' => "1 AND username REGEXP '".addslashes($_SESSION['admin_account_search'])."'");
		
		$this->set('accounts', $this->paginate('Account', $conditions));
	}
	
	function admin_view() { }

	function admin_add() {
		if (!empty($this->data)) {
			
			$this->Account->create();
			
			if ($this->Account->save($this->data)) {
				$this->Session->setFlash('Account creato con successo', 'default', array('class' => 'flashsuccess'));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Errore nell\'aggiunta dell\'account. Riprovare.', 'default', array('class' => 'flasherror'));
			}
		}

		$this->set('accountTypes', $this->_resolveForeignKey($this->Account, 'AccountType', array('id', 'descrizione'), 'descrizione ASC'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Account non trovato', 'default', array('class' => 'flashwarning'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!$this->_exists($id, $this, "Account non trovato"))
			$this->redirect(array('action' => 'index'));
		
		if (!empty($this->data)) {
			if ($this->Account->save($this->data)) {
				if ($this->data['Account']['attivo'] == 1)
					$messaggio = "Il suo account e' stato attivato.";
				else
					$messaggio = "Il suo account e' stato disattivato.";
				
				$this->Mailer->to = $this->data['Account']['email'];
				$this->Mailer->subject = "Avviso di modifica account";
				
				$this->set('email', $this->data['Account']['email']);
				$this->set('message', $messaggio);
				
				$this->Mailer->send($messaggio);
				
				$this->Session->setFlash('Account modificato con successo', 'default', array('class' => 'flashsuccess'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Errore nella modifica dell\'account. Riprovare.', 'default', array('class' => 'flasherror'));
			}
		}
		
		if (empty($this->data)) {
			$this->data = $this->Account->read(null, $id);
		}
		
		$this->set('accountTypes', $this->_resolveForeignKey($this->Account, 'AccountType', array('id', 'descrizione'), 'descrizione ASC'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Account non trovato', 'default', array('class' => 'flashwarning'));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!$this->_exists($id, $this, "Account non trovato"))
			$this->redirect(array('action' => 'index'));
		
		if ($id != 1) {
			if ($this->Account->del($id)) {
				$this->Session->setFlash('Account eliminato con successo', 'default', array('class' => 'flashsuccess'));
				$this->redirect(array('action' => 'index'));
			}
		} else {
			$this->Session->setFlash("Questo account non è possibile eliminarlo.", 'default', array('class' => 'flasherror'));
			$this->redirect(array('controller' => 'accounts', 'action' => 'index'));
		}
	}
	
	function admin_login() { }
	
	function login() { }
	
	function logout() {
		unset($_SESSION['Auth']);
		$this->redirect($this->Auth->logout());
	}

	function beforeFilter(){
		parent::beforeFilter(); 
		$this->Auth->allowedActions = array('add', 'login', 'logout');
	}

	//pagina utente
	function index() {
		$this->user=$this->Session->read('Auth');
		
		if(!empty($this->user)) {
				$this->user=$this->user['Account'];
				$this->set('user',$this->user);
		} else
			$this->redirect($this->Auth->logout()); //se non c'è login, passa alla home page
	
	}
	
	function add(){
		if(!empty($this->data)){
			
			//è un cliente!		
			$this->data['Account']['account_type_id'] = 3;
			
			$this->Account->create();
			
				if($this->Account->save($this->data)){
					$idaccount=$this->Account->getLastInsertId();
					$this->Session->write('AccountId',$idaccount);
					$this->data['Account']['id']=$idaccount;
					$this->Session->write('Account',$this->data['Account']);
					$email=$this->data['Account']['email'];
					$name=$this->data['Account']['username'];
					$messaggio="Congratulazioni, la registrazione è andata a buon fine. Per l'attivazione dell'account, attendi la comunicazione di un operatore. Grazie";
					$this->Mailer->to = $email;

					$this->Mailer->subject = __("Registrazione ", true);

					$this->set('name',$name);
		  			$this->set('email', $email);
		    		$this->set('message', $messaggio);
					$this->Mailer->send($messaggio);
					
					$this->Session->setFlash('<h2 style="margin:40px 0 0 0";><img src="/img/icons/Checked.png" heigth="30" width="30"/> Registrazione Account completata.</h2>');
					
					$this->redirect("/Customers/add");
					
					}
				else
					$this->Session->setFlash('<h2 style="margin:40px 0 0 0";><img src="/img/icons/error.png" heigth="30" width="30"/> Registrazione Account fallita.</h2>');
		}
		
		
	}
	
	function edit($id = null) {
		
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Account non trovato');
			$this->redirect(array('action'=>'index'));
		}
		
		if (!$this->_exists($id, $this, "Account non trovato"))
			$this->redirect(array('action' => 'index'));
		
		if (!empty($this->data)) {
			$this->data['Account']['password'] = (Security::hash($this->data['Account']['password'], 'sha1', true) );
			$this->data['Account']['account_type_id'] = 3;
			if ($this->Account->save($this->data)) {
				$this->Session->setFlash('<br/><p style="font-size:16px;color:#000">Account modificato con successo</p>');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('Errore nella modifica dell\'account. Riprovare.');
			}
		}
		
		if (empty($this->data)) {
			$this->data = $this->Account->read(null, $id);
		}
		
		$this->set('accountTypes', $this->_resolveForeignKey($this->Account, 'AccountType', array('id', 'descrizione'), 'descrizione ASC'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Account non trovato');
			$this->Session->destroy();
			$this->redirect("/");
			
		}
		
		if (!$this->_exists($id, $this, "Account non trovato")){
			$this->Session->destroy();
			$this->redirect("/");
			}
			
		$account=$this->Account->findById($id);
		$account['Account']['attivo'] = 0;
		
		if($this->Account->save($account)){		
			$this->Session->setFlash('<h2 style="margin:60px 0 0 0;"><img src="/img/icons/Checked.png" heigth="30" width="30"/>Account eliminato con successo</h2>');
			
			$this->redirect(array('action'=>'success'));
		}
	}
	
	function success (){ }
}
?>
