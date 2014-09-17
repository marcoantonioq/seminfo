<?php
App::uses('AppController', 'Controller');
/**
 * Speakers Controller
 *
 * @property Speaker $Speaker
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SpeakersController extends AppController {

	public function beforeFilter(){
		$this->set('title_for_layout', __('Speakers'));
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
            $this->Paginator->settings = $this->Speaker->action($this->request->data);
            echo $this->Session->setFlash('Filtro definido!', 'layout/success');
        }
		$this->Speaker->recursive = 0;
		$this->set('speakers', $this->Paginator->paginate());
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Speaker->exists($id)) {
			throw new NotFoundException(__('Inválido speaker'));
		}
		$options = array('conditions' => array('Speaker.' . $this->Speaker->primaryKey => $id));
		$this->set('speaker', $this->Speaker->find('first', $options));
                
	}


/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Speaker->create();
			if ($this->Speaker->save($this->request->data)) {
				$this->Session->setFlash(__('Foi salvo.'), 'layout/success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Não pôde ser salvo. Por favor, tente novamente.'), 'layout/error');
			}
		}
		$programs = $this->Speaker->Program->find('list');
		$this->set(compact('programs'));
	}


/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Speaker->exists($id)) {
			throw new NotFoundException(__('Inválido speaker'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Speaker->save($this->request->data)) {
				$this->Session->setFlash(__('Foi salvo.'), 'layout/success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Não pôde ser salvo. Por favor, tente novamente.'), 'layout/error');
			}
		} else {
			$options = array('conditions' => array('Speaker.' . $this->Speaker->primaryKey => $id));
			$this->request->data = $this->Speaker->find('first', $options);
		}
		$programs = $this->Speaker->Program->find('list');
		$this->set(compact('programs'));
	}
	

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Speaker->id = $id;
		if (!$this->Speaker->exists()) {
			throw new NotFoundException(__('Inválido speaker'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Speaker->delete()) {
	
			$this->Session->setFlash(__('Foi excluído.'), 'layout/success');
		} else {
			$this->Session->setFlash(__('Não foi excluído. Por favor, tente novamente.'), 'layout/error');
		}
		return $this->redirect(array('action' => 'index'));
	}}
