<?php
App::uses('AppController', 'Controller');
/**
 * ProgramasPalestrantes Controller
 *
 * @property ProgramasPalestrante $ProgramasPalestrante
 */
class ProgramasPalestrantesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ProgramasPalestrante->recursive = 0;
		$this->set('programasPalestrantes', $this->paginate());
	}
	
	public function admin_index() {
		$this->ProgramasPalestrante->recursive = 0;
		$this->set('programasPalestrantes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ProgramasPalestrante->exists($id)) {
			throw new NotFoundException(__('Inválido programas palestrante'));
		}
		$options = array('conditions' => array('ProgramasPalestrante.' . $this->ProgramasPalestrante->primaryKey => $id));
		$this->set('programasPalestrante', $this->ProgramasPalestrante->find('first', $options));
	}
	
	public function admin_view($id = null) {
		if (!$this->ProgramasPalestrante->exists($id)) {
			throw new NotFoundException(__('Inválido programas palestrante'));
		}
		$options = array('conditions' => array('ProgramasPalestrante.' . $this->ProgramasPalestrante->primaryKey => $id));
		$this->set('programasPalestrante', $this->ProgramasPalestrante->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->ProgramasPalestrante->create();
			if ($this->ProgramasPalestrante->save($this->request->data)) {
				$this->Session->setFlash(__('programas palestrante foi salvo'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('programas palestrantenão pôde ser salvo. Por favor, tente novamente.'));
			}
		}
		$programas = $this->ProgramasPalestrante->Programa->find('list');
		$palestrantes = $this->ProgramasPalestrante->Palestrante->find('list');
		$this->set(compact('programas', 'palestrantes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->ProgramasPalestrante->exists($id)) {
			throw new NotFoundException(__('Inválido programas palestrante'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ProgramasPalestrante->save($this->request->data)) {
				$this->Session->setFlash(__('programas palestrante foi salvo'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('programas palestrante não pôde ser salvo. Por favor, tente novamente..'));
			}
		} else {
			$options = array('conditions' => array('ProgramasPalestrante.' . $this->ProgramasPalestrante->primaryKey => $id));
			$this->request->data = $this->ProgramasPalestrante->find('first', $options);
		}
		$programas = $this->ProgramasPalestrante->Programa->find('list');
		$palestrantes = $this->ProgramasPalestrante->Palestrante->find('list');
		$this->set(compact('programas', 'palestrantes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->ProgramasPalestrante->id = $id;
		if (!$this->ProgramasPalestrante->exists()) {
			throw new NotFoundException(__('Inválido programas palestrante'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ProgramasPalestrante->delete()) {
			$this->Session->setFlash(__('Palestrante em programas apagado'));
			$this->redirect($this->referer());
		}
		$this->Session->setFlash(__('Palestrante em programas não foi apagado'));
		$this->redirect($this->referer());
	}
}
