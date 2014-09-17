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

    public function beforeFilter() {
        $this->set('title_for_layout', __('Sponsorships'));
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
}
