<?php
App::uses('AppController', 'Controller');
/**
 * Programs Controller
 *
 * @property Program $Program
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ProgramsController extends AppController {

	public function beforeFilter(){
		$this->set('title_for_layout', __('Programs'));
		$this->Auth->allow('index', 'add', 'view');
		parent::beforeFilter();
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
            $this->Paginator->settings = $this->Program->action($this->request->data);
            echo $this->Session->setFlash('Filtro definido!', 'layout/success');
        }
		$this->Program->recursive = 0;
		$this->set('programs', $this->Paginator->paginate());
                
                
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Program->exists($id)) {
			throw new NotFoundException(__('Inválido program'));
		}
		$options = array('conditions' => array('Program.' . $this->Program->primaryKey => $id));
		$this->set('program', $this->Program->find('first', $options));
	}


/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Program->create();
			if ($this->Program->save($this->request->data)) {
				$this->Session->setFlash(__('Foi salvo.'), 'layout/success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Não pôde ser salvo. Por favor, tente novamente.'), 'layout/error');
			}
		}
		$events = $this->Program->Event->find('list');
		$typeprograms = $this->Program->Typeprogram->find('list');
		$speakers = $this->Program->Speaker->find('list');
		$this->set(compact('events', 'typeprograms', 'speakers'));
	}


/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Program->exists($id)) {
			throw new NotFoundException(__('Inválido program'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Program->save($this->request->data)) {
				$this->Session->setFlash(__('Foi salvo.'), 'layout/success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Não pôde ser salvo. Por favor, tente novamente.'), 'layout/error');
			}
		} else {
			$options = array('conditions' => array('Program.' . $this->Program->primaryKey => $id));
			$this->request->data = $this->Program->find('first', $options);
		}
		$events = $this->Program->Event->find('list');
		$typeprograms = $this->Program->Typeprogram->find('list');
		$speakers = $this->Program->Speaker->find('list');
		$this->set(compact('events', 'typeprograms', 'speakers'));
	}
	

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Program->id = $id;
		if (!$this->Program->exists()) {
			throw new NotFoundException(__('Inválido program'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Program->delete()) {
	
			$this->Session->setFlash(__('Foi excluído.'), 'layout/success');
		} else {
			$this->Session->setFlash(__('Não foi excluído. Por favor, tente novamente.'), 'layout/error');
		}
		return $this->redirect(array('action' => 'index'));
	}}
