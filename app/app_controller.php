<?php
class AppController extends Controller {
	var $components = array('Acl', 'Auth', 'RequestHandler', 'Mailer');
	var $helpers = array('Html','Javascript');
	
	function beforeFilter() {
		$this->Auth->userModel = 'Account';
		$this->Auth->userScope = array('Account.attivo' => '1'); 
		$this->Auth->fields = array('username' => 'username', 'password' => 'password');
		
		$this->Auth->actionPath = 'controllers/';
		$this->Auth->authorize = 'actions';
		
		$this->Auth->loginError = 'Username o password non validi.';
				
		if (!empty($this->params['admin']) && $this->params['admin'] == 1) {
			$this->layout = 'admin';
			$this->Auth->loginAction = '/admin/login';
			$this->Auth->authError = 'Non hai diritti sufficienti per la visualizzazione della pagina.';
		} else {
			$this->Auth->authError = 'Per visualizzare la pagina è necessario inserire nome utente e password.';
			$this->Auth->loginAction = '/login';
		}
		
		$this->Auth->logoutRedirect = '/';
	}
	
	function _exists($id, &$controller, $message) {
		$model = $controller->modelNames[0];
		
		if ($id) {
			$entry = $controller->$model->findById($id);
			
			if (empty($entry)) {
				$this->Session->setFlash($message, 'default', array('class' => 'flashwarning'));
				
				return false;
			}
		}
		
		return true;
	}
	
	function _resolveForeignKey(&$controller, $model, $fields_array, $orderby) {
		$fields = "";

		foreach ($fields_array as $key => $field) {
			$fields .= $field;
			
			if (count($fields_array) != $key + 1)
				$fields .= ', ';
		}
		
		$fks = $controller->$model->find('all', $fields,  $orderby);
		$fks = Set::combine($fks, '{n}.'.ucfirst($model).'.id', '{n}.'.ucfirst($model).'.'.$fields_array[1]);

		return $fks;
	}
	
	function beforeRender(){
		$categorie = ClassRegistry::init("ProductCategory");
		$this->set('frontmenu', $categorie->children(1,true));
	}
}
?>