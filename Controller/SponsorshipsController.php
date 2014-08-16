<?php
App::uses('AppController', 'Controller');
/**
 * Sponsorships Controller
 *
 * @property Sponsorship $Sponsorship
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class SponsorshipsController extends AppController {

	public function beforeFilter(){
		parent::beforeFilter();
		$this->set('title_for_layout', __('Sponsorships'));
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
            $this->Paginator->settings = $this->Sponsorship->action($this->request->data);
            echo $this->Session->setFlash('Filtro definido!', 'layout/success');
        }
		$this->Sponsorship->recursive = 0;
		$this->set('sponsorships', $this->Paginator->paginate());
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Sponsorship->exists($id)) {
			throw new NotFoundException(__('Inválido sponsorship'));
		}
		$options = array('conditions' => array('Sponsorship.' . $this->Sponsorship->primaryKey => $id));
		$this->set('sponsorship', $this->Sponsorship->find('first', $options));
	}


/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Sponsorship->create();
			if ($this->Sponsorship->save($this->request->data)) {
				$this->Session->setFlash(__('Foi salvo.'), 'layout/success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Não pôde ser salvo. Por favor, tente novamente.'), 'layout/error');
			}
		}
		$events = $this->Sponsorship->Event->find('list');
		$this->set(compact('events'));
	}


/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Sponsorship->exists($id)) {
			throw new NotFoundException(__('Inválido sponsorship'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Sponsorship->save($this->request->data)) {
				$this->Session->setFlash(__('Foi salvo.'), 'layout/success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Não pôde ser salvo. Por favor, tente novamente.'), 'layout/error');
			}
		} else {
			$options = array('conditions' => array('Sponsorship.' . $this->Sponsorship->primaryKey => $id));
			$this->request->data = $this->Sponsorship->find('first', $options);
		}
		$events = $this->Sponsorship->Event->find('list');
		$this->set(compact('events'));
	}
	

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Sponsorship->id = $id;
		if (!$this->Sponsorship->exists()) {
			throw new NotFoundException(__('Inválido sponsorship'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Sponsorship->delete()) {
	
			$this->Session->setFlash(__('Foi excluído.'), 'layout/success');
		} else {
			$this->Session->setFlash(__('Não foi excluído. Por favor, tente novamente.'), 'layout/error');
		}
		return $this->redirect(array('action' => 'index'));
	}}
