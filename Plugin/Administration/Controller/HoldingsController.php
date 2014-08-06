<?php
App::uses('AdministrationAppController', 'Administration.Controller');
/**
 * Holdings Controller
 *
 * @property Holding $Holding
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class HoldingsController extends AdministrationAppController {

	public function beforeFilter(){
		parent::beforeFilter();
		$this->set('title_for_layout', __('Holdings'));
	}

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		if ($this->request->is('post')) {
            $this->Paginator->settings = $this->Holding->action($this->request->data);
            echo $this->Session->setFlash('Filtro definido!', 'success');
        }
		$this->Holding->recursive = 0;
		$this->set('holdings', $this->Paginator->paginate());
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Holding->exists($id)) {
			throw new NotFoundException(__('Inválido holding'));
		}
		$options = array('conditions' => array('Holding.' . $this->Holding->primaryKey => $id));
		$this->set('holding', $this->Holding->find('first', $options));
	}


/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Holding->create();
			if ($this->Holding->save($this->request->data)) {
				$this->Session->setFlash(__('Foi salvo.'), 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Não pôde ser salvo. Por favor, tente novamente.'), 'error');
			}
		}
		$users = $this->Holding->User->find('list');
		$programs = $this->Holding->Program->find('list');
		$this->set(compact('users', 'programs'));
	}


/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Holding->exists($id)) {
			throw new NotFoundException(__('Inválido holding'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Holding->save($this->request->data)) {
				$this->Session->setFlash(__('Foi salvo.'), 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Não pôde ser salvo. Por favor, tente novamente.'), 'error');
			}
		} else {
			$options = array('conditions' => array('Holding.' . $this->Holding->primaryKey => $id));
			$this->request->data = $this->Holding->find('first', $options);
		}
		$users = $this->Holding->User->find('list');
		$programs = $this->Holding->Program->find('list');
		$this->set(compact('users', 'programs'));
	}
	

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Holding->id = $id;
		if (!$this->Holding->exists()) {
			throw new NotFoundException(__('Inválido holding'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Holding->delete()) {
	
			$this->Session->setFlash(__('Foi excluído.'), 'success');
		} else {
			$this->Session->setFlash(__('Não foi excluído. Por favor, tente novamente.'), 'error');
		}
		return $this->redirect(array('action' => 'index'));
	}}
