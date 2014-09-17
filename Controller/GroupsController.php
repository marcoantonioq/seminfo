<?php

App::uses('AppController', 'Controller');

/**
 * Groups Controller
 *
 * @property Group $Group
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class GroupsController extends AppController {

    public function beforeFilter() {
        $this->set('title_for_layout', __('Groups'));
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
//    public function index() {
//        if ($this->request->is('post')) {
//            $this->Paginator->settings = $this->Group->action($this->request->data);
//            echo $this->Session->setFlash('Filtro definido!', 'layout/success');
//        }
//        $this->Group->recursive = 0;
//        $this->set('groups', $this->Paginator->paginate());
//    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Group->exists($id)) {
            throw new NotFoundException(__('Inválido group'));
        }
        $options = array('conditions' => array('Group.' . $this->Group->primaryKey => $id));
        $this->set('group', $this->Group->find('first', $options));
    }

}
