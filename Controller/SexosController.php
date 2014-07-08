<?php
App::uses('AppController', 'Controller');
/**
 * Sexos Controller
 *
 * @property Sexo $Sexo
 */
class SexosController extends AppController {
	public function beforeFilter(){
		parent::beforeFilter();
        //$this->Auth->allow('login', 'logout', 'add');
	}
/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Sexo->recursive = -1;
		$this->set('sexos', $this->paginate());
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Sexo->create();
			if ($this->Sexo->save($this->request->data)) {
				$this->Session->setFlash(__('sexo foi salvo'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('sexonão pôde ser salvo. Por favor, tente novamente.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Sexo->exists($id)) {
			throw new NotFoundException(__('Inválido sexo'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Sexo->save($this->request->data)) {
				$this->Session->setFlash(__('sexo foi salvo'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('sexo não pôde ser salvo. Por favor, tente novamente..'));
			}
		} else {
			$options = array('conditions' => array('Sexo.' . $this->Sexo->primaryKey => $id));
			$this->request->data = $this->Sexo->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Sexo->id = $id;
		if (!$this->Sexo->exists()) {
			throw new NotFoundException(__('Inválido sexo'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Sexo->delete()) {
			$this->Session->setFlash(__('Sexo delete'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Sexo não foi excluída'));
		$this->redirect(array('action' => 'index'));
	}
}
