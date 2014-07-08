<?php
App::uses('AppController', 'Controller');
/**
 * Cursos Controller
 *
 * @property Curso $Curso
 */
class CursosController extends AppController {
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
		$this->Curso->recursive = 0;
		$this->set('cursos', $this->paginate());
	}
	
	public function admin_index() {
		$this->Curso->recursive = 0;
		$this->set('cursos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Curso->exists($id)) {
			throw new NotFoundException(__('Inválido curso'));
		}
		
		$cursos = $this->Curso->find('list');
		
		$options = array('conditions' => array('Curso.' . $this->Curso->primaryKey => $id));
		$curso = $this->Curso->find('first', $options);
		
		$this->set(compact('curso', 'cursos'));
	}
	
	public function admin_view($id = null) {
		if (!$this->Curso->exists($id)) {
			throw new NotFoundException(__('Inválido curso'));
		}
		$options = array('conditions' => array('Curso.' . $this->Curso->primaryKey => $id));
		$this->set('curso', $this->Curso->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Curso->create();
			if ($this->Curso->save($this->request->data)) {
				$this->Session->setFlash('Curso foi salvo', 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Curso não pôde ser salvo. Por favor, tente novamente.', 'error');
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
		if (!$this->Curso->exists($id)) {
			throw new NotFoundException(__('Inválido curso'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Curso->save($this->request->data)) {
				$this->Session->setFlash('Curso foi salvo', 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Curso não pôde ser salvo. Por favor, tente novamente..', 'error');
			}
		} else {
			$options = array('conditions' => array('Curso.' . $this->Curso->primaryKey => $id));
			$this->request->data = $this->Curso->find('first', $options);
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
		$this->Curso->id = $id;
		if (!$this->Curso->exists()) {
			throw new NotFoundException(__('Inválido curso'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Curso->delete()) {
			$this->Session->setFlash('Curso delete', 'success');
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Curso não foi excluída', 'error');
		return $this->redirect(array('action' => 'index'));
	}
}
