<?php
App::uses('AppController', 'Controller');
/**
 * Programas Controller
 *
 * @property Programa $Programa
 */
class ProgramasController extends AppController {
	public function beforeFilter() {
		parent::beforeFilter();
		$this -> Auth -> allow('index', 'view', 'requestIndex');
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Programa->recursive = 0;		
		$this->paginate = array(
			'order' => array(
				'Programa.horario_id' => 'asc'
			)
		);
		$programas = $this->paginate();

		if($this->request->is('requested')){
			return $programas;
		}else{			
			$this->set(compact('programas'));
		}
	}
	
	public function admin_index() {
		$this->Programa->recursive = 0;
		$this->set('programas', $this->paginate());
	}
	
	public function requestIndex() {
		$programas = $this->Programa -> find('list');
		return $programas;
	}	

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Programa->exists($id)) {
			throw new NotFoundException(__('Inválido programa'));
		}
		$options = array('conditions' => array('Programa.' . $this->Programa->primaryKey => $id));
		$this->set('programa', $this->Programa->find('first', $options));
	}
	
	public function admin_view($id = null) {
		if (!$this->Programa->exists($id)) {
			throw new NotFoundException(__('Inválido programa'));
		}
		$options = array('conditions' => array('Programa.' . $this->Programa->primaryKey => $id));
		$this->set('programa', $this->Programa->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Programa->create();
			if ($this->Programa->save($this->request->data)) {
				$this->Session->setFlash('Programa foi salvo', 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Programa não pôde ser salvo. Por favor, tente novamente.', 'error');
			}
		}
		$events = $this->Programa->Event->find('list');
		$tipoprogramas = $this->Programa->Tipoprograma->find('list');
		$horarios = $this->Programa->Horario->find('list', array('order' => array('Horario.inicio' => 'ASC')));
		$palestrantes = $this->Programa->Palestrante->find('list');
		$this->set(compact('events', 'holdings', 'horarios', 'palestrantes', 'tipoprogramas'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	
	public function admin_edit($id = null) {
		if (!$this->Programa->exists($id)) {
			throw new NotFoundException(__('Inválido programa'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Programa->save($this->request->data)) {
				$this->Session->setFlash('Programa foi salvo', 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Programa não pôde ser salvo. Por favor, tente novamente.', 'error');
			}
		} else {
			$options = array('conditions' => array('Programa.' . $this->Programa->primaryKey => $id));
			$this->request->data = $this->Programa->find('first', $options);
		}
		$events = $this->Programa->Event->find('list');
		$tipoprogramas = $this->Programa->Tipoprograma->find('list');
		$horarios = $this->Programa->Horario->find('list', array('order' => array('Horario.inicio' => 'ASC')));
		$palestrantes = $this->Programa->Palestrante->find('list');
		$this->set(compact('events', 'tipoprogramas', 'horarios', 'palestrantes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Programa->id = $id;
		if (!$this->Programa->exists()) {
			throw new NotFoundException(__('Inválido programa'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Programa->delete()) {
			$this->Session->setFlash('Programa excluído', 'success');
			return $this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Programa não foi excluído', 'error');
		return $this->redirect(array('action' => 'index'));
	}
}
