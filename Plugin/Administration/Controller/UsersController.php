<?php
App::uses('AdministrationAppController', 'Administration.Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AdministrationAppController {

	public function beforeFilter(){
		parent::beforeFilter();
		$this->set('title_for_layout', __('Users'));
	}

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		if ($this->request->is('post')) {
            $this->Paginator->settings = $this->User->action($this->request->data);
            echo $this->Session->setFlash('Filtro definido!', 'success');
        }
		$this->User->recursive = 0;
		$this->set('users', $this->Paginator->paginate());
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Inválido user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}


/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('Foi salvo.'), 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Não pôde ser salvo. Por favor, tente novamente.'), 'error');
			}
		}
		$groups = $this->User->Group->find('list');
		$cursos = $this->User->Curso->find('list');
		$sexos = $this->User->Sexo->find('list');
		$messages = $this->User->Message->find('list');
		$this->set(compact('groups', 'cursos', 'sexos', 'messages'));
	}


/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Inválido user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('Foi salvo.'), 'success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Não pôde ser salvo. Por favor, tente novamente.'), 'error');
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$groups = $this->User->Group->find('list');
		$cursos = $this->User->Curso->find('list');
		$sexos = $this->User->Sexo->find('list');
		$messages = $this->User->Message->find('list');
		$this->set(compact('groups', 'cursos', 'sexos', 'messages'));
	}
	

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Inválido user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
	
			$this->Session->setFlash(__('Foi excluído.'), 'success');
		} else {
			$this->Session->setFlash(__('Não foi excluído. Por favor, tente novamente.'), 'error');
		}
		return $this->redirect(array('action' => 'index'));
	}}
