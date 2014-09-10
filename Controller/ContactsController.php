<?php

App::uses('AppController', 'Controller');

/**
 * Contacts Controller
 *
 * @property Contact $Contact
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class ContactsController extends AppController {

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
//            $this->Paginator->settings = $this->Contact->action($this->request->data);
//            echo $this->Session->setFlash('Filtro definido!', 'layout/success');
//        }
//        $this->Contact->recursive = 0;
//        $this->set('contacts', $this->Paginator->paginate());
//    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Contact->exists($id)) {
            throw new NotFoundException(__('Inválido contact'));
        }
        $options = array('conditions' => array('Contact.' . $this->Contact->primaryKey => $id));
        $this->set('contact', $this->Contact->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function index() {
        if ($this->request->is('post')) {
            $this->Contact->create();
            if ($this->Contact->save($this->request->data)) {
                $this->Session->setFlash(__('Contato enviado com sucesso.'), 'layout/success');
                return $this->redirect("/");
            } else {
                $this->Session->setFlash(__('Não pôde ser salvo. Por favor, tente novamente.'), 'layout/error');
            }
        }
        $users = $this->Contact->User->find('list',array(
            'conditions' => array('User.id' => $this->Session->read('Auth.User.id'))));
        $this->set(compact('users'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Contact->exists($id)) {
            throw new NotFoundException(__('Inválido contact'));
        }
        if ($this->request->is(array('post', 'put'))) {
            if ($this->Contact->save($this->request->data)) {
                $this->Session->setFlash(__('Foi salvo.'), 'layout/success');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('Não pôde ser salvo. Por favor, tente novamente.'), 'layout/error');
            }
        } else {
            $options = array('conditions' => array('Contact.' . $this->Contact->primaryKey => $id));
            $this->request->data = $this->Contact->find('first', $options);
        }
        $users = $this->Contact->User->find('list');
        $this->set(compact('users'));
    }

    /**
     * delete method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function delete($id = null) {
        $this->Contact->id = $id;
        if (!$this->Contact->exists()) {
            throw new NotFoundException(__('Inválido contact'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Contact->delete()) {

            $this->Session->setFlash(__('Foi excluído.'), 'layout/success');
        } else {
            $this->Session->setFlash(__('Não foi excluído. Por favor, tente novamente.'), 'layout/error');
        }
        return $this->redirect(array('action' => 'index'));
    }

}
