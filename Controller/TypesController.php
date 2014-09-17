<?php

App::uses('AppController', 'Controller');

/**
 * Types Controller
 *
 * @property Type $Type
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class TypesController extends AppController {

    public function beforeFilter() {
        $this->set('title_for_layout', __('Types'));
        $this->Auth->allow('index', 'view');
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
        $this->Type->recursive = 0;
        $types = $this->paginate();

        if ($this->request->is('requested')) {
            return $types;
        } else {
            $this->set(compact('types'));
        }
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Type->exists($id)) {
            throw new NotFoundException(__('Inválido type'));
        }
        $options = array('conditions' => array('Type.' . $this->Type->primaryKey => $id));
        $this->set('type', $this->Type->find('first', $options));
    }

}
