<?php
App::uses('AppController', 'Controller');
/**
 * MessagesUsers Controller
 *
 * @property MessagesUser $MessagesUser
 */
class MessagesUsersController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->MessagesUser->recursive = 0;
		$this->set('messagesUsers', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->MessagesUser->exists($id)) {
			throw new NotFoundException(__('Inválido messages user'));
		}
		$options = array('conditions' => array('MessagesUser.' . $this->MessagesUser->primaryKey => $id));
		$this->set('messagesUser', $this->MessagesUser->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->MessagesUser->create();
			if ($this->MessagesUser->save($this->request->data)) {
				$this->Session->setFlash(__('messages user foi salvo'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('messages usernão pôde ser salvo. Por favor, tente novamente.'));
			}
		}
		$messages = $this->MessagesUser->Message->find('list');
		$users = $this->MessagesUser->User->find('list');
		$this->set(compact('messages', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->MessagesUser->exists($id)) {
			throw new NotFoundException(__('Inválido messages user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->MessagesUser->save($this->request->data)) {
				$this->Session->setFlash(__('messages user foi salvo'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('messages user não pôde ser salvo. Por favor, tente novamente..'));
			}
		} else {
			$options = array('conditions' => array('MessagesUser.' . $this->MessagesUser->primaryKey => $id));
			$this->request->data = $this->MessagesUser->find('first', $options);
		}
		$messages = $this->MessagesUser->Message->find('list');
		$users = $this->MessagesUser->User->find('list');
		$this->set(compact('messages', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->MessagesUser->id = $id;
		if (!$this->MessagesUser->exists()) {
			throw new NotFoundException(__('Inválido messages user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->MessagesUser->delete()) {
			$this->Session->setFlash(__('Messages user delete'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Messages user não foi excluída'));
		$this->redirect(array('action' => 'index'));
	}
}
