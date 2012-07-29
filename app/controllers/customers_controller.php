<?php
class CustomersController extends AppController {

	var $name = 'Customers';
	var $helpers = array('Html', 'Form');
	var $components = array('Filesystem' => array('upload_size_limit' => 2097152),'Mailer');

	function admin_index() {
		$this->Customer->recursive = 0;
		$conditions = array();
		
		if (!isset($_SESSION['admin_customer_search']))
			$_SESSION['admin_customer_search'] = ' ';

		if (isset($this->params['named']['search'])) {
			$_SESSION['admin_customer_search'] = $this->params['named']['search'];
		} else {
			if (!isset($this->params['named']['page']))
				$_SESSION['admin_customer_search'] = ' ';
		}
		
		$conditions = array('1' => "1 AND ragione_sociale REGEXP '".addslashes($_SESSION['admin_customer_search'])."*'");
		
		$this->set('customers', $this->paginate('Customer', $conditions));
	}
	
	function admin_view() { }

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Cliente non trovato', 'default', array('class' => 'flashwarning'));
			$this->redirect(array('action'=>'index'));
		}
		
		if (!$this->_exists($id, $this, "Cliente non trovato"))
			$this->redirect(array('action' => 'index'));
			
		if (!empty($this->data)) {
			if ($this->Customer->save($this->data)) {
				$this->Session->setFlash('Cliente modificato con successo', 'default', array('class' => 'flashsuccess'));
				
				if (isset($this->data['deleteFile']) && $this->data['deleteFile'] != 0) {
					if (!$this->Filesystem->delete($this->data['deleteFile']))
						$this->Session->setFlash('Errore nella rimozione dell\'insegna.', 'default', array('class' => 'flasherror'));

					$this->data = $this->Customer->read(null, $id);
				}
				
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Errore nella modifica del cliente. Riprovare.', 'default', array('class' => 'flasherror'));
			}
		}
		
		if (empty($this->data)) {
			$this->data = $this->Customer->read(null, $id);
		}
		
		$filesystems = $this->Customer->Filesystem->findById($this->data['Customer']['filesystem_id'], 'id, file', null);
		$this->set('filesystem', $filesystems);
		
		$on_complete = '$("#CustomerFilesystemId").val((d));
						$("#CustomerEditForm").submit();';
		
		$this->set('css', $this->Filesystem->css());
		$this->set('scriptjs', $this->Filesystem->include_js());
		$this->set('script', $this->Filesystem->jquery_script('/js/jquery/plugins/uploadify/', '/img/uploads', '*.jpg;*.jpeg', 'false', '/admin/customers/upload_file', $on_complete));
		$this->set('upload_form', $this->Filesystem->form());
		
		$account = $this->Customer->Account->read(null, $this->data['Customer']['account_id']);
		$groups = $this->_resolveForeignKey($this->Customer, 'Group', array('id', 'gruppo'), 'gruppo ASC');
		$discountCodes = $this->_resolveForeignKey($this->Customer, 'DiscountCode', array('id', 'codice'), 'codice ASC');
		$this->set(compact('groups','discountCodes', 'account'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash('Cliente non trovato', 'default', array('class' => 'flashwarning'));
			$this->redirect(array('action'=>'index'));
		}
		
		if (!$this->_exists($id, $this, "Cliente non trovato"))
			$this->redirect(array('action' => 'index'));
		
		$customer_before_delete = $this->Customer->read(null, $id);
		
		if ($this->Customer->del($id)) {
			if (isset($customer_before_delete['Customer']['filesystem_id'])) 
				$this->Filesystem->delete($customer_before_delete['Customer']['filesystem_id']);
			
			$this->Session->setFlash('Cliente eliminato con successo', 'default', array('class' => 'flashsuccess'));
			$this->redirect(array('action'=>'index'));
		}
	}
	
	function admin_upload_file() {
		$this->autoRender = false;

		echo $this->Filesystem->process_upload();
	}
	
	function upload_file() {
		$this->autoRender = false;

		echo $this->Filesystem->process_upload();
	}
	
	function index($id = null) {
		if (!$id) {
			$this->Session->setFlash('Cliente non valido.');
			$this->redirect(array('action'=>'fail'));
		}
		$custom=$this->Customer->find(array('account_id'=>$id));
				
		$this->set('customer', $custom);
	}
	
	function add() {
		$groups = $this->_resolveForeignKey($this->Customer, 'Group', array('id', 'gruppo'), 'gruppo ASC');
		
		if(!empty($this->data)){
			$customer=$this->data;
			
			if(isset($_SESSION['AccountId']))
				$customer['Customer']['account_id']=$this->Session->read('AccountId');
			else
				if(isset($_SESSION['Account']))
					$customer['Customer']['account_id']=$_SESSION['Account']['id'];
			
				
					$this->Customer->create();
				
					if($this->Customer->save($customer)){
						
						$email=$_SESSION['Account']['email'];
						$name=$_SESSION['Account']['username'];
						$messaggio="Congratulazioni, la registrazione del PDV è andata a buon fine. Per l'attivazione dell'account, attendi la comunicazione di un operatore. Grazie";
						$this->Mailer->to = $email;
	
						$this->Mailer->subject = __("Registrazione PDV", true);
	
						$this->set('name',$name);
			  			$this->set('email', $email);
			    		$this->set('message', $messaggio);
						$this->Mailer->send($messaggio);
						$this->redirect(array('action' =>'success'));
					}
					else
						{
							$this->Session->setFlash('<h2 style="margin:40px 0 0 0";><img src="/img/icons/error.png" heigth="30" width="30"/> Registrazione Punto Vendita Fallita.</h2>');
							
							$this->redirect(array('action' =>'fail'));
						}

						
		}
		$account = $this->Customer->Account->read(null, $this->data['Customer']['account_id']);
		$groups2 = $this->_resolveForeignKey($this->Customer, 'Group', array('id', 'gruppo'), 'gruppo ASC');
		$discountCodes = $this->_resolveForeignKey($this->Customer, 'DiscountCode', array('id', 'codice'), 'codice ASC');
		$this->set(compact('groups','discountCodes', 'account'));
		
	}
	
	function success() {
		unset($_SESSION['Auth']);
		//dopo la registrazione, azzera la sessione;
	}
	

	function fail() {
		//va alla vista
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash('Cliente non trovato');
			$this->redirect(array('action'=>'index','id' => $id));
		}
		
		if (!$this->_exists($id, $this, "Cliente non trovato"))
			$this->redirect(array('action' => 'index','id' => $id));
			
		if (!empty($this->data)) {
			
			
			if ($this->Customer->save($this->data)) {
				$this->Session->setFlash('<h2 style="margin:40px 0 0 0";>Cliente modificato con successo</h2>');
				
				if (isset($this->data['deleteFile']) && $this->data['deleteFile'] != 0) {
					if (!$this->Filesystem->delete($this->data['deleteFile']))
						$this->Session->setFlash('Errore nella rimozione dell\'insegna.');

					$this->data = $this->Customer->read(null, $id);
				}
				
				$this->redirect(array('action' => 'index', 'id' => $_SESSION['Auth']['Account']['id']));
			} else {
				$this->redirect(array('action'=>'fail'));
			}
		}
		
		if (empty($this->data)) {
			$this->data = $this->Customer->read(null, $id);
		}
		
		$filesystems = $this->Customer->Filesystem->findById($this->data['Customer']['filesystem_id'], 'id, file', null);
		$this->set('filesystem', $filesystems);
		
		$on_complete = '$("#CustomerFilesystemId").val((d));
						$("#CustomerEditForm").submit();';
		
		$this->set('css', $this->Filesystem->css());
		$this->set('scriptjs', $this->Filesystem->include_js());
		$this->set('script', $this->Filesystem->jquery_script('/js/jquery/plugins/uploadify/', '/img/uploads', '*.jpg;*.jpeg', 'false', '/admin/customers/upload_file', $on_complete));
		$this->set('upload_form', $this->Filesystem->form());
		
		$account = $this->Customer->Account->read(null, $this->data['Customer']['account_id']);
		$groups = $this->_resolveForeignKey($this->Customer, 'Group', array('id', 'gruppo'), 'gruppo ASC');
		$discountCodes = $this->_resolveForeignKey($this->Customer, 'DiscountCode', array('id', 'codice'), 'codice ASC');
		$this->set(compact('groups','discountCodes', 'account'));

	}
	
	function beforeFilter() {
	    parent::beforeFilter(); 
	    $this->Auth->allowedActions = array('upload_file', 'admin_upload_file', 'add', 'success', 'fail');
	}
	
}
?>
