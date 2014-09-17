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
        $users = $this->Contact->User->find('list', array(
            'conditions' => array('User.id' => $this->Session->read('Auth.User.id'))));
        $this->set(compact('users'));
    }

}
