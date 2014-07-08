<?php
App::uses('AppController', 'Controller');
/**
 * Palestrantes Controller
 *
 * @property Palestrante $Palestrante
 */
class PalestrantesController extends AppController {
	public function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('index', 'view');
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Palestrante->recursive = 1;
		$this->set('palestrantes', $this->paginate());
	}
	
	public function admin_index() {
		$this->Palestrante->recursive = 0;
		$this->set('palestrantes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Palestrante->exists($id)) {
			throw new NotFoundException(__('Inválido palestrante'));
		}
		$options = array('conditions' => array('Palestrante.' . $this->Palestrante->primaryKey => $id));
		$this->set('palestrante', $this->Palestrante->find('first', $options));
	}
	
	public function admin_view($id = null) {
		if (!$this->Palestrante->exists($id)) {
			throw new NotFoundException(__('Inválido palestrante'), 'success');
		}
		$options = array('conditions' => array('Palestrante.' . $this->Palestrante->primaryKey => $id));
		$this->set('palestrante', $this->Palestrante->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Palestrante->create();
			if ($this->Palestrante->save($this->request->data)) {
				$this->Session->setFlash(__('palestrante foi salvo'), 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('palestrantenão pôde ser salvo. Por favor, tente novamente.'));
			}
		}
		$programas = $this->Palestrante->Programa->find('list', array('order' => 'nome', 'conditions' => array('Programa.status' => true)));
		//pr($programas); exit;
		$this->set(compact('programas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	
	public function admin_edit($id = null) {
		if (!$this->Palestrante->exists($id)) {
			throw new NotFoundException(__('Inválido palestrante'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Palestrante->save($this->request->data)) {
				$this->Session->setFlash(__('palestrante foi salvo'), 'success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('palestrante não pôde ser salvo. Por favor, tente novamente..'));
			}
		} else {
			$options = array('conditions' => array('Palestrante.' . $this->Palestrante->primaryKey => $id));
			$this->request->data = $this->Palestrante->find('first', $options);
		}
		$programas = $this->Palestrante->Programa->find('list');
		$this->set(compact('programas'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Palestrante->id = $id;
		if (!$this->Palestrante->exists()) {
			throw new NotFoundException(__('Inválido palestrante'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Palestrante->delete()) {
			$this->Session->setFlash(__('Palestrante delete'), 'success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Palestrante não foi excluída'));
		$this->redirect(array('action' => 'index'));
	}
}
