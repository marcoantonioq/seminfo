<?php
App::uses('AppController', 'Controller');
/**
 * Links Controller
 *
 * @property Link $Link
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class LinksController extends AppController {

	public function beforeFilter(){
		$this->set('title_for_layout', __('Links'));
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
            $this->Paginator->settings = $this->Link->action($this->request->data);
            echo $this->Session->setFlash('Filtro definido!', 'layout/success');
        }
		$this->Link->recursive = 0;
		$this->set('links', $this->Paginator->paginate());
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Link->exists($id)) {
			throw new NotFoundException(__('Inválido link'));
		}
		$options = array('conditions' => array('Link.' . $this->Link->primaryKey => $id));
		$this->set('link', $this->Link->find('first', $options));
	}


/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Link->create();
			if ($this->Link->save($this->request->data)) {
				$this->Session->setFlash(__('Foi salvo.'), 'layout/success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Não pôde ser salvo. Por favor, tente novamente.'), 'layout/error');
			}
		}
		$parentLinks = $this->Link->ParentLink->find('list');
		$menus = $this->Link->Menu->find('list');
		$this->set(compact('parentLinks', 'menus'));
	}


/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Link->exists($id)) {
			throw new NotFoundException(__('Inválido link'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Link->save($this->request->data)) {
				$this->Session->setFlash(__('Foi salvo.'), 'layout/success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Não pôde ser salvo. Por favor, tente novamente.'), 'layout/error');
			}
		} else {
			$options = array('conditions' => array('Link.' . $this->Link->primaryKey => $id));
			$this->request->data = $this->Link->find('first', $options);
		}
		$parentLinks = $this->Link->ParentLink->find('list');
		$menus = $this->Link->Menu->find('list');
		$this->set(compact('parentLinks', 'menus'));
	}
	

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Link->id = $id;
		if (!$this->Link->exists()) {
			throw new NotFoundException(__('Inválido link'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Link->delete()) {
	
			$this->Session->setFlash(__('Foi excluído.'), 'layout/success');
		} else {
			$this->Session->setFlash(__('Não foi excluído. Por favor, tente novamente.'), 'layout/error');
		}
		return $this->redirect(array('action' => 'index'));
	}}
