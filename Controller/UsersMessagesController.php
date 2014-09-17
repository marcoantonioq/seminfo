<?php

App::uses('AppController', 'Controller');

/**
 * UsersMessages Controller
 *
 * @property UsersMessage $UsersMessage
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class UsersMessagesController extends AppController {

    public function beforeFilter() {
        $this->set('title_for_layout', __('UsersMessages'));
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
            $this->Paginator->settings = $this->UsersMessage->action($this->request->data);
            echo $this->Session->setFlash('Filtro definido!', 'layout/success');
        }
        $this->UsersMessage->recursive = 0;
        $this->set('usersMessages', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->UsersMessage->exists($id)) {
            throw new NotFoundException(__('Inválido users message'));
        }
        $options = array('conditions' => array('UsersMessage.' . $this->UsersMessage->primaryKey => $id));
        $this->set('usersMessage', $this->UsersMessage->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->UsersMessage->create();
            if ($this->UsersMessage->save($this->request->data)) {
                $this->Session->setFlash(__('Foi salvo.'), 'layout/success');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Não pôde ser salvo. Por favor, tente novamente.'), 'layout/error');
            }
        }
        $users = $this->UsersMessage->User->find('list');
        $messages = $this->UsersMessage->Message->find('list');
        $this->set(compact('users', 'messages'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->UsersMessage->exists($id)) {
            throw new NotFoundException(__('Inválido users message'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->UsersMessage->save($this->request->data)) {
                $this->Session->setFlash(__('Foi salvo.'), 'layout/success');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Não pôde ser salvo. Por favor, tente novamente.'), 'layout/error');
            }
        } else {
            $options = array('conditions' => array('UsersMessage.' . $this->UsersMessage->primaryKey => $id));
            $this->request->data = $this->UsersMessage->find('first', $options);
        }
        $users = $this->UsersMessage->User->find('list');
        $messages = $this->UsersMessage->Message->find('list');
        $this->set(compact('users', 'messages'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->UsersMessage->id = $id;
        if (!$this->UsersMessage->exists()) {
            throw new NotFoundException(__('Inválido users message'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->UsersMessage->delete()) {

            $this->Session->setFlash(__('Foi excluído.'), 'layout/success');
        } else {
            $this->Session->setFlash(__('Não foi excluído. Por favor, tente novamente.'), 'layout/error');
        }
        return $this->redirect(array('action' => 'index'));
    }

}
