<?php
class MailsController extends AppController {
	var $name = 'Mails';
	var $helpers = array('Html', 'Form', 'Javascript');
	var $components = array('Mailer'); 
	var $uses = array('Account', 'Customer');
	
	function admin_add(){
		if(!empty($this->data)){
			$errori = 0;
			
			if ($this->data['Mail']['oggetto'] == '') {
				$this->Session->setFlash('Uno o più campi non sono stati compilati.', 'default', array('class' => 'flasherror'));
				$this->set('erroreOggetto', 'errore');
				$errori = 1;
			}
			
			if ($this->data['Mail']['messaggio'] == '') {
				$this->Session->setFlash('Uno o più campi non sono stati compilati.', 'default', array('class' => 'flasherror'));
				$this->set('erroreMessaggio', 'errore');
				$errori = 1;
			}

			if ($errori != 1) {
				$destinations = array();
				$accounts = $this->Account->find('all');

				foreach($accounts as $account) {
					array_push($destinations, $account['Account']['email']);
				}
			
				$this->Mailer->to = $_SESSION['Auth']['Account']['email'];
				$this->Mailer->bcc = $destinations;
			
				$this->Mailer->subject = $this->data['Mail']['oggetto'];
			    $this->set('name', 'Clienti');
			    $this->set('email', 'lineraser@gmail.com');
			    $this->set('message', $this->data['Mail']['messaggio']);
			
		    	$this->Mailer->send($this->data['Mail']['messaggio']);
		
				if ($this->Mailer->smtpError)
					$this->Session->setFlash($this->Mailer->smtpError, 'default', array('class' => 'flasherror'));
				else {
					if(!empty($this->data)) {
						$this->Session->setFlash('Messaggio inviato correttamente', 'default', array('class' => 'flashsuccess'));
					}
				}
			}
		}
	}
}
?>