<?php

App::uses('AppController', 'Controller');

/**
 * Events Controller
 *
 * @property Event $Event
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class EventsController extends AppController {

    public function beforeFilter() {
        $this->set('title_for_layout', __('Events'));
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
            $this->Paginator->settings = $this->Event->action($this->request->data);
            echo $this->Session->setFlash('Filtro definido!', 'layout/success');
        }
        $this->Event->recursive = 0;
        $this->set('events', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Event->exists($id)) {
            throw new NotFoundException(__('Inválido event'));
        }
        $options = array('conditions' => array('Event.' . $this->Event->primaryKey => $id));
        $this->set('event', $this->Event->find('first', $options));
        //pr($this->Event->find('first', $options));
    }

    /**
     * recustIndex method
     *
     * @return void
     */
    public function recustIndex() {
        $events = $this->Event->find('list', array('recursive' => -1));
        return $events;
    }

}
