<?php

App::uses('AppController', 'Controller');

/**
 * Documents Controller
 *
 * @property Document $Document
 */
class DocumentsController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('index', 'view', 'add', 'delete');
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Document->recursive = 0;
        $this->set('documents', $this->paginate());
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
                $this->Session->setFlash(__('document foi salvo'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('documentnão pôde ser salvo. Por favor, tente novamente.'));
            }
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
            $this->Session->setFlash(__('Document delete'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Document não foi excluída'));
        $this->redirect(array('action' => 'index'));
    }

}
