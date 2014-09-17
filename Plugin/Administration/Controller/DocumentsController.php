<?php
App::uses('AdministrationAppController', 'Administration.Controller');
/**
 * Documents Controller
 *
 * @property Document $Document
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class DocumentsController extends AdministrationAppController {

	public function beforeFilter(){
		$this->set('title_for_layout', __('Documents'));
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
            $this->Paginator->settings = $this->Document->action($this->request->data);
            echo $this->Session->setFlash('Filtro definido!', 'layout/success');
        }
		$this->Document->recursive = 0;
		$this->set('documents', $this->Paginator->paginate());
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Document->exists($id)) {
			throw new NotFoundException(__('Inválido document'));
		}
		$options = array('conditions' => array('Document.' . $this->Document->primaryKey => $id));
		$this->set('document', $this->Document->find('first', $options));
	}


/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Document->create();
			if ($this->Document->save($this->request->data)) {
				$this->Session->setFlash(__('Foi salvo.'), 'layout/success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Não pôde ser salvo. Por favor, tente novamente.'), 'layout/error');
			}
		}
		$programs = $this->Document->Program->find('list');
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
		if (!$this->Document->exists($id)) {
			throw new NotFoundException(__('Inválido document'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Document->save($this->request->data)) {
				$this->Session->setFlash(__('Foi salvo.'), 'layout/success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Não pôde ser salvo. Por favor, tente novamente.'), 'layout/error');
			}
		} else {
			$options = array('conditions' => array('Document.' . $this->Document->primaryKey => $id));
			$this->request->data = $this->Document->find('first', $options);
		}
		$programs = $this->Document->Program->find('list');
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
		$this->Document->id = $id;
		if (!$this->Document->exists()) {
			throw new NotFoundException(__('Inválido document'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Document->delete()) {
	
			$this->Session->setFlash(__('Foi excluído.'), 'layout/success');
		} else {
			$this->Session->setFlash(__('Não foi excluído. Por favor, tente novamente.'), 'layout/error');
		}
		return $this->redirect(array('action' => 'index'));
	}}
