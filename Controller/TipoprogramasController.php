<?php
App::uses('AppController', 'Controller');
/**
 * Tipoprogramas Controller
 *
 * @property Tipoprograma $Tipoprograma
 */
class TipoprogramasController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Tipoprograma->recursive = 0;
		$this->set('tipoprogramas', $this->paginate());
	}
	public function admin_index() {
		$this->Tipoprograma->recursive = 0;
		$this->set('tipoprogramas', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Tipoprograma->exists($id)) {
			throw new NotFoundException(__('Inválido tipoprograma'));
		}
		$options = array('conditions' => array('Tipoprograma.' . $this->Tipoprograma->primaryKey => $id));
		$this->set('tipoprograma', $this->Tipoprograma->find('first', $options));
	}
	
	public function admin_view($id = null) {
		if (!$this->Tipoprograma->exists($id)) {
			throw new NotFoundException(__('Inválido tipoprograma'));
		}
		$options = array('conditions' => array('Tipoprograma.' . $this->Tipoprograma->primaryKey => $id));
		$this->set('tipoprograma', $this->Tipoprograma->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Tipoprograma->create();
			if ($this->Tipoprograma->save($this->request->data)) {
				$this->Session->setFlash(__('tipoprograma foi salvo'), 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('tipoprogramanão pôde ser salvo. Por favor, tente novamente.'));
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
		if (!$this->Tipoprograma->exists($id)) {
			throw new NotFoundException(__('Inválido tipoprograma'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Tipoprograma->save($this->request->data)) {
				$this->Session->setFlash(__('tipoprograma foi salvo'), 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('tipoprograma não pôde ser salvo. Por favor, tente novamente..'));
			}
		} else {
			$options = array('conditions' => array('Tipoprograma.' . $this->Tipoprograma->primaryKey => $id));
			$this->request->data = $this->Tipoprograma->find('first', $options);
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
		$this->Tipoprograma->id = $id;
		if (!$this->Tipoprograma->exists()) {
			throw new NotFoundException(__('Inválido tipoprograma'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Tipoprograma->delete()) {
			$this->Session->setFlash(__('Tipoprograma delete'), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Tipoprograma não foi excluída'));
		$this->redirect(array('action' => 'index'));
	}
}
