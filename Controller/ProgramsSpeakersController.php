<?php

App::uses('AppController', 'Controller');

/**
 * ProgramsSpeakers Controller
 *
 * @property ProgramsSpeaker $ProgramsSpeaker
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ProgramsSpeakersController extends AppController {

    public function beforeFilter() {
        $this->set('title_for_layout', __('ProgramsSpeakers'));
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
            $this->Paginator->settings = $this->ProgramsSpeaker->action($this->request->data);
            echo $this->Session->setFlash('Filtro definido!', 'layout/success');
        }
        $this->ProgramsSpeaker->recursive = 0;
        $this->set('programsSpeakers', $this->Paginator->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->ProgramsSpeaker->exists($id)) {
            throw new NotFoundException(__('Inválido programs speaker'));
        }
        $options = array('conditions' => array('ProgramsSpeaker.' . $this->ProgramsSpeaker->primaryKey => $id));
        $this->set('programsSpeaker', $this->ProgramsSpeaker->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->ProgramsSpeaker->create();
            if ($this->ProgramsSpeaker->save($this->request->data)) {
                $this->Session->setFlash(__('Foi salvo.'), 'layout/success');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Não pôde ser salvo. Por favor, tente novamente.'), 'layout/error');
            }
        }
        $programs = $this->ProgramsSpeaker->Program->find('list');
        $speakers = $this->ProgramsSpeaker->Speaker->find('list');
        $this->set(compact('programs', 'speakers'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->ProgramsSpeaker->exists($id)) {
            throw new NotFoundException(__('Inválido programs speaker'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->ProgramsSpeaker->save($this->request->data)) {
                $this->Session->setFlash(__('Foi salvo.'), 'layout/success');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Não pôde ser salvo. Por favor, tente novamente.'), 'layout/error');
            }
        } else {
            $options = array('conditions' => array('ProgramsSpeaker.' . $this->ProgramsSpeaker->primaryKey => $id));
            $this->request->data = $this->ProgramsSpeaker->find('first', $options);
        }
        $programs = $this->ProgramsSpeaker->Program->find('list');
        $speakers = $this->ProgramsSpeaker->Speaker->find('list');
        $this->set(compact('programs', 'speakers'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->ProgramsSpeaker->id = $id;
        if (!$this->ProgramsSpeaker->exists()) {
            throw new NotFoundException(__('Inválido programs speaker'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->ProgramsSpeaker->delete()) {

            $this->Session->setFlash(__('Foi excluído.'), 'layout/success');
        } else {
            $this->Session->setFlash(__('Não foi excluído. Por favor, tente novamente.'), 'layout/error');
        }
        return $this->redirect(array('action' => 'index'));
    }

}
