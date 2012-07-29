<?php

class ProductCategoriesController extends AppController {
	var $name = 'ProductCategories';
	var $helpers = array('Form');
	
	function admin_index() {
		if (!empty($this->data)) {
			if (isset($this->data['ProductCategory']['action']['add']))
				$this->_add();
			elseif (isset($this->data['ProductCategory']['action']['edit']))
				$this->_edit();
			elseif (isset($this->data['ProductCategory']['action']['delete']))
				$this->_delete();
		}
	}
	
	function admin_showTree() {
		$this->layout = 'empty';
		$this->admin_getTreeDirectChildren(1);
		$this->autoRender = true;
	}
	
	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allowedActions = array('admin_showtree');
	}
	
	function _add() {
		$this->ProductCategory->create();
		
		$this->ProductCategory->set('name', $this->data['ProductCategory']['add']['name']);
		$this->ProductCategory->set('parent_id', $this->data['ProductCategory']['cat_id']);
		
		if ($this->ProductCategory->save())
			$this->Session->setFlash("Categoria creata con successo", 'default', array('class' => 'flashsuccess'));
		else
			$this->Session->setFlash("Errore nell'aggiunta della categoria. Riprovare", 'default', array('class' => 'flasherror'));
	}
	
	function _edit() {
		$this->ProductCategory->create();
		
		$this->ProductCategory->set('name', $this->data['ProductCategory']['edit']['name']);
		$this->ProductCategory->set('id', $this->data['ProductCategory']['cat_id']);
		
		if ($this->ProductCategory->save())
			$this->Session->setFlash("Categoria modificata con successo", 'default', array('class' => 'flashsuccess'));
		else
			$this->Session->setFlash("Errore nella modifica della categoria. Riprovare", 'default', array('class' => 'flasherror'));
	}
	
	function _delete() {
		if ($this->data['ProductCategory']['confirmDelete'] == 1) {
			if ($this->ProductCategory->del($this->data['ProductCategory']['cat_id']))
				$this->Session->setFlash('Categoria eliminata', 'default', array('class' => 'flashsuccess'));
		}
	}
	
	function admin_getTreeDirectChildren($id) {
		$this->autoRender = false;
		
		$directChildren = $this->ProductCategory->children($id, true);
		
		echo '<ul class="jqueryFileTree" style="display: none;">';
		foreach ($directChildren as $c) {
			echo '<li class="directory collapsed"><a href="#" rel="'.$c['ProductCategory']['id'].'">'.$c['ProductCategory']['name'].'</a></li>';
		}
		echo '</ul>';
	}
	
	function admin_sortCategories() {
		$this->autoRender = false;
		
		$this->ProductCategory->reorder(array('id' => 1, 'field' => 'name'));
		$this->Session->setFlash("Categorie riordinate per nome con successo", 'default', array('class' => 'flashsuccess'));
		$this->redirect(array('action' => 'index'));
	}
}
?>