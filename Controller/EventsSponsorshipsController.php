<?php
App::uses('AppController', 'Controller');
/**
 * EventsSponsorships Controller
 *
 * @property EventsSponsorship $EventsSponsorship
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class EventsSponsorshipsController extends AppController {

	public function beforeFilter(){
		$this->set('title_for_layout', __('EventsSponsorships'));
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
            $this->Paginator->settings = $this->EventsSponsorship->action($this->request->data);
            echo $this->Session->setFlash('Filtro definido!', 'layout/success');
        }
		$this->EventsSponsorship->recursive = 0;
		$this->set('eventsSponsorships', $this->Paginator->paginate());
	}


/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->EventsSponsorship->exists($id)) {
			throw new NotFoundException(__('Inválido events sponsorship'));
		}
		$options = array('conditions' => array('EventsSponsorship.' . $this->EventsSponsorship->primaryKey => $id));
		$this->set('eventsSponsorship', $this->EventsSponsorship->find('first', $options));
	}


/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->EventsSponsorship->create();
			if ($this->EventsSponsorship->save($this->request->data)) {
				$this->Session->setFlash(__('Foi salvo.'), 'layout/success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Não pôde ser salvo. Por favor, tente novamente.'), 'layout/error');
			}
		}
		$events = $this->EventsSponsorship->Event->find('list');
		$sponsorships = $this->EventsSponsorship->Sponsorship->find('list');
		$this->set(compact('events', 'sponsorships'));
	}


/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->EventsSponsorship->exists($id)) {
			throw new NotFoundException(__('Inválido events sponsorship'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->EventsSponsorship->save($this->request->data)) {
				$this->Session->setFlash(__('Foi salvo.'), 'layout/success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Não pôde ser salvo. Por favor, tente novamente.'), 'layout/error');
			}
		} else {
			$options = array('conditions' => array('EventsSponsorship.' . $this->EventsSponsorship->primaryKey => $id));
			$this->request->data = $this->EventsSponsorship->find('first', $options);
		}
		$events = $this->EventsSponsorship->Event->find('list');
		$sponsorships = $this->EventsSponsorship->Sponsorship->find('list');
		$this->set(compact('events', 'sponsorships'));
	}
	

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->EventsSponsorship->id = $id;
		if (!$this->EventsSponsorship->exists()) {
			throw new NotFoundException(__('Inválido events sponsorship'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->EventsSponsorship->delete()) {
	
			$this->Session->setFlash(__('Foi excluído.'), 'layout/success');
		} else {
			$this->Session->setFlash(__('Não foi excluído. Por favor, tente novamente.'), 'layout/error');
		}
		return $this->redirect(array('action' => 'index'));
	}}
