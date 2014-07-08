<?php
App::uses('AppController', 'Controller');
/**
 * Links Controller
 *
 * @property Link $Link
 */
class LinksController extends AppController {
	

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Link->recursive = 0;
		$this->set('links', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Link->exists($id)) {
			throw new NotFoundException(__('Inválido link'));
		}
		$options = array('conditions' => array('Link.' . $this->Link->primaryKey => $id));
		$this->set('link', $this->Link->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Link->create();
			if ($this->Link->save($this->request->data)) {
				$this->Session->setFlash(__('link foi salvo'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('linknão pôde ser salvo. Por favor, tente novamente.'));
			}
		}
		$parentLinks = $this->Link->find('list');
		$menus = $this->Link->Menu->find('list');
		$this->set(compact('parentLinks', 'menus'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Link->exists($id)) {
			throw new NotFoundException(__('Inválido link'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Link->save($this->request->data)) {
				$this->Session->setFlash(__('link foi salvo'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('link não pôde ser salvo. Por favor, tente novamente..'));
			}
		} else {
			$options = array('conditions' => array('Link.' . $this->Link->primaryKey => $id));
			$this->request->data = $this->Link->find('first', $options);
		}
		$parentLinks = $this->Link->ParentLink->find('list');
		$menus = $this->Link->Menu->find('list');
		$this->set(compact('parentLinks', 'menus'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Link->id = $id;
		if (!$this->Link->exists()) {
			throw new NotFoundException(__('Inválido link'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Link->delete()) {
			$this->Session->setFlash(__('Link delete'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Link não foi excluída'));
		$this->redirect(array('action' => 'index'));
	}
}
