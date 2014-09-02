<?php
App::uses('AppController', 'Controller');
/**
 * Typeprograms Controller
 *
 * @property Typeprogram $Typeprogram
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TypeprogramsController extends AppController {

	public function beforeFilter(){
		$this->set('title_for_layout', __('Typeprograms'));
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
            $this->Paginator->settings = $this->Typeprogram->action($this->request->data);
            echo $this->Session->setFlash('Filtro definido!', 'layout/success');
        }
		$this->Typeprogram->recursive = 0;
		$this->set('typeprograms', $this->Paginator->paginate());
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Typeprogram->exists($id)) {
			throw new NotFoundException(__('Inválido typeprogram'));
		}
		$options = array('conditions' => array('Typeprogram.' . $this->Typeprogram->primaryKey => $id));
		$this->set('typeprogram', $this->Typeprogram->find('first', $options));
	}


/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Typeprogram->create();
			if ($this->Typeprogram->save($this->request->data)) {
				$this->Session->setFlash(__('Foi salvo.'), 'layout/success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Não pôde ser salvo. Por favor, tente novamente.'), 'layout/error');
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
	public function edit($id = null) {
		if (!$this->Typeprogram->exists($id)) {
			throw new NotFoundException(__('Inválido typeprogram'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Typeprogram->save($this->request->data)) {
				$this->Session->setFlash(__('Foi salvo.'), 'layout/success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Não pôde ser salvo. Por favor, tente novamente.'), 'layout/error');
			}
		} else {
			$options = array('conditions' => array('Typeprogram.' . $this->Typeprogram->primaryKey => $id));
			$this->request->data = $this->Typeprogram->find('first', $options);
		}
	}
	

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Typeprogram->id = $id;
		if (!$this->Typeprogram->exists()) {
			throw new NotFoundException(__('Inválido typeprogram'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Typeprogram->delete()) {
	
			$this->Session->setFlash(__('Foi excluído.'), 'layout/success');
		} else {
			$this->Session->setFlash(__('Não foi excluído. Por favor, tente novamente.'), 'layout/error');
		}
		return $this->redirect(array('action' => 'index'));
	}}
