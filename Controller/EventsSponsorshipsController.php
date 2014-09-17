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

    public function beforeFilter() {
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

}
