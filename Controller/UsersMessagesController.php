<?php
App::uses('AppController', 'Controller');
/**
 * UsersMessages Controller
 *
 * @property UsersMessage $UsersMessage
 */
class UsersMessagesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function admin_index() {
		$this->UsersMessage->recursive = 0;
		$this->set('usersMessages', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
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
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->UsersMessage->create();
			if ($this->UsersMessage->save($this->request->data)) {
				$this->Session->setFlash(__('users message foi salvo'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('users messagenão pôde ser salvo. Por favor, tente novamente.'));
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
	public function admin_edit($id = null) {
		if (!$this->UsersMessage->exists($id)) {
			throw new NotFoundException(__('Inválido users message'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->UsersMessage->save($this->request->data)) {
				$this->Session->setFlash(__('users message foi salvo'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('users message não pôde ser salvo. Por favor, tente novamente..'));
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
	public function admin_delete($id = null) {
		$this->UsersMessage->id = $id;
		if (!$this->UsersMessage->exists()) {
			throw new NotFoundException(__('Inválido users message'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->UsersMessage->delete()) {
			Cache::delete('alert-messages'.$this->getUserID());
			$this->Session->setFlash(__('Users message delete'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Users message não foi excluída'));
		$this->redirect(array('action' => 'index'));
	}

	public function delete($id = null) {
		$this->UsersMessage->id = $id;
		if (!$this->UsersMessage->exists()) {
			throw new NotFoundException(__('Inválido users message'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->UsersMessage->delete()) {
			//Cache::clear('alert-messages'.$user['id']);
			$this->Session->setFlash(__('Mensagem excluída'), 'success');
			$this->redirect(array('controller'=>'users','action' => 'mensagens'));
		}
		$this->Session->setFlash(__('Mensagem não foi excluída'), 'error');
		$this->redirect(array('action' => 'index'));
	}
}
